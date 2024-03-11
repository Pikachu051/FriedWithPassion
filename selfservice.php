<?php
    session_start();

    // Check if the order type is set and update the session variable
    if (isset($_POST['takeaway'])) {
        $_SESSION['order_type'] = 'takeaway';
        header('Location: ' . $_SERVER['REQUEST_URI']); // Redirect to the same page
        exit; // Stop script execution after redirect
    }

    if (isset($_POST['table_no'])) {
        $_SESSION['table_no'] = $_POST['table_no'];
        unset($_SESSION['order_type']); // Clear order type when selecting a table
        header('Location: ' . $_SERVER['REQUEST_URI']); // Redirect to the same page
        exit; // Stop script execution after redirect
    }

    if (isset($_POST['change_option'])) {
        unset($_SESSION['table_no']); // Clear old table selection
        unset($_SESSION['order_type']); // Clear old order type
        header('Location: ' . $_SERVER['REQUEST_URI']); // Redirect to the same page to start fresh
        exit; // Stop script execution after redirect
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWP: Self Service - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .modal {
            display: none;
            justify-content: center;
            align-items: center;
            vertical-align: middle;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            animation-name: modalopen;
            animation-duration: 0.3s;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @keyframes modalopen {
            from {
                opacity: 0;
                transform: translateY(-50%);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes modalclose {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-50%);
            }
        }
    </style>
</head>
<body class="bg-orange-100">
    <div class="bg-orange-100">
        <header class="bg-orange-300 grid grid-cols-2">
                <h1 id="selectedTable" class="text-xl font-bold m-5"><?php
                        if (isset($_SESSION['table_no'])) {
                            echo "<p class=\"\">สั่งอาหารสำหรับ" . $_SESSION['table_no'] . "</p>";
                        } elseif (isset($_SESSION['order_type']) && $_SESSION['order_type'] == 'takeaway') {
                            echo 'สั่งกลับบ้าน';
                        } else {
                            echo 'กรุณาเลือกรูปแบบการสั่งซื้อ';
                        }
                    ?></h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="submit" name="change_option" value="เลือกรูปแบบการสั่งซื้อใหม่ / ยกเลิก" class="text-center p-2 m-4 bg-orange-200 rounded-md hover:cursor-pointer hover:bg-orange-100 float-right" onclick="resetTableStatus()">
                </form>
        </header>
        <h1 class="text-3xl font-bold text-center mt-6">เมนู</h1>
    <div class="mx-6 mt-6 grid grid-cols-2 gap-6">
        <div class="bg-white p-5 rounded-md text-center">
            <img src="menu_img/menu101.png" alt="เบอร์เกอร์ไก่" class="w-[150px] object-cover rounded-md mx-auto">
            <h3 class="font-semibold text-lg">เบอร์เกอร์อะไรสักอย่าง</h3>
            <p>ราคา: 45 บาท</p>
            <div class="w-[100%] flex mt-3 justify-center">
                <div class="item-center flex justify-center">
                    <button class="w-6 mx-3 rounded-full bg-orange-100 hover:bg-orange-200" id="button-1" onclick="decrement('quantity1', 'button-1')" disabled>-</button>
                        <p class="mx-3" id="quantity1">0</p>
                    <button class="w-6 mx-3 rounded-full bg-orange-300 hover:bg-orange-200 transition-all" onclick="increment('quantity1', 'button-1')">+</button>
                </div>
            </div>
        </div>
        <div class="bg-white p-5 rounded-md text-center">
            <img src="menu_img/menu102.png" alt="เบอร์เกอร์ไก้" class="w-[150px] object-cover rounded-md mx-auto">
            <h3 class="font-semibold text-lg">เบอร์เกอร์หมูเบคอนฮาลาล</h3>
            <p>ราคา: 45 บาท</p>
            <div class="w-[100%] flex mt-2 justify-center">
                <div class="item-center flex justify-center">
                    <button class="w-6 mx-3 rounded-full bg-orange-100 hover:bg-orange-200" id="button-2" onclick="decrement('quantity2', 'button-2')" disabled>-</button>
                        <p class="mx-3" id="quantity2">0</p>
                    <button class="w-6 mx-3 rounded-full bg-orange-300 hover:bg-orange-200 transition-all" onclick="increment('quantity2', 'button-2')">+</button>
                </div>
            </div>
        </div> 
    </div>
    <div>
    <form action="cart.php" method="post" class="mx-auto fixed bottom-[20px] right-[20px]">
        <label class="">
            <input type="submit" name="submit" value="สั่งอาหาร" class="hidden rounded-full text-center p-2 m-4 bg-orange-300 hover:cursor-pointer hover:bg-orange-200 big round">
            <svg xmlns="http://www.w3.org/2000/svg"  width="48"  height="18"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="shadow-md icon icon-tabler icons-tabler-outline icon-tabler-shopping-cart bg-orange-300 rounded-full text-3xl h-12 hover:cursor-pointer hover:bg-orange-200 transition-all"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M17 17h-11v-14h-2" /><path d="M6 5l14 1l-1 7h-13" /></svg>
        </label>
    </form>
    </div>
    <div id="openingModal" class="modal">
        <div class="modal-content rounded-md">
            <span class="close" onclick="closeModal()"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg></span>
            <h1 class="text-center font-bold text-2xl">ยินดีต้อนรับ</h1>
            <h3 class="text-center font-semibold text-xl">กรุณาเลือกรูปแบบการสั่งซื้อ</h3>
            <div class="item-center grid grid-cols-2 mt-4">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="submit" name="takeaway" value="สั่งกลับบ้าน (Takeaway)" class="w-[90%] text-center p-2 m-4 bg-orange-300 rounded-md hover:cursor-pointer hover:bg-orange-200">
            </form>
            <button onclick="openDineInModal()" value="ทานที่นี่ (Dine-in)" class="text-center p-2 m-4 mt-4 bg-orange-300 rounded-md hover:cursor-pointer hover:bg-orange-200">ทานที่นี่ (Dine-in)</button>
        </div>
    </div>
    </div>

    <div id="dineInModal" class="modal">
        <div class="modal-content rounded-md">
            <span class="close" onclick="closeDineInModal()"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg></span>
            <h3 class="text-center font-semibold text-xl">กรุณาเลือกโต๊ะที่ท่านต้องการนั่ง</h3>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="item-center grid grid-cols-4 mt-4">
                <?php
                    class MyDB extends SQLite3 {
                        function __construct() {
                           $this->open('fwp.db');
                        }
                     }
                  
                     $db = new MyDB();
                     if(!$db) {
                        die($db->lastErrorMsg());
                     } else {
                        $sql = "SELECT * FROM table_status;";
                        $ret = $db->query($sql);
                        if ($ret->numColumns() > 0) {
                            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                                if ($row["table_status"] == "ว่าง") {
                                    echo "<input type=\"submit\" name=\"table_no\" value=\"โต๊ะที่ " . $row["table_no"] . "\" class=\"text-center p-2 m-4 bg-orange-300 rounded-md hover:cursor-pointer hover:bg-orange-200\" onclick=\"selectTable('" . $row["table_no"] . "')\">";
                                } else {
                                    echo "<button value=\"โต๊ะที่ " . $row["table_no"] . "\" disabled class=\"text-center p-2 m-4 bg-red-300 rounded-md hover:cursor-no-drop hover:bg-red-200\">โต๊ะที่ " . $row["table_no"] . "</button>";
                                }
                            }
                        }
                     }
                ?>
            </div>
            </form>
        </div>
    </div>

    <script>
        function increment(id, buttonId) {
            var quantity = parseInt(document.getElementById(id).innerHTML);
            document.getElementById(id).innerHTML = quantity + 1;
            quantity = quantity + 1;
            if (quantity > 0) {
                document.getElementById(buttonId).disabled = false;
                document.getElementById(buttonId).classList.remove("bg-orange-100");
                document.getElementById(buttonId).classList.add("bg-orange-300");
            }
        }
        function decrement(id, buttonId) {
            var quantity = parseInt(document.getElementById(id).innerHTML);
            if (quantity > 0) {
                document.getElementById(id).innerHTML = quantity - 1;
            }
            quantity = quantity - 1;
            if (quantity == 0) {
                document.getElementById(buttonId).disabled = true;
                document.getElementById(buttonId).classList.remove("bg-orange-300");
                document.getElementById(buttonId).classList.add("bg-orange-100");
            }
        }
        var formSubmitted = <?php echo isset($_SESSION['form_submitted']) && $_SESSION['form_submitted'] ? 'true' : 'false'; ?>;
        if (formSubmitted) {
            document.getElementById("openingModal").style.display = "none";
        }
        function openModal() {
            document.getElementById("openingModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("openingModal").style.animationName = "modalclose";
            setTimeout(function() {
                document.getElementById("openingModal").style.display = "none";
                document.getElementById("openingModal").style.animationName = "modalopen";
            }, 50);
        }

        function openDineInModal() {
            document.getElementById("dineInModal").style.display = "block";
        }

        function closeDineInModal() {
            document.getElementById("dineInModal").style.animationName = "modalclose";
            setTimeout(function() {
                document.getElementById("dineInModal").style.display = "none";
                document.getElementById("dineInModal").style.animationName = "modalopen";
            }, 50);
        }

        window.addEventListener('DOMContentLoaded', function() {
    var orderType = '<?php echo isset($_SESSION['order_type']) ? $_SESSION['order_type'] : ''; ?>';
    if (orderType === 'takeaway') {
        document.getElementById("openingModal").style.display = "none"; // Hide opening modal if order type is already set to takeaway
    } else if (<?php echo isset($_SESSION['table_no']) ? 'true' : 'false'; ?>) {
        document.getElementById("openingModal").style.display = "none"; // Hide opening modal if table selected
    } else {
        openModal(); // Open opening modal if neither table nor order type is set
    }
});


    function updateTableStatus(tableId, newStatus) {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "update_table_status.php", true); 
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("table_number=" + tableId + "&new_status=" + newStatus); 
    if (xhttp.readyState == 4 && xhttp.status == 200) {
        console.log(xhttp.responseText);
    }
}


    // ปรับปรุง function ให้เซตสถานะของโต๊ะที่เลือกเป็น "ไม่ว่าง"
    function selectTable(tableId) {
        updateTableStatus(tableId, 'ไม่ว่าง');
    }

    // เพิ่ม function เพื่อเซตสถานะของโต๊ะเก่าเป็น "ว่าง" เมื่อกดปุ่ม "เลือกรูปแบบการสั่งซื้อใหม่"
    function resetTableStatus() {
    var oldTableId = <?php echo isset($_SESSION['table_no']) ? "'" . str_replace('โต๊ะที่ ', '', $_SESSION['table_no']) . "'" : "''"; ?>;
    if (oldTableId) {
        updateTableStatus(oldTableId, 'ว่าง');
    }
}

    </script>

</body>

</html>
