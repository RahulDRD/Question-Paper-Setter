// Vercel serverless entry: reuse the Express app from the monolith
const app = require('../server.js');

// Ensure we export a handler function compatible with Vercel
module.exports = (req, res) => app(req, res);