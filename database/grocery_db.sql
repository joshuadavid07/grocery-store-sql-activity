-- Grocery Store Database Schema and Records

-- Create database
CREATE DATABASE IF NOT EXISTS grocery_store;
USE grocery_store;

-- Create grocery items table
CREATE TABLE IF NOT EXISTS grocery_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity_in_stock INT(6) NOT NULL,
    expiry_date DATE,
    supplier VARCHAR(100),
    is_organic BOOLEAN DEFAULT FALSE,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert records
INSERT INTO grocery_items (item_name, category, price, quantity_in_stock, expiry_date, supplier, is_organic) VALUES
('Apple', 'Fruits', 2.50, 100, '2024-02-15', 'Fresh Farms', TRUE),
('Banana', 'Fruits', 1.20, 150, '2024-01-25', 'Tropical Imports', FALSE),
('Milk', 'Dairy', 3.75, 50, '2024-01-30', 'Dairy Pure', FALSE),
('Organic Eggs', 'Dairy', 5.99, 30, '2024-02-10', 'Happy Hens', TRUE),
('Whole Wheat Bread', 'Bakery', 2.99, 40, '2024-01-28', 'Bakery Delight', FALSE),
('Chicken Breast', 'Meat', 8.99, 25, '2024-01-27', 'Prime Meats', FALSE),
('Spinach', 'Vegetables', 2.25, 60, '2024-01-26', 'Green Valley', TRUE),
('Orange Juice', 'Beverages', 4.50, 35, '2024-03-15', 'Juice Co', FALSE),
('Pasta', 'Grains', 1.99, 80, '2025-12-31', 'Pasta Masters', FALSE),
('Cheddar Cheese', 'Dairy', 4.75, 45, '2024-02-20', 'Cheese World', FALSE);