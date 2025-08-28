# 🚀 Laravel 10 CRUD Example (with Soft Delete)

This project is a **simple Laravel 10 CRUD application** demonstrating how to build, manage, and organize resources using the **Model-View-Controller (MVC) architecture**.  
It includes **Create, Read, Update, Delete (CRUD)** functionality along with **Soft Delete** support.

---

## 📌 Features
- ✅ Laravel 10 with MVC structure  
- ✅ Add, Edit, Update, and Delete records  
- ✅ **Soft Delete** (records are not permanently removed)  
- ✅ Restore deleted records easily  
- ✅ Bootstrap-based UI (or Tailwind if used)  
- ✅ MySQL database integration  

---

## 🛠️ Tech Stack
- **Framework:** Laravel 10  
- **Database:** MySQL  
- **Frontend:** Blade (Bootstrap/Tailwind)  
- **ORM:** Eloquent  
- **Version Control:** Git + GitHub  

---

## 📂 Project Structure
app/
├── Http/
│ └── Controllers/ # Controller logic
├── Models/ # Eloquent models
resources/
├── views/ # Blade templates
routes/
└── web.php # Routes for CRUD


---

## ⚡ Installation

1.  Clone the repository:
    ```bash
    git clone https://github.com/your-username/laravel-crud.git
    cd laravel-crud
2.  Install PHP Dependencies:
    ```bash
    composer install
3.  Environment Setup
    ```bash
    cp .env.example .env
4.  Generate application key:
    ```bash
    php artisan key:generate
5.  Database Setup  
    Create a new database in MySQL (e.g., laravel_crud_db).
    Update .env file with your database credentials:
    ```bash
    DB_DATABASE=laravel_crud_db
    DB_USERNAME=root
    DB_PASSWORD=yourpassword
6.  Run Migrations
    ```bash
    php artisan migrate
7.  Start Development Server
    php artisan serve
