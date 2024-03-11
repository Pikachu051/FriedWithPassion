<?php
class MyDB extends SQLite3 {
  function __construct() {
     $this->open('fwp.db');
  }
}

// 2. Open Database 
$db = new MyDB();
if(!$db) {
  die($db->lastErrorMsg());
} else {
  
}
$sql = "SELECT * FROM order_history;";
$ret = $db->query($sql);
if ($ret->numColumns() > 0) {
  while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
    echo "<tr class=\"hover:bg-orange-200\">
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 history-no\">" . $row["history_no"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 menu-no \">" . $row["menu_no"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 type\">" . $row["type"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 quantity\">" . $row["quantity"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 note\">" . $row["note"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 date_time\">" . $row["date_time"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 total\">" . $row["total"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 reveiw-id\">" . $row["review_id"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-end text-sm font-medium\">
              </td>
            </tr>";

  }
}
?>
