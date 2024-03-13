<?php

$thaiMonthNames = array(
    '01' => 'มกราคม',
    '02' => 'กุมภาพันธ์',
    '03' => 'มีนาคม',
    '04' => 'เมษายน',
    '05' => 'พฤษภาคม',
    '06' => 'มิถุนายน',
    '07' => 'กรกฎาคม',
    '08' => 'สิงหาคม',
    '09' => 'กันยายน',
    '10' => 'ตุลาคม',
    '11' => 'พฤศจิกายน',
    '12' => 'ธันวาคม'
);

$db = new MyDB();
if (!$db) {
    die($db->lastErrorMsg());
}
$sql = "SELECT strftime('%m', date_time) AS label, SUM(total) AS y FROM order_history GROUP BY label ORDER BY label;";
$ret = $db->query($sql);
$jsonDataArray = [];
while ($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    // Convert month label to Thai month name
    $row['label'] = $thaiMonthNames[$row['label']];
    $jsonDataArray[] = $row;
}


// Convert array to JSON format
$jsonData = json_encode($jsonDataArray);

// Output JSON to a file
$jsonFile = 'sales.json';

try {
    // Write JSON data to the file
    file_put_contents($jsonFile, $jsonData);
} catch (Exception $e) {
    die("Error writing JSON data to file: " . $e->getMessage());
}

$dataPoints = file_get_contents("sales.json");