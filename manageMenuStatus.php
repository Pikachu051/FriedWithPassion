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
$sql = "SELECT * FROM menu;";
$ret = $db->query($sql);
if ($ret->numColumns() > 0) {
  while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
    echo "<tr class=\"hover:bg-orange-200\">
                  <td class=\"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800\"><img class=\"object-cover h-[75px] w-[75px] rounded-md\" src=\"" . $row["img_path"] . "\"></td>
                  <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">" . $row["menu_name"] . "</td>
                  <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">" . $row["stock"] . "</td>
                  <td class=\"px-6 py-4 whitespace-nowrap text-end text-sm font-medium\">
                  <input id=\"" . $row["menu_no"] . "\" value=\"เปลี่ยนสถานะเมนู\" name=\"sold\" type=\"submit\"
                  class=\"inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 hover:cursor-pointer disabled:opacity-50 disabled:pointer-events-none\"></input>
                  </td>
                </tr>";
  }
}
