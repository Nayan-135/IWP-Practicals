const express = require("express");
const router  = express.Router();
const User    = require("../models/User");

// ── REGISTER ──────────────────────────────────────────────────────────────────
router.post("/register", async (req, res) => {
  const { name, email, password, gender } = req.body;

  const existingUser = await User.findOne({ email });

  if (existingUser) {
    return res.redirect("/error.html?type=exists");
  }

  const user = new User({ name, email, password, gender });
  await user.save();

  res.redirect("/login.html");
});

// ── LOGIN ─────────────────────────────────────────────────────────────────────
router.post("/login", async (req, res) => {
  const { email, password } = req.body;

  const user = await User.findOne({ email, password });

  if (!user) {
    return res.redirect("/error.html?type=login");
  }

  // Store user info in session
  req.session.user = {
    id:     user._id,
    name:   user.name,
    email:  user.email,
    gender: user.gender
  };

  res.redirect("/dashboard");
});

// ── DASHBOARD ─────────────────────────────────────────────────────────────────
router.get("/dashboard", async (req, res) => {
  if (!req.session.user) {
    return res.redirect("/login.html");
  }

  // Fetch the latest user data from MongoDB
  const user = await User.findById(req.session.user.id).lean();

  if (!user) {
    req.session.destroy();
    return res.redirect("/login.html");
  }

  // Compute initials for avatar (up to 2 letters)
  const initials = user.name
    .split(" ")
    .map(w => w[0])
    .slice(0, 2)
    .join("")
    .toUpperCase();

  // Greeting based on hour
  const hour = new Date().getHours();
  const greeting =
    hour < 12 ? "Good Morning" :
    hour < 17 ? "Good Afternoon" : "Good Evening";

  res.render("dashboard", { user, initials, greeting });
});

// ── LOGOUT ────────────────────────────────────────────────────────────────────
router.get("/logout", (req, res) => {
  req.session.destroy();
  res.redirect("/login.html");
});

module.exports = router;