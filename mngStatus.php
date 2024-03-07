<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fwp_project"; // change to your db
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$getMenu = "SELECT img_path, menu_name, stock FROM menu;";
$result = mysqli_query($conn, $getMenu);
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr class=\"hover:bg-orange-200\">
                  <td class=\"px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800\"><img src=\"" . $row["img_path"] . "\"></td>
                  <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">" . $row["menu_name"] . "</td>
                  <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-800\">" . $row["stock"] . "</td>
                  <td class=\"px-6 py-4 whitespace-nowrap text-end text-sm font-medium\">
                    <button type=\"button\"
                      class=\"inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 disabled:opacity-50 disabled:pointer-events-none\">Delete</button>
                  </td>
                </tr>";
}
