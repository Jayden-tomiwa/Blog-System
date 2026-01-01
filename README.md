# Laravel Blog System

## Overview
A complete blog system built with Laravel featuring:
1. Blog Web Application (HTML/CSS Frontend)
2. JWT Authentication API for Admin
3. Public Mobile APIs

## Features
- **Web Application:**
  - Admin login/logout
  - Create, edit, delete, and publish blog posts
  - Public blog pages with post listing and single post view
  - Comment system for published posts
  
- **API Endpoints:**
  - JWT authentication for admin (`/api/auth/login`, `/api/auth/logout`, `/api/auth/profile`)
  - Public mobile APIs (`/api/mobile/posts`, `/api/mobile/posts/{slug}`)
  - Comment submission and retrieval APIs

**PROJECT STRUCTURE**



**blog-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── API/           # API controllers
│   │   │   ├── Admin/         # Admin controllers
│   │   │   └── AuthController.php
│   │   └── Middleware/
│   ├── Models/                # Eloquent models
│   └── Providers/
├── database/
│   ├── migrations/           # Database migrations
│   └── seeders/             # Database seeders
├── public/
│   ├── screenshots/         # Screenshots folder
│   └── index.php
├── resources/
│   └── views/
│       ├── layouts/          # Main layout
│       ├── auth/             # Auth views
│       ├── admin/            # Admin views
│       └── home.blade.php   # Home page
└── routes/
    ├── web.php              # Web routes
    └── api.php              # API routes**

**Screenshots**

Screenshots are saved in public/screenshots/ directory:

    home-page.png - Home page with blog posts

    single-post.png - Single post view with comments

    admin-login.png - Admin login page

    admin-dashboard.png - Admin dashboard

    post-create.png - Create post page

    api-responses.png - API response examples

Technologies Used

    Laravel 10.x

    PHP 8.1+

    MySQL/PostgreSQL/SQLite

    JWT Authentication

    HTML5 & CSS3 (No CSS frameworks)

    Blade Templating

Assessment Coverage

This project covers all assessment criteria:
Task 1: Blog Web Application (40%)

✅ Admin authentication system
✅ Post CRUD operations
✅ Public blog pages with slug URLs
✅ Draft/published post management
✅ Comment system
Task 2: JWT Authentication API (25%)

✅ JWT token generation and validation
✅ Login, logout, and profile endpoints
✅ Admin-only access control
✅ Proper error handling
Task 3: Mobile Application APIs (20%)

✅ Public post listing API
✅ Single post retrieval by slug
✅ Comment submission API
✅ Comment retrieval API
Git Usage & Documentation (15%)

✅ Comprehensive Git repository
✅ Detailed README.md with embedded images
✅ Clean code structure
✅ Proper commit history
Testing
Web Application Testing

    Navigate to http://localhost:8000

    Try accessing admin routes without login (should redirect)

    Login with admin credentials

    Create, edit, and delete posts

    View published posts as public user

    Submit comments on published posts

API Testing with Postman
Admin Login:
http

POST /api/auth/login
Content-Type: application/json

{
    "email": "admin@blog.com",
    "password": "password123"
}

Get Posts:
http

GET /api/mobile/posts

Get Single Post:
http

GET /api/mobile/posts/your-post-slug-here

Submit Comment:
http

POST /api/mobile/posts/your-post-slug-here/comments
Content-Type: application/json

{
    "author_name": "John Doe",
    "author_email": "john@example.com",
    "content": "Great article!"
}


## Installation

1. Clone the repository:
```bash
git clone <your-repo-url>
cd blog-system 

## 2. Install dependencies:
```bash

composer install

3.Copy environment file:
 cp .env

4.Generate application key:
bash

php artisan key:generate

5.Generate JWT secret:
bash

php artisan jwt:secret

6.Configure database in .env file

7.Run migrations and seeders:

bash

php artisan migrate
php artisan db:seed --class=AdminUserSeeder

8.Start the development server:
bash

php artisan serve
##

Usage
Web Application

    Access: http://localhost:8000

    Admin Login: admin@blog.com / password123

    Features:

        Public blog pages

        Admin dashboard for post management

        Comment system

API Endpoints
Admin Authentication (JWT)

    POST /api/auth/login - Admin login

    POST /api/auth/logout - Admin logout (requires JWT)

    GET /api/auth/profile - Get admin profile (requires JWT)

Mobile APIs

    GET /api/mobile/posts - Get all published posts

    GET /api/mobile/posts/{slug} - Get single post by slug

    POST /api/mobile/posts/{slug}/comments - Submit comment

    GET /api/mobile/posts/{slug}/comments - Get post comments



