<?php
/**
 * Demonstration of UPDATE operation
 * Modifies existing record in grocery_items table
 */

require_once '../includes/dbconfig.php';

try {
    echo "<h3>Demonstrating UPDATE Operation</h3>";
    
    // Show item before update
    $select_sql = "SELECT * FROM grocery_items WHERE id = 2";
    $before = $pdo->query($select_sql)->fetch();
    
    echo "Before update:<br>";
    echo "<pre>";
    print_r($before);
    echo "</pre>";
    
    // SQL query to update item price and quantity
    $sql = "UPDATE grocery_items 
            SET price = :price, quantity_in_stock = :quantity 
            WHERE id = :id";
    
    $stmt = $pdo->prepare($sql);
    
    // Execute update
    $stmt->execute([
    'price' => 1.80,    // Changed from 1.50
    'quantity' => 180,  // Changed from 200  
    'id' => 2
    ]);
    
    // Show item after update
    $after = $pdo->query($select_sql)->fetch();
    
    echo "After update:<br>";
    echo "<pre>";
    print_r($after);
    echo "</pre>";
    
    echo "Record updated successfully!";
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>