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

## Installation

1. Clone the repository:
```bash
git clone <your-repo-url>
cd blog-system