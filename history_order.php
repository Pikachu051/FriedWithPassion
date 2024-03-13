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
}

$sql = "SELECT * FROM order_history;";
$ret = $db->query($sql);

if ($ret === false) {
  die("Error executing the query: " . $db->lastErrorMsg());
}

if ($ret->numColumns() > 0) {
  while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
    $que = "SELECT * FROM menu WHERE menu_no =" . $row['menu_no'];
    $menu_result = $db->query($que);
    $menu_row = $menu_result->fetchArray(SQLITE3_ASSOC);

    if ($row['review_id'] === null) {
      echo "<tr class=\"hover:bg-orange-200\">
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 history-no\">" . $row["history_no"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 menu-no \">" . $row["menu_no"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 menu-no \">" .  $menu_row["menu_name"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 type\">" . $row["type"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 quantity\">" . $row["quantity"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 date_time\">" . $row["date_time"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 total\">" . number_format($row["total"], 2) . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 review-id\"> - </td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 review-score\"> - </td>
              <td class=\"px-6 py-4 whitespace-nowrap text-end text-sm font-medium\">
              </td>
            </tr>";;
    } else {
    $query = "SELECT * FROM review WHERE review_id =" . $row['review_id'];
    $review_result = $db->query($query);
    
    if ($review_result === false) {
      die("Error executing the review query: " . $db->lastErrorMsg());
    }
    
    $review_row = $review_result->fetchArray(SQLITE3_ASSOC);
    $comment = $review_row ? $review_row['comment'] : '';

    

    echo "<tr class=\"hover:bg-orange-200\">
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 history-no\">" . $row["history_no"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 menu-no \">" . $row["menu_no"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 menu-no \">" .  $menu_row["menu_name"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 type\">" . $row["type"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 quantity\">" . $row["quantity"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 date_time\">" . $row["date_time"] . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 total\">" . number_format($row["total"], 2) . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 review-id\">" . $comment . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800 review-score\">" . ($review_row ? $review_row['score'] : '') . "</td>
              <td class=\"px-6 py-4 whitespace-nowrap text-end text-sm font-medium\">
              </td>
            </tr>";
    }
  }
}

?>
