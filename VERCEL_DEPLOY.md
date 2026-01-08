# Deploy to Vercel - Step by Step Guide

## ✅ Prerequisites Checklist

Your project is already configured with:
- ✅ `vercel.json` - Vercel configuration
- ✅ `api/server.js` - Serverless function entry point
- ✅ `package.json` - Dependencies defined
- ✅ `.gitignore` - Proper ignore rules
- ✅ GitHub repository connected

## 🚀 Deployment Methods

### Method 1: Deploy via Vercel Dashboard (Recommended)

#### Step 1: Sign Up/Login to Vercel
1. Go to https://vercel.com
2. Click "Sign Up" or "Login"
3. Choose "Continue with GitHub"
4. Authorize Vercel to access your GitHub account

#### Step 2: Import Your Project
1. Click "Add New..." → "Project"
2. Find your repository: `RahulDRD/Question-Paper-Setter`
3. Click "Import"

#### Step 3: Configure Project
**Framework Preset:** Other (or Node.js)
**Root Directory:** `./` (leave as default)
**Build Command:** `npm run build` (or leave empty)
**Output Directory:** Leave empty
**Install Command:** `npm install`

#### Step 4: Add Environment Variables (CRITICAL!)
Click "Environment Variables" and add:

**Variable Name:** `DATABASE_URL`
**Value:**
```
postgresql://neondb_owner:npg_ArRJFZ5dx3gf@ep-odd-night-ah0khiik-pooler.c-3.us-east-1.aws.neon.tech/neondb?sslmode=require
```

**Environments:** ✅ Production, ✅ Preview, ✅ Development

#### Step 5: Deploy
1. Click "Deploy"
2. Wait 1-2 minutes for deployment
3. You'll get a URL like: `https://your-project.vercel.app`

---

### Method 2: Deploy via Vercel CLI

#### Step 1: Install Vercel CLI
```bash
npm install -g vercel
```

#### Step 2: Login
```bash
vercel login
```
Follow the prompts to authenticate.

#### Step 3: Deploy
```bash
# From your project directory
vercel

# For production deployment
vercel --prod
```

#### Step 4: Add Environment Variable
```bash
vercel env add DATABASE_URL
```
Paste your database URL when prompted.

---

## 🔧 Post-Deployment Configuration

### 1. Verify Environment Variables
Go to: Vercel Dashboard → Your Project → Settings → Environment Variables

Ensure `DATABASE_URL` is set for all environments.

### 2. Test Your Deployment
Visit your Vercel URL and test:
- ✅ Homepage loads: `https://your-app.vercel.app/`
- ✅ Images display correctly
- ✅ Admin panel works (password: `bit123`)
- ✅ Department dropdown loads
- ✅ Subject dropdown populates
- ✅ Add/Edit/Delete operations work

### 3. Check Function Logs
If something doesn't work:
1. Go to Vercel Dashboard → Your Project → Deployments
2. Click on the latest deployment
3. Click "Functions" tab
4. View logs for errors

---

## 📋 Troubleshooting

### Issue: "Database connection failed"
**Solution:** 
- Verify `DATABASE_URL` is set in Vercel environment variables
- Redeploy after adding the variable
- Check Neon database is not paused

### Issue: "Images not loading"
**Solution:**
- Ensure `public/images/` folder is committed to Git
- Check `vercel.json` routes configuration
- Clear browser cache

### Issue: "404 on API endpoints"
**Solution:**
- Verify `api/server.js` exists
- Check `vercel.json` routes
- Ensure `server.js` exports the app correctly

### Issue: "Function timeout"
**Solution:**
- Check database queries are optimized
- Verify Neon connection string is correct
- Check Function Logs for specific errors

---

## 🔄 Continuous Deployment

Once connected, Vercel will automatically deploy when you:
1. Push to your `main` branch (production)
2. Push to any branch (preview deployment)
3. Open a pull request (preview deployment)

### To Update Your Live Site:
```bash
git add .
git commit -m "Your update message"
git push origin main
```

Vercel will automatically detect the push and redeploy!

---

## 🌐 Custom Domain (Optional)

### Add Your Own Domain:
1. Go to Vercel Dashboard → Your Project → Settings → Domains
2. Click "Add Domain"
3. Enter your domain (e.g., `questionpaper.com`)
4. Follow DNS configuration instructions
5. Wait for DNS propagation (5-60 minutes)

---

## 📊 Monitoring

### View Analytics:
- Vercel Dashboard → Your Project → Analytics
- See page views, performance, and errors

### View Logs:
- Vercel Dashboard → Your Project → Deployments → [Latest] → Functions
- Real-time function execution logs

---

## ✅ Deployment Checklist

Before deploying, ensure:
- [ ] All code is committed to Git
- [ ] `.env` is in `.gitignore` (don't commit secrets!)
- [ ] `DATABASE_URL` will be added as Vercel environment variable
- [ ] `public/images/` folder is committed
- [ ] `vercel.json` is present
- [ ] `api/server.js` is present
- [ ] Dependencies are in `package.json`

After deploying, verify:
- [ ] Homepage loads without errors
- [ ] Images display correctly
- [ ] Admin panel accessible
- [ ] Database operations work
- [ ] All pages accessible

---

## 🎯 Quick Deploy Commands

```bash
# One-time setup
npm install -g vercel
vercel login

# Deploy to preview
vercel

# Deploy to production
vercel --prod

# Add environment variable
vercel env add DATABASE_URL

# View logs
vercel logs
```

---

## 📞 Support

If you encounter issues:
1. Check Vercel Function Logs
2. Verify environment variables are set
3. Test locally first: `npm start`
4. Check Vercel Status: https://www.vercel-status.com/

---

**Your Vercel URL will be:** `https://question-paper-setter.vercel.app` (or similar)

Good luck with your deployment! 🚀
