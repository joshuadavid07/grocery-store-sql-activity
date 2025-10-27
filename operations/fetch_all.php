<?php
/**
 * Demonstration of fetch_all() method
 * Fetches all records from grocery_items table
 */

require_once '../includes/dbconfig.php';

try {
    // SQL query to select all grocery items
    $sql = "SELECT * FROM grocery_items ORDER BY date_added DESC";
    $stmt = $pdo->query($sql);
    
    // Fetch all records as associative array
    $all_items = $stmt->fetchAll();
    
    echo "<h3>Demonstrating fetch_all() - All Grocery Items</h3>";
    echo "<pre>"; // Pre-formatted text tag
    print_r($all_items); // Display array structure
    echo "</pre>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>