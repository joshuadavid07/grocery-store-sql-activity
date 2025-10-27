<?php
/**
 * Database Configuration File
 * Contains connection settings for MySQL database
 */

// Database connection parameters
$host = 'localhost';      // MySQL server hostname
$username = 'root';       // MySQL username (default in XAMPP)
$password = '';           // MySQL password (default empty in XAMPP)
$database = 'grocery_store'; // Database name

try {
    // Create PDO connection instance
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    
    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Set default fetch mode to associative array
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    //echo "Database connected successfully!"; // Uncomment for debugging
    
} catch(PDOException $e) {
    // Display error message if connection fails
    die("ERROR: Could not connect to database. " . $e->getMessage());
}
?>