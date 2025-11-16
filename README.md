# Qargo Notes by Fabian Silva (Web developer Full Stack)

A **Kanban-style task management** web application, built as a full-stack Laravel project, with user authentication, an interactive dashboard, and responsive design.

## You can access the live version of **Qargo Notes** here:  
[Qargo Notes Live](https://qargo-notes-peach.vercel.app/login)

Instructions

When you open the application, the first step is to create an account if you don’t already have one. After registering, you can log in and start managing your tasks on the Kanban dashboard.

## Test Account Credentials

You can also use the following credentials to log in immediately:

Email: admin@qargocoffe.com

Password: Qargo3312.
---

## 🚀 Technologies Used

![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)&nbsp;
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)&nbsp;
![Tailwind CSS](https://img.shields.io/badge/tailwindcss-%2338B2AC.svg?style=for-the-badge&logo=tailwind-css&logoColor=white)&nbsp;
![Alpine.js](https://img.shields.io/badge/alpine.js-%2300AEEF.svg?style=for-the-badge&logo=alpine.js&logoColor=white)&nbsp;
![PostgreSQL](https://img.shields.io/badge/postgresql-%23336791.svg?style=for-the-badge&logo=postgresql&logoColor=white)&nbsp;
![Vercel](https://img.shields.io/badge/vercel-%23000000.svg?style=for-the-badge&logo=vercel&logoColor=white)&nbsp;

---

## 📝 Project Description

Qargo Notes allows users to efficiently manage tasks. Users can register, log in, and organize their tasks into three states: **Pending**, **In Progress**, and **Completed**. The app includes a real-time search feature and inline task editing with a dynamic sidebar.

The project is fully **responsive**, optimized for both desktop and mobile devices, and is implemented as a full-stack Laravel application.

Laravel was chosen for this project for several strategic and technical reasons:

---

### 1. Production-ready Full Stack

Laravel is a modern PHP framework that enables building complete applications (backend + frontend) in a structured and maintainable way. Its MVC architecture helps organize routes, controllers, and views consistently.

---

### 2. Built-in Authentication and Security

- Laravel provides ready-to-use tools for:
  - User registration and login  
  - Password hashing  
  - Authentication middleware  

This simplifies user management and protects the application from common vulnerabilities.

---

### 3. Database Integration

With Eloquent ORM, Laravel makes it easy to manipulate data in PostgreSQL (or any supported database) via models and relationships, without the need to write raw SQL queries.

---

### 4. Routes and Controllers

Laravel allows defining clean, named routes along with controllers that organize the application logic. This improves code readability and scalability.

---

### 5. Modern Ecosystem

- Supports Tailwind CSS and Alpine.js seamlessly  
- Compatible with Vite for modern JS bundling  
- Integrates easily with modern deployment platforms like Vercel  

---

## ⚙️ Functions

- User Registration and Login (with password hashing)

- Kanban-style Dashboard:

  - Task classification: Pending, In Progress, and Completed

  - Task priorities: High, Medium, Low

  - Inline editing of task descriptions

  - Mark tasks as started or completed

- Real-time Task Search that automatically hides unmatched items

- Sidebar for Task Editing and future options

- Responsive Design using Tailwind CSS and Alpine.js

- PostgreSQL Database (Neon) hosted on Vercel

- Full-stack Deployment on Vercel (both front-end and back-end)

---

## 🟢 Project structure

app/
├── Http/
│ ├── Controllers/
│ │ ├── UserController.php
│ │ └── TaskController.php
│ └── Middleware/
├── Models/
│ ├── User.php
│ └── Task.php
resources/
├── views/
│ ├── auth/
│ │ ├── login.blade.php
│ │ └── register.blade.php
│ ├── components/
│ └── ui/
└── js/
├── app.js
└── task-search.js
routes/
└── web.php

---

## 💻 facility and use

Clone the repository:
```bash
git clone <URL_REPOSITORY>
cd <Name_project>
composer install
```

## ⚙️ Config file .env

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=name_db
DB_USERNAME=user
DB_PASSWORD=password
```
## Run migrations

```
php artisan migrate

```

## Get up server:

```
php -S lovalhost:8000 -t public/

```
## 🔧Desired Features

* Statistics Dashboard: Add visualizations with monthly metrics to monitor productivity and task completion.

* Task Sharing: Allow users to share tasks with others via digital channels such as WhatsApp, email, or Telegram.

* Comments on Shared Tasks: Enable users to leave comments on shared tasks, fostering collaboration.

* File Upload and Storage: Attach files such as images, documents, or notes to tasks for added context.

* Advanced User Profile Settings: Allow users to customize their profile details, notifications, and preferences.

* Real-Time Multi-Device Updates: Integrate WebSockets for live updates across multiple devices. Currently, Vercel's persistent database allows for data updates, but changes require reloading the page.



