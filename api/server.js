// Vercel serverless entry: reuse the Express app from the monolith
const app = require('..\\server.js');
module.exports = app;