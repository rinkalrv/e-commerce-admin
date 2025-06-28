A sophisticated admin panel for managing a luxury e-commerce platform inspired by Hermès. Built with modern web technologies to provide a premium management experience.

## ✨ Features

### 🛍️ Product Management
- Create, edit, and delete products
- Image uploads with preview functionality
- Real-time inventory tracking
- Category and tag organization system

### 📦 Order Processing
- Comprehensive order viewing interface
- Order status updates and tracking
- Automated invoice generation
- Payment status monitoring

### 🖥️ CMS System
- Static page management
- SEO-friendly content editor
- Page status controls (draft/published)
- Customizable page templates

### 🎨 Banner Management
- Homepage banner configuration
- Drag-and-drop image uploads
- Display ordering management
- Scheduled banner visibility

### 🔐 User Authentication
- Secure login system
- Role-based permissions
- Admin user management
- Activity logging

## 🛠️ Technology Stack

### Backend
- **Laravel 10** - PHP framework
- **MySQL** - Database system
- **Laravel Breeze** - Authentication scaffolding
- **Spatie Laravel Permission** - Role management

### Frontend
- **Tailwind CSS** - Utility-first CSS framework
- **Alpine.js** - Lightweight JavaScript framework
- **Quill.js** - Rich text editor

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/rinkalrv/e-commerce-admin.git
   cd e-commerce-admin

2. **Install dependencies**
    ```bash
    composer install
    npm install

3. **Configure environment**
    ```bash
    cp .env.example .env

4. **Generate application key**
    ```bash
    php artisan key:generate

5. **Run migrations and seeders**
    ```bash
    php artisan migrate --seed


6. **Build assets**
    ```bash
    npm run build

6. **Start development server**
    ```bash
    php artisan serve
