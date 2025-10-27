<?php
/**
 * Demonstration of fetch() method
 * Fetches single record from grocery_items table
 */

require_once '../includes/dbconfig.php';

try {
    // SQL query to select a single grocery item
    $sql = "SELECT * FROM grocery_items WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameter and execute
    $item_id = 1; // Example item ID
    $stmt->execute(['id' => $item_id]);
    
    // Fetch single record
    $single_item = $stmt->fetch();
    
    echo "<h3>Demonstrating fetch() - Single Grocery Item (ID: $item_id)</h3>";
    echo "<pre>"; // Pre-formatted text tag
    print_r($single_item); // Display single record
    echo "</pre>";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>