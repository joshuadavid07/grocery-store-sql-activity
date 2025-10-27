<?php
/**
 * Demonstration of INSERT operation
 * Adds new record to grocery_items table
 */

require_once '../includes/dbconfig.php';

try {
    // SQL query to insert new grocery item
    $sql = "INSERT INTO grocery_items 
            (item_name, category, price, quantity_in_stock, expiry_date, supplier, is_organic) 
            VALUES (:item_name, :category, :price, :quantity, :expiry_date, :supplier, :is_organic)";
    
    $stmt = $pdo->prepare($sql);
    
    // Parameters for new item
    $params = [
        'item_name' => 'Greek Yogurt',
        'category' => 'Dairy',
        'price' => 4.25,
        'quantity' => 20,
        'expiry_date' => '2024-02-15',
        'supplier' => 'Yogurt Delight',
        'is_organic' => TRUE
    ];
    
    // Execute insertion
    $stmt->execute($params);
    
    echo "<h3>Demonstrating INSERT Operation</h3>";
    echo "New grocery item added successfully!<br>";
    echo "Last inserted ID: " . $pdo->lastInsertId();
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>