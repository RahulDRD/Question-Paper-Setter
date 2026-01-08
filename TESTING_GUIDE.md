# Testing Guide - Database Fetching Fix

## ✅ What Was Fixed

Added comprehensive error handling and console logging to help diagnose any database fetching issues on the "Set Paper Manually" and "Quick Paper" pages.

### Changes Made:

1. **home.html** - Added console logging for department loading
2. **index.js** - Added error handling and logging for:
   - Department selection
   - Subject loading
   - Question paper generation

## 🧪 How to Test

### Test 1: Department Loading
1. Open: https://question-paper-setter.vercel.app/home.html
2. Open browser console (F12 → Console tab)
3. Look for: `"Loading departments..."`
4. Should see: `"Departments loaded: <option>..."`
5. Verify dropdown shows: Select, btech, mba, mca

**Expected Result:** ✅ Departments load successfully

### Test 2: Subject Loading
1. Select a department (e.g., "mca")
2. Check console for: `"Department selected: mca"`
3. Should see: `"Subjects loaded: <option>..."`
4. Verify subject dropdown populates with subjects

**Expected Result:** ✅ Subjects load when department is selected

### Test 3: Question Paper Generation
1. Select:
   - Department: mca
   - Semester: Sem-1
   - Exam Type: CT-1
   - Subject: Operating System (261204CA)
   - Date: Any date
2. Click "Generate Paper"
3. Check console for: `"Generating paper with: {...}"`
4. Should see: `"Questions fetched successfully"`
5. Verify question dropdowns appear on the page

**Expected Result:** ✅ Question paper generates with dropdown selects

## 🔍 Troubleshooting

### If Departments Don't Load:
**Check Console For:**
- `"Loading departments..."`
- Any error messages

**Possible Issues:**
- Network error (check internet connection)
- CORS issue (should not happen on Vercel)
- Database connection issue

**Solution:**
- Refresh the page
- Check: https://question-paper-setter.vercel.app/get_department_options.php
- Should return HTML with department options

### If Subjects Don't Load:
**Check Console For:**
- `"Department selected: [name]"`
- `"Subjects loaded: ..."`
- Error message: `"Failed to load subjects: ..."`

**Possible Issues:**
- Department not selected properly
- Network error
- Database query issue

**Solution:**
- Try selecting department again
- Check: https://question-paper-setter.vercel.app/sub.php (POST with dep=mca)
- Should return HTML with subject options

### If Questions Don't Generate:
**Check Console For:**
- `"Generating paper with: {...}"`
- `"Questions fetched successfully"`
- Error message: `"Failed to fetch questions: ..."`

**Possible Issues:**
- Missing required fields (department, semester, exam type, subject)
- Network error
- No questions in database for selected criteria

**Solution:**
- Ensure all dropdowns are selected
- Check: https://question-paper-setter.vercel.app/fetch_ques.php
- Verify questions exist for the selected subject/unit

## 📊 API Endpoint Tests

You can test the endpoints directly:

### Test Department Options:
```bash
curl https://question-paper-setter.vercel.app/get_department_options.php
```
**Expected:** HTML with department options

### Test Subject Loading:
```bash
curl -X POST https://question-paper-setter.vercel.app/sub.php \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "dep=mca"
```
**Expected:** HTML with subject options for MCA

### Test Question Fetching:
```bash
curl -X POST https://question-paper-setter.vercel.app/fetch_ques.php \
  -H "Content-Type: application/x-www-form-urlencoded" \
  -d "ex=CT-1&sem=1&sub=Operating System (261204CA)&dep=mca"
```
**Expected:** HTML table with question dropdowns

## ✅ Verification Checklist

- [ ] Departments load on page load
- [ ] Console shows "Loading departments..."
- [ ] Console shows "Departments loaded: ..."
- [ ] Department dropdown populated
- [ ] Selecting department triggers console log
- [ ] Subjects load after department selection
- [ ] Console shows "Subjects loaded: ..."
- [ ] Subject dropdown populated
- [ ] Generate Paper button works
- [ ] Console shows "Generating paper with: ..."
- [ ] Questions appear in dropdowns
- [ ] No error messages in console

## 🎯 Success Criteria

All of the following should work:
1. ✅ Page loads without errors
2. ✅ Departments appear in dropdown
3. ✅ Subjects load when department selected
4. ✅ Questions generate when button clicked
5. ✅ Console logs show successful operations
6. ✅ No error alerts appear

## 📞 If Issues Persist

If you still see database fetching problems:

1. **Check Browser Console** - Look for specific error messages
2. **Test API Endpoints** - Use curl commands above
3. **Verify Database** - Check https://question-paper-setter.vercel.app/health
4. **Check Vercel Logs** - Go to Vercel Dashboard → Functions → View Logs

## 🌐 Live URLs

- **Main App:** https://question-paper-setter.vercel.app
- **Home Page:** https://question-paper-setter.vercel.app/home.html
- **Health Check:** https://question-paper-setter.vercel.app/health
- **Vercel Dashboard:** https://vercel.com/rahuldrds-projects/question-paper-setter

---

**Last Updated:** January 5, 2026  
**Status:** ✅ Deployed with enhanced error handling
