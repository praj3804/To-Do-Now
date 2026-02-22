# 📝 To-Do-Now  
A Full-Stack Task Management Web Application with Authentication

To-Do-Now is a full-stack task management web application built using PHP, MySQL, and Tailwind CSS.  
The application allows users to securely register, log in, manage personal tasks, and maintain user profiles.

This project demonstrates backend development, authentication handling, session management, database relationships, and structured MVC architecture.

---

## 🚀 Features

### 🔐 Authentication System
- User Registration
- Secure Login & Logout
- Session Management
- Password Hashing
- User Profile Page

### ✅ Task Management
- Add New Tasks
- Edit Tasks
- Delete Tasks
- Mark Tasks as Completed
- User-specific task storage
- Persistent database storage (MySQL)

### 🎨 UI & Structure
- Responsive design using Tailwind CSS
- Clean MVC folder structure
- Reusable Header & Footer components
- Organized Controller & Model logic

---

## 🛠 Tech Stack

- Frontend: HTML5, Tailwind CSS
- Backend: Core PHP
- Database: MySQL
- Architecture: MVC (Model-View-Controller)
- Server: Apache / PHP Built-in Server

---

## 📂 Project Structure
```
to-do-now/
│
├── config/
│   └── database.php
│
├── controllers/
│   ├── AuthController.php
│   └── TaskController.php
│
├── models/
│   ├── User.php
│   └── Task.php
│
├── views/
│   ├── header.php
│   ├── footer.php
│   ├── login.php
│   ├── register.php
│   ├── profile.php
│   └── home.php
│
├── public/
│   └── index.php
│
└── README.md
```
---

## ⚙️ Installation & Setup

### 1️⃣ Clone Repository

```bash
git clone https://github.com/your-username/to-do-now.git
cd to-do-now
```

### 2️⃣ Database Setup
```
CREATE DATABASE todo_app;

USE todo_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    status ENUM('pending','completed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```
### 3️⃣ Configure Database Connection
```
Edit config/database.php:

<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "todo_app";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
```
### 4️⃣ Run the Application

Option A – XAMPP:

Move project to htdocs

Start Apache & MySQL

Visit:
```
http://localhost/to-do-now/public
```
Option B – PHP Built-in Server:
```
php -S localhost:8000 -t public
```
Open:
```
http://localhost:8000
```
## 🔄 Application Flow

User registers → password is hashed and stored securely.

User logs in → session is created.

Authenticated users can manage only their own tasks.

Tasks are linked to users via foreign key relationship.

Profile page displays user information.

## 🔐 Security Practices Implemented

Password hashing using password_hash()

Session-based authentication

User-specific data isolation

Prepared statements (if implemented)

## 📌 Key Learning Outcomes

Implementing authentication in Core PHP

Managing sessions securely

Designing relational database schema

Applying MVC architecture

Building user-specific data systems

Writing modular and maintainable backend logic

## 🔮 Future Enhancements

Task deadlines & reminders

Email verification

Password reset system

Role-based access control

REST API version

Mobile app integration (Flutter)
