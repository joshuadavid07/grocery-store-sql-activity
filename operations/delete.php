<?php
/**
 * Demonstration of DELETE operation
 * Removes record from grocery_items table
 */

require_once '../includes/dbconfig.php';

try {
    // First, let's see what we're deleting
    $check_sql = "SELECT * FROM grocery_items WHERE item_name = :item_name";
    $check_stmt = $pdo->prepare($check_sql);
    $check_stmt->execute(['item_name' => 'Banana']);
    $item_to_delete = $check_stmt->fetch();
    
    echo "<h3>Demonstrating DELETE Operation</h3>";
    
    if ($item_to_delete) {
        echo "Item to delete:<br>";
        echo "<pre>";
        print_r($item_to_delete);
        echo "</pre>";
        
        // SQL query to delete item
        $sql = "DELETE FROM grocery_items WHERE item_name = :item_name";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['item_name' => 'Greek Yogurt']);
        
        echo "Item deleted successfully!";
    } else {
        echo "Item not found for deletion.";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>