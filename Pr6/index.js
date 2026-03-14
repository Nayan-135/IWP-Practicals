const express      = require("express");
const session      = require("express-session");
const path         = require("path");
const connectDB    = require("./config/db");
const authRoutes   = require("./routes/auth");

const app = express();

// Connect to MongoDB
connectDB();

// View engine
app.set("view engine", "ejs");
app.set("views", path.join(__dirname, "views"));

// Middleware
app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, "public")));
app.use(session({
  secret: "cricketHubSecret",
  resave: false,
  saveUninitialized: false
}));

// Routes
app.use("/", authRoutes);

app.listen(3000, () => console.log("Server running on http://localhost:3000"));