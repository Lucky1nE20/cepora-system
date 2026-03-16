# 🚀 Cepora Metal Fabrication System

[![PHP](https://img.shields.io/badge/PHP-8+-777BB4?style=flat&logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=flat&logo=mysql&logoColor=white)](https://mysql.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=flat&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/github/license/cepresfam/cepora-system?color=orange)](LICENSE)

## 📋 Table of Contents
- [Overview](#overview)
- [Features](#features)
- [Demo](#demo)
- [Installation](#installation)
- [File Structure](#file-structure)
- [Database Schema](#database-schema)
- [Usage](#usage)
- [Screenshots](#screenshots)
- [Contributing](#contributing)

## Overview
Complete PHP web application for **Cepora Metal Fabrication** - managing customer requests, quotations, orders, payments, and admin operations. Built with modern PHP 8+, MySQL, Bootstrap 5, and PDO.

**Dual Portal System**:
- 👨‍💼 **Admin**: Full management (customers, orders, reports)
- 👤 **Customer**: Request quotes, track orders

## Features
✅ **Authentication** - Login/Register (Admin/Customer roles)  
✅ **Responsive Design** - Mobile-first Bootstrap 5  
✅ **Dashboards** - Admin & Customer with stats/cards  
✅ **Modular Structure** - Clean MVC-like organization  
✅ **Secure PDO** - Prepared statements & password_hash  
✅ **Professional UI** - Metal fabrication theme  

## Demo
```
http://localhost/cepora-system/
```

**Test Credentials** (after DB setup):
```
Admin: admin@cepora.com.ph / admin123
Customer: customer@cepora.com.ph / customer123
```

## Installation
### Prerequisites
- **XAMPP** / Apache + MySQL + PHP 8+
- MySQL 8.0+

### Steps
1. **Clone/Download** repo to `htdocs/cepora-system`
2. **Create Database** `cepora_db`
3. **Import Schema**: Run `mysql -u root -p cepora_db < db-schema.sql`
4. **Update** `config/database.php` credentials
5. **Start XAMPP** → Visit `http://localhost/cepora-system/`

```bash
# htdocs/cepora-system/
php -S localhost:8000  # Or use XAMPP
```

## File Structure
```
cepora-system/
├── config/
│   └── database.php
├── includes/
│   ├── header.php
│   ├── footer.php
│   ├── navbar.php
│   └── sidebar.php
├── auth/
│   ├── login.php
│   └── register.php
├── admin/
│   └── dashboard.php
├── customer/
│   └── dashboard.php
├── assets/
│   ├── css/style.css
│   └── js/script.js
├── index.php
├── README.md
└── TODO.md
```

## Database Schema
```sql
CREATE DATABASE cepora_db;
USE cepora_db;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role ENUM('admin','customer'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    description TEXT,
    price DECIMAL(10,2),
    unit VARCHAR(20)
);

CREATE TABLE quotations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    specs TEXT,
    price DECIMAL(10,2),
    status ENUM('pending','approved','rejected'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id)
);

-- Sample data
INSERT INTO users (name, email, password, role) VALUES 
('Admin User', 'admin@cepora.com.ph', '$2y$10$K.ExampleHashHere', 'admin'),
('Test Customer', 'customer@cepora.com.ph', '$2y$10$K.ExampleHashHere', 'customer');
```

## Usage
1. **Register/Login** at homepage
2. **Admin**: View stats, manage orders/customers
3. **Customer**: Request quotations, track orders
4. **Responsive**: Works on desktop/mobile

## Screenshots
*(Add screenshots after testing)*

**Landing** | **Admin Dashboard** | **Customer Portal**
---|---|---
![Landing](screenshots/landing.png) | ![Admin](screenshots/admin.png) | ![Customer](screenshots/customer.png)

## Tech Stack
```
Frontend: HTML5, Bootstrap 5, CSS3, JavaScript
Backend: PHP 8+, PDO, MySQL 8+
Design: Metal fabrication theme
```

## Next Steps (TODO.md)
- Customer quote form
- Admin CRUD operations
- Order management
- Payment integration
- File uploads (designs)
- PDF reports

## Contributing
1. Fork repo
2. `git checkout -b feature/new-feature`
3. Commit & PR

See [CONTRIBUTING.md](CONTRIBUTING.md)

## License
MIT - Free to use/modify!

---

⭐ **Made with ❤️ for Cepora Metal Fabrication**  
🐛 **Issues?** Open a ticket!  
📱 **Demo:** localhost/cepora-system


