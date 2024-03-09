<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FriedWithPassion: Table Status</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: 'Prompt', sans-serif;
            background-color: #FFECD9;
        }
        .main{
            padding: 20px;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .table1 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 60px;
            justify-content: center;
            padding: 0px;
            margin-left: 50%;
            margin-right: 50%;
        }

        .column1 {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 60px;
            justify-content: center;
            padding: 20px;
        }

        .shape-container {
            display: flex;
            align-items: center;
        }

        .rectangle {
            width: 190px;
            height: 75px;
            background-color: #FFB871;
            justify-content: center;
            /* Initial color */
            cursor: pointer;
            border-radius: 5px;
            filter: drop-shadow(0 20px 13px rgb(0 0 0 / 0.03)) drop-shadow(0 8px 5px rgb(0 0 0 / 0.08));
        }

        .circle {
            width: 22px;
            height: 22px;
            background-color: rgb(0, 177, 0);
            /* Initial color */
            border-radius: 50%;
            cursor: pointer;
            margin-left: 20px;
            transition: all 0.3s;
            box-shadow: 0 0 5px 5px #00bf46;/* inner white */
        }
        h2{
            font-weight: 700;
            font-size: 38px;
        }
        h2, h3{
            text-align: center;
        }
        h3{
            font-weight: 500;
            margin: 24px;
        }
        @media screen and (max-width: 650px){
            .table1 {
                grid-template-columns: repeat(2, 1fr);
                grid-gap: 20px;
            }
            .rectangle {
                width: 150px;
                height: 60px;
            }
            .circle {
                width: 15px; 
                height: 15px;
            }
            h3{
                font-weight: 500;
                margin: 18px;
            }
            h2{
                font-size: 32px;
            }
        }
    </style>
</head>

<body>
<header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-orange-300 text-sm py-4">
  <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
    <div class="flex items-center justify-between">
        <a class="flex-none text-xl font-semibold" href="main_staff.php"><img src="public/fwp-logo-color.png" class="w-auto h-[40px]"></a>
      <div class="sm:hidden">
        <button type="button" onclick="menu()" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-orange-200 bg-orange-100 text-gray-800 shadow-sm hover:bg-orange-50 disabled:opacity-50 disabled:pointer-events-none" aria-label="Toggle navigation">
          <svg id="icon_open" class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg id="icon_close" class="hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
      </div>
    </div>
    <div id="collapse" class="hidden overflow-hidden transition-all duration-300 basis-full grow sm:block">
      <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5">
        <a class="font-medium text-gray-800 hover:text-gray-400" href="main_staff.php">หน้าหลัก</a>
        <a class="font-medium text-orange-600" href="#" aria-current="page">สถานะโต๊ะ</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="queue.php">คิวอาหาร</a>
        <a class="font-medium text-gray-800 hover:text-gray-400" href="menu_status.php">สถานะเมนู</a>
        <form action="logout.php" method="post">
            <input type="submit" value="ออกจากระบบ" class="font-medium text-gray-800 hover:text-gray-400 hover:cursor-pointer">
        </form>
      </div>
    </div>
  </nav>
</header>
    <div>
        <div class="main">
            <h2 style="margin: 0;">สถานะโต๊ะ</h2>
        </div>
        <div class="table1">
            <div class="column1">
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
            } else {
               
            }
                $table_no = 1;
                while ($table_no <= 5) {
                    $query = "SELECT table_no, table_status FROM table_status LIMIT 1 OFFSET ".($table_no - 1);
                    $result = $db->query($query);
            
                    // Fetch table status
                    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                        $table_no = $row['table_no'];
                        $table_status = $row['table_status'];
                    
                        // Display table status
                        echo "<div class=\"shape-container\">";
                        echo "<div class=\"rectangle\" id=\"rectangle$table_no\" onclick=\"changeColor('circle$table_no')\">";
                        echo "<h3>โต๊ะ $table_no</h3>";
                        echo "</div>";
                        echo "<div class=\"circle\" id=\"circle$table_no\"></div>";
                        echo "</div>";
                    }
            
                    $table_no++;
                }

                ?>
            </div>
            <div class="column1">
                <?php
                $table_no = 6;
                while ($table_no <= 10) {
                    $query = "SELECT table_no, table_status FROM table_status LIMIT 1 OFFSET ".($table_no - 1);
                    $result = $db->query($query);
            
                    // Fetch table status
                    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                        $table_no = $row['table_no'];
                        $table_status = $row['table_status'];
                    
                        // Display table status
                        echo "<div class=\"shape-container\">";
                        echo "<div class=\"rectangle\" id=\"rectangle$table_no\" onclick=\"changeColor('circle$table_no')\">";
                        echo "<h3>โต๊ะ $table_no</h3>";
                        echo "</div>";
                        echo "<div class=\"circle\" id=\"circle$table_no\"></div>";
                        echo "</div>";
                    }
            
                    $table_no++;
                }
                ?>
            </div>
            <div class="column1">
                <?php
                 $table_no = 11;
                 while ($table_no <= 15) {
                     $query = "SELECT table_no, table_status FROM table_status LIMIT 1 OFFSET ".($table_no - 1);
                     $result = $db->query($query);
             
                     // Fetch table status
                     if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                         $table_no = $row['table_no'];
                         $table_status = $row['table_status'];
                     
                         // Display table status
                         echo "<div class=\"shape-container\">";
                         echo "<div class=\"rectangle\" id=\"rectangle$table_no\" style=\"background-color: #833F00;\" onclick=\"changeColor('circle$table_no')\">";
                         echo "<h3 style=\"-webkit-text-fill-color: rgb(255, 255, 255);\">โต๊ะ $table_no</h3>";
                         echo "</div>";
                         echo "<div class=\"circle\" id=\"circle$table_no\"></div>";
                         echo "</div>";;
                     }
             
                     $table_no++;
                 }
                ?>
            </div>
        </div>
    </div>
    <script>
        function menu() {
        var x = document.getElementById("collapse");
        var y = document.getElementById("icon_open");
        var z = document.getElementById("icon_close");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "block";
        } else {
            x.style.display = "none";
            y.style.display = "block";
            z.style.display = "none";
        }
        }
    function changeColor(id) {
    var shape = document.getElementById(id);

    
    if (shape.classList.contains('rectangle') || shape.classList.contains('circle')) {
        var currentColor = shape.style.backgroundColor;
        if (currentColor === 'rgb(0, 177, 0)'|| currentColor === '') {
            shape.style.backgroundColor = 'rgb(230, 0, 0)';
            shape.style.boxShadow = 'rgb(255, 0, 0) 0px 0px 5px 5px';
            updateTableStatus(id, 'ไม่ว่าง'); 
        } else {
            shape.style.backgroundColor = 'rgb(0, 177, 0)';
            shape.style.boxShadow = 'rgb(0, 191, 70) 0px 0px 5px 5px';
            updateTableStatus(id, 'ว่าง'); 
        }
    }
    
}

function updateTableStatus(tableId, newStatus) {
    var tableNumber = tableId.replace('circle', ''); 
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText); 
        }
    };
    xhttp.open("POST", "update_table_status.php", true); 
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("table_number=" + tableNumber + "&new_status=" + newStatus); 
}

function setButtonColorBasedOnStatus(tableNo, buttonId, status) {
    var button = document.getElementById(buttonId);


        if (status === 'ไม่ว่าง') {
            changeColor(buttonId)
        }
        else{
            button.style.backgroundColor = 'rgb(0, 177, 0)';
            button.style.boxShadow = 'rgb(0, 191, 70) 0px 0px 5px 5px';
        }
    }

    window.onload = function() {
    <?php
    $query = "SELECT table_no, table_status FROM table_status";
    $result = $db->query($query);

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $table_no = $row['table_no'];
        $table_status = $row['table_status'];

        // Display table status
        echo "setButtonColorBasedOnStatus($table_no, 'circle$table_no', '$table_status');\n";
    }
    ?>
}



    </script>
</body>

</html>