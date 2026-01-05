-- PostgreSQL normalized schema for Question Paper Setter (Neon)

CREATE TABLE IF NOT EXISTS departments (
  id SERIAL PRIMARY KEY,
  name TEXT UNIQUE NOT NULL
);

CREATE TABLE IF NOT EXISTS subjects (
  id SERIAL PRIMARY KEY,
  department_id INTEGER NOT NULL REFERENCES departments(id) ON DELETE CASCADE,
  name TEXT NOT NULL,
  CONSTRAINT uq_subject UNIQUE (department_id, name)
);

-- Option A: normalized questions table (recommended)
CREATE TABLE IF NOT EXISTS questions (
  id SERIAL PRIMARY KEY,
  subject_id INTEGER NOT NULL REFERENCES subjects(id) ON DELETE CASCADE,
  unit INTEGER NOT NULL,
  question TEXT NOT NULL,
  marks INTEGER NOT NULL
);

CREATE INDEX IF NOT EXISTS idx_questions_subject_unit ON questions(subject_id, unit);
CREATE INDEX IF NOT EXISTS idx_questions_marks ON questions(marks);

-- Optional: papers metadata to store print info (semester only for header)
CREATE TABLE IF NOT EXISTS papers (
  id SERIAL PRIMARY KEY,
  subject_id INTEGER NOT NULL REFERENCES subjects(id) ON DELETE CASCADE,
  exam_type TEXT NOT NULL,
  date_of_exam DATE NOT NULL,
  semester INTEGER, -- header only
  max_time TEXT,
  max_marks INTEGER,
  created_at TIMESTAMP DEFAULT now()
);

-- Migration notes:
-- 1) Insert departments (distinct from old table names like 'mca','mba')
-- 2) Insert subjects from old 'subjects' table (ignoring 'sem') mapping department name -> department_id
-- 3) Insert questions from old per-department tables into 'questions' by joining subject name -> subjects.id
-- 4) Update PHP endpoints to use this schema (PDO pgsql) instead of dynamic table names.
