-- db-schema.sql - Cepora Metal Fabrication Database Schema
-- Run: mysql -u root -p cepora_db < db-schema.sql

CREATE DATABASE IF NOT EXISTS cepora_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cepora_db;

-- Users table
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer') DEFAULT 'customer',
    phone VARCHAR(20),
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Services table
CREATE TABLE services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10,2),
    unit VARCHAR(20) DEFAULT 'piece',
    lead_time INT, -- days
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Quotations table
CREATE TABLE quotations (
    id INT PRIMARY KEY AUTO_INCREMENT,
    customer_id INT,
    specs TEXT NOT NULL,
    files JSON, -- uploaded files
    price DECIMAL(10,2),
    status ENUM('pending', 'approved', 'rejected', 'cancelled') DEFAULT 'pending',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- Orders table
CREATE TABLE orders (
    id INT PRIMARY KEY AUTO_INCREMENT,
    quotation_id INT NULL,
    customer_id INT NOT NULL,
    service_id INT,
    quantity DECIMAL(10,2),
    total_amount DECIMAL(12,2),
    status ENUM('draft', 'confirmed', 'production', 'completed', 'cancelled') DEFAULT 'draft',
    delivery_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES users(id),
    FOREIGN KEY (quotation_id) REFERENCES quotations(id),
    FOREIGN KEY (service_id) REFERENCES services(id)
) ENGINE=InnoDB;

-- Payments table
CREATE TABLE payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    order_id INT,
    amount DECIMAL(12,2),
    method ENUM('cash', 'bank', 'gcash') DEFAULT 'cash',
    reference VARCHAR(100),
    status ENUM('pending', 'paid', 'failed') DEFAULT 'pending',
    paid_at TIMESTAMP NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id)
) ENGINE=InnoDB;

-- Sample Data
INSERT INTO services (name, description, price, unit, lead_time) VALUES
('Laser Cutting', 'Precision laser cutting up to 20mm steel', 250.00, 'hour', 2),
('CNC Bending', '3D bending services', 180.00, 'meter', 1),
('Welding', 'MIG/TIG welding stainless/carbon steel', 350.00, 'hour', 3),
('Plasma Cutting', 'High-speed plasma cutting', 200.00, 'hour', 1);

-- Test users (password: 'admin123' & 'customer123' hashed)
INSERT INTO users (name, email, password, role, phone) VALUES 
('Admin Cepora', 'admin@cepora.com.ph', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin', '+639171234567'),
('Test Customer', 'customer@test.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'customer', '+639181234567');

SELECT 'Database setup complete! Ready to use.' as status;

