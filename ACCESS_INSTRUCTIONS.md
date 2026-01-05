# Access Instructions for Question Paper System

## ✅ System Status
- **Database**: Neon PostgreSQL (Connected)
- **Questions**: 241 MCA questions loaded
- **Subjects**: 6 subjects populated
- **Server**: PHP Built-in (Port 9000)

## 🌐 How to Access Your Application

### IMPORTANT: Use Port 9000
All pages must be accessed through:
```
http://localhost:9000/[page_name.php]
```

### Available Pages:
- **Home Page**: http://localhost:9000/home.php
- **Add Questions**: http://localhost:9000/add_ques.php
- **Manage Subjects**: http://localhost:9000/manage_subject.php
- **Manage Departments**: http://localhost:9000/manage_department.php
- **Index (Login)**: http://localhost:9000/index.html

## 🔧 Server Management

### Check if Server is Running:
```powershell
Get-Job
```

### Start Server (if not running):
```powershell
Start-Job -ScriptBlock { Set-Location C:\xampp\htdocs\QPSunit_problem; C:\xampp\php\php.exe -S localhost:9000 }
```

### Stop Server:
```powershell
Get-Job | Stop-Job; Get-Job | Remove-Job
```

## ✅ Verified Working Endpoints

All the following are working with Neon database:

1. **get_department_options.php** - Returns: btech, mba, mca ✅
2. **sub.php** - Returns subjects for department ✅
3. **viewques.php** - Shows all questions ✅
4. **add.php** - Add new questions ✅
5. **addsub.php** - Add new subjects ✅
6. **fetch_ques.php** - Generate question papers ✅

## 📊 Database Info

- **Host**: Neon PostgreSQL Cloud
- **Tables**: mca (241 questions), mba, btech
- **Subjects**: 6 unique subjects populated
- **Connection**: Automatic failover to MySQL if Neon unavailable

## 🐛 Troubleshooting

### "Failed to load departments"
- Server not running. Run: `Start-Job -ScriptBlock { Set-Location C:\xampp\htdocs\QPSunit_problem; C:\xampp\php\php.exe -S localhost:9000 }`

### Cannot access page
- Make sure you're using `http://localhost:9000/` (not port 8081 or 80)

### No subjects showing
- Subjects table already populated with 6 subjects
- Run `C:\xampp\php\php.exe populate_subjects.php` to refresh

## 🎯 Quick Test
Open browser and go to:
```
http://localhost:9000/home.php
```
You should see:
- Department dropdown with: Select, btech, mba, mca
- When you select "mca", subjects dropdown should populate
- All functionality working with Neon database

