<?php
/**
 * Demonstration of rendering SQL results in HTML table
 * Displays grocery items in a formatted table
 */

require_once '../includes/dbconfig.php';

try {
    // Complex SQL query with multiple conditions and sorting
    $sql = "SELECT 
                id,
                item_name AS 'Product Name',
                category AS 'Category',
                CONCAT('$', price) AS 'Price',
                quantity_in_stock AS 'Stock',
                expiry_date AS 'Expiry Date',
                supplier AS 'Supplier',
                CASE 
                    WHEN is_organic = 1 THEN 'Yes'
                    ELSE 'No'
                END AS 'Organic'
            FROM grocery_items 
            ORDER BY 
                category ASC,
                price DESC";
    
    $stmt = $pdo->query($sql);
    $items = $stmt->fetchAll();
    
    echo "<h3>Grocery Items - HTML Table Display</h3>";
    
    if (count($items) > 0) {
        echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse; width: 100%;'>";
        
        // Table header
        echo "<tr style='background-color: #f2f2f2;'>";
        foreach(array_keys($items[0]) as $column) {
            echo "<th>" . htmlspecialchars($column) . "</th>";
        }
        echo "</tr>";
        
        // Table rows
        foreach($items as $row) {
            echo "<tr>";
            foreach($row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
        
        echo "</table>";
        
        // Show record count
        echo "<p><strong>Total items displayed: " . count($items) . "</strong></p>";
    } else {
        echo "No grocery items found.";
    }
    
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>