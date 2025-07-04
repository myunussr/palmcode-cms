# Laravel 12 Headless CMS

A modern **Headless Content Management System (CMS)** built with Laravel 12. This application provides a clean API to manage and deliver content like posts and categories, designed for integration with frontend frameworks like React, Vue, Nuxt, or mobile apps.

---

## 🎥 Demo Video

[![Watch on YouTube](https://img.youtube.com/vi/_yWyG30gkdw/0.jpg)](https://www.youtube.com/watch?v=_yWyG30gkdw)

## 🚀 Features

-   ⚙️ Built with **Laravel 12**
-   🧑‍💻 **Admin-only CMS** (via Laravel authentication)
-   📝 Manage:
    -   Posts (title, content, status)
    -   Categories (with post relationships)
    -   Optional Pages
-   🌐 Public **RESTful JSON API**
-   ✅ Resource-based API (using Laravel API Resources)
-   🧩 **Headless architecture** — no frontend views
-   🔐 Role-based access (optional)
-   ✍️ Supports Markdown or Rich Text (via editor like Trix or TipTap)
-   🎨 Optional Livewire + Tailwind CSS for admin UI
-   📄 Clean codebase with Laravel's modern directory structure

---

## 📦 API Endpoints

| Method | Endpoint                | Description              |
| ------ | ----------------------- | ------------------------ |
| GET    | /api/v1/posts           | List all published posts |
| GET    | /api/v1/posts/{id}      | Show a single post       |
| GET    | /api/v1/categories      | List all categories      |
| GET    | /api/v1/categories/{id} | Show category with posts |

### ✅ Sample JSON Response

```json
{
    "data": {
        "id": 1,
        "title": "Welcome to Laravel CMS",
        "body": "...",
        "status": "published",
        "category": {
            "id": 2,
            "name": "News"
        }
    }
}
```

---

## 🗂 Directory Structure

```text
app/
├── Models/
│   ├── Post.php
│   └── Category.php
├── Http/
│   ├── Controllers/
│   │   ├── Api/
│   └── Resources/
routes/
├── api.php        # Public JSON API
├── web.php        # Admin panel (auth-protected)
bootstrap/
├── app.php        # Laravel 12 app config and exception binding
```

---

## ▶️ How to Run the Project

Make sure you have PHP, Composer, Node.js, and MySQL installed. Then follow these steps:

### 1. Clone the Repository

```bash
git clone https://github.com/myunussr/palmcode-cms.git
cd palmcode-cms
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Copy `.env` and Generate App Key

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

Edit `.env` to match your database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
L5_SWAGGER_CONST_HOST=http://localhost:8000/api
```

Then run:

```bash
php artisan migrate --seed
```

### 5. Install and Build Frontend (Optional)

```bash
npm install
npm run build
```

### 6. Serve the Application

```bash
php artisan serve
```

Visit `http://localhost:8000` to access the application.

API endpoints are available under `http://localhost:8000/api/v1`.

## 🎯 Roadmap (Optional)

-   [ ] Add Page Builder support
-   [ ] Media/Image upload for posts
-   [ ] Role-based permissions (Spatie)
-   [ ] API token auth (Laravel Sanctum)
-   [ ] Dashboard analytics

---

## 🤝 Contributing

Contributions, bug reports, and feature suggestions are welcome. Feel free to fork and submit a pull request.

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

---
