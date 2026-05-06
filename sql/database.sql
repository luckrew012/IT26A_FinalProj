-- ========================================
-- Subdivision Homeowner Record System
-- MySQL Database Schema
-- ========================================

CREATE DATABASE IF NOT EXISTS subdivision_db;
USE subdivision_db;

-- Users table for authentication
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    role ENUM('admin', 'staff') DEFAULT 'staff',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Houses table
CREATE TABLE houses (
    id INT PRIMARY KEY AUTO_INCREMENT,
    house_number VARCHAR(20) UNIQUE NOT NULL,
    block VARCHAR(10) NOT NULL,
    street VARCHAR(100) NOT NULL,
    house_type ENUM('single', 'duplex', 'townhouse') NOT NULL,
    area_sqm DECIMAL(10,2) NOT NULL,
    status ENUM('occupied', 'vacant', 'maintenance') DEFAULT 'vacant',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Residents table
CREATE TABLE residents (
    id INT PRIMARY KEY AUTO_INCREMENT,
    house_id INT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    contact_number VARCHAR(20),
    email VARCHAR(100),
    move_in_date DATE,
    status ENUM('active', 'inactive') DEFAULT 'active',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (house_id) REFERENCES houses(id) ON DELETE SET NULL
);

-- Complaints table
CREATE TABLE complaints (
    id INT PRIMARY KEY AUTO_INCREMENT,
    resident_id INT,
    subject VARCHAR(200) NOT NULL,
    description TEXT,
    category ENUM('noise', 'maintenance', 'security', 'utilities', 'other') NOT NULL,
    priority ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium',
    status ENUM('pending', 'in_progress', 'resolved') DEFAULT 'pending',
    date_filed TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    date_resolved TIMESTAMP NULL,
    resolution_notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (resident_id) REFERENCES residents(id) ON DELETE SET NULL
);

-- Insert default admin user (password: admin123)
INSERT INTO users (username, password, full_name, email, role) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Administrator', 'admin@subdivision.com', 'admin');

-- Insert sample data
INSERT INTO houses (house_number, block, street, house_type, area_sqm, status) VALUES
('H-001', 'A', 'Mango Street', 'single', 150.00, 'occupied'),
('H-002', 'A', 'Mango Street', 'duplex', 200.00, 'occupied'),
('H-003', 'B', 'Palm Avenue', 'single', 180.00, 'vacant'),
('H-004', 'B', 'Palm Avenue', 'townhouse', 120.00, 'maintenance'),
('H-005', 'C', 'Acacia Lane', 'single', 165.00, 'occupied');

INSERT INTO residents (house_id, first_name, last_name, contact_number, email, move_in_date, status) VALUES
(1, 'Juan', 'Dela Cruz', '+63 917 123 4567', 'juan.delacruz@email.com', '2023-01-15', 'active'),
(2, 'Maria', 'Santos', '+63 918 234 5678', 'maria.santos@email.com', '2023-03-22', 'active'),
(5, 'Pedro', 'Reyes', '+63 919 345 6789', 'pedro.reyes@email.com', '2022-06-10', 'active'),
(2, 'Ana', 'Garcia', '+63 920 456 7890', 'ana.garcia@email.com', '2021-09-05', 'inactive');

INSERT INTO complaints (resident_id, subject, description, category, priority, status) VALUES
(1, 'Loud music at night', 'Neighbor playing loud music past 10pm', 'noise', 'medium', 'pending'),
(2, 'Street light not working', 'Street light at corner of Block A has been out for a week', 'maintenance', 'medium', 'in_progress'),
(3, 'Garbage not collected', 'Garbage was not collected on scheduled day', 'utilities', 'low', 'resolved'),
(4, 'Water pipe leakage', 'Main water pipe has a significant leak', 'maintenance', 'urgent', 'pending');
