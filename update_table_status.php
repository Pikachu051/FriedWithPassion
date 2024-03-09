<?php
// 1. Connect to Database 
class MyDB extends SQLite3 {
    function __construct() {
        $this->open('fwp.db');
    }
}

// 2. Open Database 
$db = new MyDB();
if(!$db) {
    die($db->lastErrorMsg());
}

// 3. Get table number and new status from AJAX request
$tableNumber = $_POST['table_number'];
$newStatus = $_POST['new_status'];

// 4. Update table status in database
$query = "UPDATE table_status SET table_status = '$newStatus' WHERE table_no = $tableNumber";
$result = $db->exec($query);

if (!$result) {
    echo "Error updating table status: " . $db->lastErrorMsg();
} else {
    echo "Table status updated successfully.";
}

// 5. Close database connection
$db->close();
?>
