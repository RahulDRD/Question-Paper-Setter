# Question Paper System (QPS) - Node.js Edition

**✅ Pure JavaScript/Node.js - No PHP or XAMPP required!**

This is a question paper management and generation system built with:
- **Backend**: Node.js + Express + PostgreSQL (Neon)
- **Frontend**: HTML + jQuery + Bootstrap
- **Database**: Neon PostgreSQL (cloud-hosted)

---

## 🚀 Quick Start

### Prerequisites
- Node.js (v14 or higher)
- npm (comes with Node.js)

### Installation

1. **Install dependencies**:
   ```bash
   npm install
   ```

2. **Configure database** (optional):
   - The app uses a built-in Neon PostgreSQL connection
   - To use your own database, create `.env` file:
     ```
     DATABASE_URL=postgresql://user:password@host/database?sslmode=require
     ```

3. **Start the server**:
   ```bash
   npm start
   ```

4. **Access the application**:
   ```
   http://localhost:9000
   ```

---

## 📁 Project Structure

```
QPSunit_problem/
├── server.js              # Main Node.js server (Express)
├── index.html             # Landing page + admin panel
├── home.html              # Quick paper generation UI
├── add_ques.html          # Add/manage questions and subjects
├── autoindex.js           # Frontend helper utilities
├── images/                # Static assets
├── package.json           # Node dependencies
└── legacy-php-backup-*/   # Old PHP files (backup only)
```

---

## 🔧 API Endpoints

All endpoints are compatible with the original PHP implementation:

### Department Management
- `GET /get_department_options.php` - Get department dropdown options
- `GET /get_departments.php` - List all departments (admin)
- `POST /manage_department.php` - Add/edit/delete departments

### Subject Management
- `POST /sub.php` - Get subjects for a department
- `POST /addsub.php` - Add a new subject
- `GET /get_subjects.php` - List all subjects (admin)
- `POST /manage_subject.php` - Add/edit/delete subjects

### Question Management
- `POST /viewques.php` - View questions for a department
- `POST /add.php` - Add a new question
- `POST /updateques.php` - Update a question
- `POST /deleteques.php` - Delete a question

### Paper Generation
- `POST /fetch_ques.php` - Generate exam paper (CT-1/CT-2/Endsem)

### System
- `GET /health` - Database health check

---

## 📝 Usage Examples

### Add a Question
```javascript
// POST to /add.php
{
  dep: "mca",                              // department
  sub: "Operating System (261204CA)",      // subject
  uni: 1,                                  // unit number
  que: "What is deadlock?",                // question text
  marks: 8,                                // marks
  sem: 0                                   // semester (optional)
}
```

### View Questions
```javascript
// POST to /viewques.php
{
  department: "mca"
}
```

### Generate Paper
```javascript
// POST to /fetch_ques.php
{
  dep: "mca",
  sub: "Operating System (261204CA)",
  ex: "CT-1"  // CT-1, CT-2, or Endsem
}
```

---

## 🛠️ Development

### Run with auto-restart (optional)
Install nodemon globally:
```bash
npm install -g nodemon
```

Run with:
```bash
nodemon server.js
```

### Check server status
```bash
# Check health
curl http://localhost:9000/health

# View departments
curl http://localhost:9000/get_department_options.php
```

---

## 🗄️ Database Schema

The system uses:
- **Department tables** (dynamic): `btech`, `mca`, `mba`, etc.
  - Columns: `sno`, `semester`, `subject`, `unit`, `question`, `marks`
- **subjects table**: Maps departments to subjects
  - Columns: `sno`, `department`, `sem`, `subject`

---

## 🔒 Important Notes

1. **No Apache/XAMPP needed** - This runs on Node.js Express server
2. **Port 9000** - Default server port (change in server.js if needed)
3. **Semester field** - Used only for paper printing, not for filtering
4. **Legacy PHP files** - Backed up in `legacy-php-backup-*` folder
5. **.php extensions** - Kept in URLs for frontend compatibility (Node handles them)

---

## 🚨 Troubleshooting

### Port already in use
```powershell
# Windows PowerShell
$pid = (Get-NetTCPConnection -LocalPort 9000 | Select -First 1).OwningProcess
Stop-Process -Id $pid -Force
```

### Database connection issues
- Check your `DATABASE_URL` in `.env`
- Ensure SSL is enabled for Neon PostgreSQL
- Test with: `curl http://localhost:9000/health`

### Frontend not loading
- Ensure server is running: `npm start`
- Check browser console for errors
- Verify you're accessing `http://localhost:9000` (not localhost:80)

---

## 📦 Dependencies

- `express` - Web server framework
- `pg` - PostgreSQL client
- `cors` - Cross-origin resource sharing
- `dotenv` - Environment configuration

---

## 🎯 Migration from PHP

This project was migrated from PHP to Node.js:
- ✅ All PHP logic converted to JavaScript
- ✅ MySQL replaced with PostgreSQL (Neon)
- ✅ Apache replaced with Express
- ✅ Same frontend UI and API contracts preserved

**Result**: Run anywhere Node.js runs - no XAMPP installation required!

---

## 📄 License

Academic project - Question Paper System
