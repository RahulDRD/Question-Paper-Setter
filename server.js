// Simple Express server replacing PHP endpoints
// Serves static files and implements Neon-backed API compatible with existing PHP routes

const express = require('express');
const cors = require('cors');
const path = require('path');
const fs = require('fs');
const { Pool } = require('pg');

// Load env if present
try {
  require('dotenv').config();
} catch (e) {
  // dotenv not available, skip
}

// Prefer env DATABASE_URL else fallback to PHP's baked-in Neon URL
const FALLBACK_DATABASE_URL = 'postgresql://neondb_owner:npg_ArRJFZ5dx3gf@ep-odd-night-ah0khiik-pooler.c-3.us-east-1.aws.neon.tech/neondb?sslmode=require&options=endpoint%3Dep-odd-night-ah0khiik';
const RAW_DATABASE_URL = process.env.DATABASE_URL || FALLBACK_DATABASE_URL;
// Neon + pg: remove 'options=endpoint=...' when using pooled host to avoid SNI mismatch
let connectionString = RAW_DATABASE_URL;
let hadOptions = false;
try {
  const u = new URL(RAW_DATABASE_URL);
  if (u.searchParams.has('options')) {
    hadOptions = true;
    u.searchParams.delete('options');
    connectionString = u.toString();
  }
} catch {}

const pool = new Pool({
  connectionString,
  ssl: { rejectUnauthorized: false }
});

const app = express();
app.use(cors());
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

// We'll register API routes first; static served after so routes take precedence
const ROOT = __dirname; // c:\xampp\htdocs\QPSunit_problem

// Helper to sanitize identifiers like table names
function safeIdent(name) {
  return (name || '').replace(/[^A-Za-z0-9_]/g, '');
}

// =========== PHP-compatible endpoints ===========
// 1) get_department_options.php -> returns <option> list
app.get('/get_department_options.php', async (req, res) => {
  let output = '<option value="Select">Select Department</option>';
  try {
    const q = `SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname = 'public'`;
    const { rows } = await pool.query(q);
    for (const r of rows) {
      const t = r.tablename;
      if (!['subjects', 'migrations', 'password_resets', 'users'].includes(t)) {
        output += `<option value="${t}">${t}</option>`;
      }
    }
    res.set('Content-Type', 'text/html; charset=UTF-8').send(output);
  } catch (e) {
    res.status(500).send(output);
  }
});

// 2) sub.php -> expects dep or department; returns subject options for department
app.post('/sub.php', async (req, res) => {
  const dep = (req.body.dep || req.body.department || '').trim();
  let output = "<option value='Select'>Select Subject Code</option>";
  if (!dep) return res.type('html').send(output);
  try {
    const { rows } = await pool.query(
      `SELECT subject FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER($1)) ORDER BY subject`,
      [dep]
    );
    for (const r of rows) {
      const s = String(r.subject || '');
      const esc = s.replace(/'/g, "&#39;");
      output += ` <option value='${esc}'>${esc}</option>`;
    }
    res.set('Content-Type', 'text/html; charset=UTF-8').send(output);
  } catch (e) {
    res.set('Content-Type', 'text/html; charset=UTF-8').send(output);
  }
});

// 3) viewques.php -> expects dept/department; returns HTML table like PHP
app.post('/viewques.php', async (req, res) => {
  const deptRaw = req.body.dept || req.body.department || req.query.department || '';
  const dep = safeIdent(deptRaw);
  if (!dep) return res.status(400).send('Invalid department');
  try {
    const { rows } = await pool.query(`SELECT * FROM "${dep}" ORDER BY sno DESC`);
    let html = `\n  <table class='table mt-4' id='subeditt'>\n  <thead>\n  <tr>\n  <th>Subject</th>\n  <th>Unit</th>\n  <th>Question</th>\n  <th>Marks</th>\n  <th>Edit</th>\n  <th>Delete</th>\n  <th class='d-none'>Sno</th>\n  </tr>\n</thead>\n<tbody>\n`;
    for (const r of rows) {
      const subject = String(r.subject || '');
      const unit = String(r.unit || '');
      const question = String(r.question || '');
      const marks = String(r.marks || '');
      const sno = String(r.sno || '');
      html += `\n    <tr>\n    <td>${subject}</td>\n    <td>${unit}</td>\n    <td class='ques'>${question}</td>\n    <td>${marks}</td>\n    <td><button class='editq btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button></td>\n    <td><button class='delq btn btn-danger'>Delete</button></td>\n    <td class='sno d-none'>${sno}</td>\n    </tr>\n`;
    }
    html += `\n  </tbody>\n  </table>\n`;
    res.set('Content-Type', 'text/html; charset=UTF-8').send(html);
  } catch (e) {
    res.status(500).send('Failed to load questions');
  }
});

// 4) add.php -> insert a question into dept table
app.post('/add.php', async (req, res) => {
  const dep = safeIdent(req.body.department || req.body.dept || req.body.dep || '');
  const subject = (req.body.subject || req.body.sub || '').trim();
  const unit = parseInt(req.body.unit ?? req.body.uni ?? '0', 10);
  const question = (req.body.question || req.body.que || '').trim();
  const marks = parseInt(req.body.marks ?? '0', 10);
  const semester = parseInt(req.body.semester ?? req.body.sem ?? '0', 10);
  if (!dep || !subject || !question || !unit || !marks) return res.status(400).send('Missing fields');
  try {
    await pool.query(
      `INSERT INTO "${dep}" (semester, subject, unit, question, marks) VALUES ($1, $2, $3, $4, $5)`,
      [semester, subject, unit, question, marks]
    );
    res.send('Question Added');
  } catch (e) {
    res.status(500).send('Failed to add question');
  }
});

// 5) addsub.php -> insert into subjects with duplicate prevention
app.post('/addsub.php', async (req, res) => {
  const department = (req.body.dep || req.body.department || '').trim();
  const subject = (req.body.sub || req.body.subject || '').trim();
  if (!department || !subject) return res.status(400).send('Missing fields');
  try {
    const { rows } = await pool.query(
      `SELECT COUNT(*)::int AS cnt FROM subjects WHERE TRIM(LOWER(department)) = TRIM(LOWER($1)) AND TRIM(LOWER(subject)) = TRIM(LOWER($2))`,
      [department, subject]
    );
    if (rows[0].cnt > 0) return res.send('Subject Already Added');
    // Use sem=0 since semester doesn't matter for subjects (per user requirement)
    await pool.query(
      `INSERT INTO subjects (department, sem, subject) VALUES ($1, 0, $2)`,
      [department, subject]
    );
    res.send('Subject Added');
  } catch (e) {
    res.status(500).send('Failed to add subject');
  }
});

// 6) deleteques.php -> delete a question by sno from a department table
app.post('/deleteques.php', async (req, res) => {
  const id = parseInt(req.body.sno || '0', 10);
  const dept = safeIdent(req.body.dept || '');
  if (!id || !dept) return res.send('Error');
  try {
    await pool.query(`DELETE FROM "${dept}" WHERE sno = $1`, [id]);
    res.send('Deleted');
  } catch (e) {
    res.send('Error');
  }
});

// 7) updateques.php -> update question text by sno
app.post('/updateques.php', async (req, res) => {
  const id = parseInt(req.body.sno || '0', 10);
  const dept = safeIdent(req.body.dept || '');
  const ques = (req.body.ques || req.body.question || '').trim();
  if (!id || !dept || !ques) return res.send('Error');
  try {
    const r = await pool.query(`UPDATE "${dept}" SET question = $1 WHERE sno = $2`, [ques, id]);
    res.send(r.rowCount > 0 ? 'Updated' : 'Error');
  } catch (e) {
    res.send('Error');
  }
});

// 8) fetch_ques.php -> generate HTML selects for exam paper generation
app.post('/fetch_ques.php', async (req, res) => {
  const ex = (req.body.ex || '').trim();
  const sub = (req.body.sub || '').trim();
  const dep = safeIdent(req.body.dep || '');
  if (!dep || !sub) return res.status(400).send('');

  async function fetchQuestions(unit, marks) {
    try {
      const { rows } = await pool.query(
        `SELECT question FROM "${dep}" WHERE unit = $1 AND marks = $2 AND LOWER(TRIM(subject)) = LOWER(TRIM($3)) ORDER BY sno`,
        [unit, marks, sub]
      );
      return rows.map(r => String(r.question || ''));
    } catch {
      return [];
    }
  }

  // Load questions by unit and marks
  const [u1, u2, u3, u4, u5] = await Promise.all([
    fetchQuestions(1, 8), fetchQuestions(2, 8), fetchQuestions(3, 8), fetchQuestions(4, 8), fetchQuestions(5, 8)
  ]);
  const [u14, u24, u34, u44, u54] = await Promise.all([
    fetchQuestions(1, 4), fetchQuestions(2, 4), fetchQuestions(3, 4), fetchQuestions(4, 4), fetchQuestions(5, 4)
  ]);

  function opt(list) {
    return list.map(q => `<option>${(q || '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;')}</option>`).join('');
  }

  let html = "";
  if (ex === 'CT-1') {
    html += "<table id='dummy_table' class='table text-center mt-2 shadow-lg p-3 mb-5 bg-white rounded'>";
    html += "<tr><th colspan='2' text-center>Q.No</th><th>Questions</th><th>Marks</th></tr>";
    // Q1
    html += `<tr><td rowspan='4' class='text-center' width='5%'>1.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct11a'>${opt(u14)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct11b'>${opt(u1)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct11c'>${opt(u1)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct11d'>${opt(u1)}</select></td><td width='5%'>08</td></tr>`;
    // Q2
    html += `<tr><td rowspan='4' class='text-center'>2.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct12a'>${opt(u24)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct12b'>${opt(u2)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct12c'>${opt(u2)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct12d'>${opt(u2)}</select></td><td width='5%'>08</td></tr>`;
    html += `</table>`;
  } else if (ex === 'CT-2') {
    html += "<table id='dummy_table' class='table text-center mt-2 shadow-lg p-3 mb-5 bg-white rounded'>";
    html += "<tr><th colspan='2' text-center>Q.No</th><th>Questions</th><th>Marks</th></tr>";
    // Q1 unit 3
    html += `<tr><td rowspan='4' class='text-center' width='5%'>1.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct21a'>${opt(u34)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct21b'>${opt(u3)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct21c'>${opt(u3)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct21d'>${opt(u3)}</select></td><td width='5%'>08</td></tr>`;
    // Q2 unit 4
    html += `<tr><td rowspan='4' class='text-center'>2.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct22a'>${opt(u44)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct22b'>${opt(u4)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct22c'>${opt(u4)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct22d'>${opt(u4)}</select></td><td width='5%'>08</td></tr>`;
    // Q3 unit 5
    html += `<tr><td rowspan='4' class='text-center'>3.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct23a'>${opt(u54)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct23b'>${opt(u5)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct23c'>${opt(u5)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct23d'>${opt(u5)}</select></td><td width='5%'>08</td></tr>`;
    html += `</table>`;
  } else if (ex === 'Endsem' || ex === 'End Sem Exam') {
    html += "<table id='dummy_table' class='table text-center mt-2 shadow-lg p-3 mb-5 bg-white rounded'>";
    html += "<tr><th colspan='2' text-center>Q.No</th><th>Questions</th><th>Marks</th></tr>";
    // Q1 - Unit 1
    html += `<tr><td rowspan='4' class='text-center' width='5%'>1.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct11a'>${opt(u14)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct11b'>${opt(u1)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct11c'>${opt(u1)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct11d'>${opt(u1)}</select></td><td width='5%'>08</td></tr>`;
    // Q2 - Unit 2
    html += `<tr><td rowspan='4' class='text-center'>2.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct12a'>${opt(u24)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct12b'>${opt(u2)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct12c'>${opt(u2)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct12d'>${opt(u2)}</select></td><td width='5%'>08</td></tr>`;
    // Q3 - Unit 3
    html += `<tr><td rowspan='4' class='text-center'>3.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct21a'>${opt(u34)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct21b'>${opt(u3)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct21c'>${opt(u3)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct21d'>${opt(u3)}</select></td><td width='5%'>08</td></tr>`;
    // Q4 - Unit 4
    html += `<tr><td rowspan='4' class='text-center'>4.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct22a'>${opt(u44)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct22b'>${opt(u4)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct22c'>${opt(u4)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct22d'>${opt(u4)}</select></td><td width='5%'>08</td></tr>`;
    // Q5 - Unit 5
    html += `<tr><td rowspan='4' class='text-center'>5.</td>`;
    html += `<td width='5%'>(a)</td><td><select class='form-select' id='ct23a'>${opt(u54)}</select></td><td width='5%'>04</td></tr>`;
    html += `<tr><td width='5%'>(b)</td><td><select class='form-select' id='ct23b'>${opt(u5)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(c)</td><td><select class='form-select' id='ct23c'>${opt(u5)}</select></td><td width='5%'>08</td></tr>`;
    html += `<tr><td width='5%'>(d)</td><td><select class='form-select' id='ct23d'>${opt(u5)}</select></td><td width='5%'>08</td></tr>`;
    html += `</table>`;
  }

  res.set('Content-Type', 'text/html; charset=UTF-8').send(html);
});

// 9) download.php -> generate printable paper HTML with selected questions
app.post('/download.php', async (req, res) => {
  const dept = (req.body.dept || '').trim();
  const sem = (req.body.sem || '').trim();
  const exam_type = (req.body.exam_type || '').trim();
  const subject = (req.body.subject || '').trim();
  const mt = req.body.mt || '2 hours';
  const mm = req.body.mm || '100';
  const dateofexam = req.body.dateofexam || '';

  // Transform semester display
  let semDisplay = sem;
  if (sem === 'Sem-1') semDisplay = 'Semester-I';
  else if (sem === 'Sem-2') semDisplay = 'Semester-II';
  else if (sem === 'Sem-3') semDisplay = 'Semester-III';
  else if (sem === 'Sem-4') semDisplay = 'Semester-IV';
  else if (sem === 'Sem-5') semDisplay = 'Semester-V';
  else if (sem === 'Sem-6') semDisplay = 'Semester-VI';
  else if (sem === 'Sem-7') semDisplay = 'Semester-VII';
  else if (sem === 'Sem-8') semDisplay = 'Semester-VIII';

  // Transform department display
  let deptDisplay = dept;
  if (dept.toLowerCase() === 'mca') deptDisplay = 'Masters Of Computer Application(MCA)';
  else if (dept.toLowerCase() === 'mba') deptDisplay = 'Masters of Business Application(MBA)';
  else if (dept.toLowerCase() === 'btech') deptDisplay = 'Bachelor of Technology(B.Tech)';

  let html = '';
  
  if (exam_type === 'CT-1') {
    const ct1 = req.body.ct1 || [];
    html = `
<div id='message'>
  <b><center>Class Test-I<br>
             Date of Examination: ${dateofexam}<br>
            ${deptDisplay}<br>
            ${semDisplay}<br>
            Subject: ${subject}
  </center>
<center>
<b>
<table>
<tr>
<td><p>Max Time: ${mt}</p></td>
<td align='right'><p>Max Marks: ${mm}</p></td>
</tr>
</table>
</b>
<hr>
  <br>
  <p><i>Note: Attempt all questions. Attempt any two parts from(b), (c) and (d) carrying 8 marks each</i></p>
  <br>
</div>
<table border=1 class='display' id='ct1tbl'
data-paging='false'
data-searching='false'
data-ordering='false'>
<thead>
<tr>
    <th text-center>Q.No</th>
    <th></th>
    <th>Questions</th>
    <th>Marks</th>
</tr>
</thead>
<tbody>
<tr>
<td class='text-center' width='5%'>1.</td>
<td width='5%'>(a)</td>
<td>${ct1[0] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct1[1] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct1[2] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct1[3] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td class='text-center'>2.</td>
<td width='5%'>(a)</td>
<td>${ct1[4] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct1[5] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct1[6] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct1[7] || ''}</td>
<td width='5%'>08</td>
</tr>
</tbody>
</table>
</center>
<center>****000****</center>
`;
  } else if (exam_type === 'CT-2') {
    const ct2 = req.body.ct2 || [];
    html = `
<div id='message'>
  <b><center>Class Test-II<br>
  Date of Examination: ${dateofexam}<br>
 ${deptDisplay}<br>
 ${semDisplay}<br>
 Subject: ${subject}
</center>
<b>
<table>
<tr>
<td>Max Time: ${mt}</td>
<td align='right'>Max Marks: ${mm}</td>
</tr>
</table>
</b>
<hr>
<br>
<p><i>Note: Attempt all questions. Attempt any two parts from(b), (c) and (d) carrying 8 marks each</i></p>
</div>
<table border=1 class='display' id='ct2tbl'
data-paging='false'
data-searching='false'
data-ordering='false'>
<thead>
<tr>
<th text-center>Q.No</th>
<th></th>
<th>Questions</th>
<th>Marks</th>
</tr>
</thead>
<tbody>
<tr>
<td class='text-center' width='5%'>1.</td>
<td width='5%'>(a)</td>
<td>${ct2[0] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct2[1] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct2[2] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct2[3] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td class='text-center'>2.</td>
<td width='5%'>(a)</td>
<td>${ct2[4] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct2[5] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct2[6] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct2[7] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td class='text-center'>3.</td>
<td width='5%'>(a)</td>
<td>${ct2[8] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct2[9] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct2[10] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct2[11] || ''}</td>
<td width='5%'>08</td>
</tr>
</table>
<center>****000****</center>
`;
  } else if (exam_type === 'End Sem Exam') {
    const ct1 = req.body.ct1 || [];
    const ct2 = req.body.ct2 || [];
    html = `
<div id='message'>
  <b><center>End Semester Exam<br>
  Date of Examination: ${dateofexam}<br>
 ${deptDisplay}<br>
 ${semDisplay}<br>
 Subject: ${subject}
</center>
<b>
<table>
<tr>
<td>Max Time: ${mt}</td>
<td align='right'>Max Marks: ${mm}</td>
</tr>
</table>
</b>
<hr>
<br>
<p><i>Note: Attempt all questions. Attempt any two parts from(b), (c) and (d) carrying 8 marks each</i></p>
</div>
<table border=1 class='display' id='esetbl'
data-paging='false'
data-searching='false'
data-ordering='false'>
<thead>
<tr>
<th text-center>Q.No</th>
<th></th>
<th>Questions</th>
<th>Marks</th>
</tr>
</thead>
<tbody>
<tr>
<td class='text-center' width='5%'>1.</td>
<td width='5%'>(a)</td>
<td>${ct1[0] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct1[1] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct1[2] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct1[3] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td class='text-center'>2.</td>
<td width='5%'>(a)</td>
<td>${ct1[4] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct1[5] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct1[6] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct1[7] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td class='text-center' width='5%'>3.</td>
<td width='5%'>(a)</td>
<td>${ct2[0] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct2[1] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct2[2] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct2[3] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td class='text-center'>4.</td>
<td width='5%'>(a)</td>
<td>${ct2[4] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct2[5] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct2[6] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct2[7] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td class='text-center'>5.</td>
<td width='5%'>(a)</td>
<td>${ct2[8] || ''}</td>
<td width='5%'>04</td>
</tr>
<tr>
<td></td>
<td width='5%'>(b)</td>
<td>${ct2[9] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(c)</td>
<td>${ct2[10] || ''}</td>
<td width='5%'>08</td>
</tr>
<tr>
<td></td>
<td width='5%'>(d)</td>
<td>${ct2[11] || ''}</td>
<td width='5%'>08</td>
</tr>
</tbody>
</table>
<center>****000****</center>
`;
  }

  res.set('Content-Type', 'text/html; charset=UTF-8').send(html);
});

// 10) manage_subject.php -> JSON API for add/edit/delete subjects
app.post('/manage_subject.php', async (req, res) => {
  res.type('application/json');
  const action = (req.body.action || '').trim();
  const department = (req.body.department || '').trim();
  const subject = (req.body.subject || '').trim();
  const sno = parseInt(req.body.sno || '0', 10);
  try {
    if (action === 'add') {
      const dup = await pool.query(
        `SELECT 1 FROM subjects WHERE TRIM(LOWER(department))=TRIM(LOWER($1)) AND TRIM(LOWER(subject))=TRIM(LOWER($2)) LIMIT 1`,
        [department, subject]
      );
      if (dup.rowCount > 0) return res.json({ success: false, message: 'Subject already exists for this department' });
      // Add sem=0 since semester doesn't matter for subjects (per user requirement)
      const r = await pool.query(`INSERT INTO subjects (department, subject, sem) VALUES ($1,$2,0)`, [department, subject]);
      return res.json({ success: r.rowCount > 0, message: r.rowCount > 0 ? 'Subject added successfully!' : 'Error adding subject.' });
    } else if (action === 'edit' && sno > 0) {
      const dup = await pool.query(
        `SELECT 1 FROM subjects WHERE TRIM(LOWER(department))=TRIM(LOWER($1)) AND TRIM(LOWER(subject))=TRIM(LOWER($2)) AND sno<>$3 LIMIT 1`,
        [department, subject, sno]
      );
      if (dup.rowCount > 0) return res.json({ success: false, message: 'Another subject with same name exists in this department' });
      const r = await pool.query(`UPDATE subjects SET department=$1, subject=$2 WHERE sno=$3`, [department, subject, sno]);
      return res.json({ success: r.rowCount > 0, message: r.rowCount > 0 ? 'Subject updated successfully!' : 'Error updating subject.' });
    } else if (action === 'delete' && sno > 0) {
      const r = await pool.query(`DELETE FROM subjects WHERE sno=$1`, [sno]);
      return res.json({ success: r.rowCount > 0, message: r.rowCount > 0 ? 'Subject deleted successfully!' : 'Error deleting subject.' });
    }
    res.status(400).json({ success: false, message: 'Invalid action or missing parameters' });
  } catch (e) {
    res.status(500).json({ success: false, message: 'Exception: ' + e.message });
  }
});

// 10) get_departments.php -> HTML rows listing public tables except system tables
app.get('/get_departments.php', async (_req, res) => {
  let output = '';
  try {
    const { rows } = await pool.query(`SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname='public'`);
    for (const r of rows) {
      const t = r.tablename;
      if (!['subjects','migrations','password_resets','users'].includes(t)) {
        const safe = String(t).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');
        const nameJs = JSON.stringify(t);
        output += `<tr><td>${safe}</td><td><button class="btn btn-sm btn-warning" onclick="editDepartment(${nameJs})">Edit</button> <button class="btn btn-sm btn-danger" onclick="deleteDepartment(${nameJs})">Delete</button></td></tr>`;
      }
    }
  } catch {}
  res.set('Content-Type', 'text/html; charset=UTF-8').send(output);
});

// 11) get_subjects.php -> HTML rows of subjects table
app.get('/get_subjects.php', async (_req, res) => {
  try {
    const { rows } = await pool.query(`SELECT sno, department, subject FROM subjects ORDER BY TRIM(LOWER(department)), TRIM(LOWER(subject))`);
    let output = '';
    for (const r of rows) {
      const dept = String(r.department || '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');
      const subj = String(r.subject || '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#39;');
      const sno = Number(r.sno || 0);
      const deptJs = JSON.stringify(r.department || '');
      const subjJs = JSON.stringify(r.subject || '');
      output += `<tr><td>${dept}</td><td>${subj}</td><td><button class="btn btn-sm btn-warning" onclick="editSubject(${sno}, ${deptJs}, ${subjJs})">Edit</button> <button class="btn btn-sm btn-danger delete-btn" data-sno="${sno}" data-subject="${subj}">Delete</button></td></tr>`;
    }
    res.set('Content-Type','text/html; charset=UTF-8').send(output);
  } catch (e) {
    res.status(500).send('');
  }
});

// 12) manage_department.php -> JSON add/edit/delete department (tables)
app.post('/manage_department.php', async (req, res) => {
  res.type('application/json');
  const action = (req.body.action || '').trim();
  const identOk = (s) => /^[A-Za-z0-9_]+$/.test(s || '');
  try {
    if (action === 'add') {
      const deptName = req.body.deptName || '';
      if (!identOk(deptName)) return res.status(400).json({ success: false, message: 'Invalid department name' });
      await pool.query(`CREATE TABLE "${deptName}" (
        sno SERIAL PRIMARY KEY,
        semester INTEGER NOT NULL,
        subject TEXT NOT NULL,
        unit INTEGER NOT NULL,
        question TEXT NOT NULL,
        marks INTEGER NOT NULL
      )`);
      return res.json({ success: true, message: 'Department created successfully!' });
    } else if (action === 'edit') {
      const oldDeptName = req.body.oldDeptName || '';
      const newDeptName = req.body.newDeptName || '';
      if (!identOk(oldDeptName) || !identOk(newDeptName)) return res.status(400).json({ success: false, message: 'Invalid department name' });
      const exists = await pool.query(`SELECT 1 FROM pg_catalog.pg_tables WHERE schemaname='public' AND tablename=$1`, [newDeptName.toLowerCase()]);
      if (exists.rowCount > 0) return res.json({ success: false, message: 'Error: Department name already exists!' });
      await pool.query(`ALTER TABLE "${oldDeptName}" RENAME TO "${newDeptName}"`);
      try { await pool.query(`UPDATE subjects SET department=$1 WHERE department=$2`, [newDeptName, oldDeptName]); } catch {}
      return res.json({ success: true, message: 'Department updated successfully!' });
    } else if (action === 'delete') {
      const deptName = req.body.deptName || '';
      if (!identOk(deptName)) return res.status(400).json({ success: false, message: 'Invalid department name' });
      await pool.query(`DROP TABLE "${deptName}"`);
      try { await pool.query(`DELETE FROM subjects WHERE department=$1`, [deptName]); } catch {}
      return res.json({ success: true, message: 'Department deleted successfully!' });
    }
    res.status(400).json({ success: false, message: 'Invalid action' });
  } catch (e) {
    res.status(500).json({ success: false, message: 'Error: ' + e.message });
  }
});

// Health check similar to health.php
app.get('/health', async (_req, res) => {
  try {
    const r = await pool.query('select version()');
    res.json({ ok: true, version: r.rows?.[0]?.version || null });
  } catch (e) {
    res.status(500).json({ ok: false, error: e.message });
  }
});

app.get('/debug/conn', (_req, res) => {
  try {
    const u = new URL(connectionString);
    res.json({
      ok: true,
      hadOptions,
      finalHasOptions: u.searchParams.has('options'),
      host: u.host
    });
  } catch (e) {
    res.json({ ok: false, error: e.message });
  }
});

// Debug: columns of a table
app.get('/debug/columns', async (req, res) => {
  const t = safeIdent(req.query.table || '');
  if (!t) return res.json({ ok: false, error: 'missing table' });
  try {
    const { rows } = await pool.query(
      `SELECT column_name, data_type, is_nullable FROM information_schema.columns WHERE table_schema='public' AND table_name=$1 ORDER BY ordinal_position`,
      [t]
    );
    res.json({ ok: true, table: t, columns: rows });
  } catch (e) {
    res.status(500).json({ ok: false, error: e.message });
  }
});

// Debug: subjects count/list for a department
app.get('/debug/subjects', async (req, res) => {
  const dep = (req.query.dep || '').trim();
  try {
    const { rows } = await pool.query(
      `SELECT department, subject FROM subjects ${dep ? 'WHERE TRIM(LOWER(department))=TRIM(LOWER($1))' : ''} ORDER BY department, subject`,
      dep ? [dep] : []
    );
    res.json({ ok: true, count: rows.length, rows });
  } catch (e) {
    res.status(500).json({ ok: false, error: e.message });
  }
});

// Map GET /something.php to /something.html if present (for legacy links)
app.get(/^\/(.+)\.php$/, (req, res, next) => {
  const base = req.params[0];
  const htmlPath = path.join(ROOT, `${base}.html`);
  if (fs.existsSync(htmlPath)) return res.sendFile(htmlPath);
  return next();
});

// Serve static files from current directory (registered after php->html rewrite)
// Also expose '/images' from the 'public/images' folder so paths like '/images/...'
// work locally the same way they do on Vercel.
app.use('/images', express.static(path.join(ROOT, 'public', 'images')));
app.use(express.static(ROOT, { extensions: ['html'] }));

// Start server for local development
const PORT = process.env.PORT || 9000;
if (require.main === module) {
  app.listen(PORT, () => {
    console.log(`Server running on http://localhost:${PORT}`);
  });
}

// Export app for serverless platforms (Vercel)
module.exports = app;
