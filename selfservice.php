<?php
    session_start();
    if (isset($_POST['table_no'])) {
        $_SESSION['table_no'] = $_POST['table_no'];
        header('Location: ' . $_SERVER['REQUEST_URI']); // Redirect to same page
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
        <header class="bg-orange-300">
            <div class="p-4">
            <h1 id="selectedTable" class="text-2xl font-bold">โต๊ะ: <?php echo isset($_SESSION['table_no']) ? $_SESSION['table_no'] : '-'; ?></h1>
            </div>
        </header>
    <div id="openingModal" class="modal">
        <div class="modal-content rounded-md">
            <span class="close" onclick="closeModal()"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg></span>
            <h1 class="text-center font-bold text-2xl">ยินดีต้อนรับ</h1>
            <h3 class="text-center font-semibold text-xl">กรุณาเลือกรูปแบบการสั่งซื้อ</h3>
            <div class="item-center grid grid-cols-2 mt-4">
            <form action="">
                <input type="submit" name="takeaway" value="สั่งกลับบ้าน (Takeaway)" class="w-[90%] text-center p-2 m-4 bg-orange-300 rounded-md hover:cursor-pointer hover:bg-orange-200"></input>
            </form>
            <button onclick="openDineInModal()" value="ทานที่นี่ (Dine-in)" class="text-center p-2 m-4 mt-4 bg-orange-300 rounded-md hover:cursor-pointer hover:bg-orange-200">ทานที่นี่ (Dine-in)</button>

            </div>
        </div>
    </div>

    <div id="dineInModal" class="modal">
        <div class="modal-content rounded-md">
            <span class="close" onclick="closeDineInModal()"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg></span>
            <h3 class="text-center font-semibold text-xl">กรุณาเลือกโต๊ะที่ท่านต้องการนั่ง</h3>
            <form action="selfservice.php">
            <div class="item-center grid grid-cols-4 mt-4">
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
                        $sql = "SELECT * FROM table_status;";
                        $ret = $db->query($sql);
                        if ($ret->numColumns() > 0) {
                            while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
                                if ($row["table_status"] == "ว่าง") {
                                    echo "<input type=\"submit\" name=\"" . $row["table_no"] . "\" value=\"โต๊ะที่ " . $row["table_no"] . "\" class=\"text-center p-2 m-4 bg-orange-300 rounded-md hover:cursor-pointer hover:bg-orange-200\"></input>";
                                } else {
                                    echo "<button value=\"โต๊ะที่ " . $row["table_no"] . "\" disabled class=\"text-center p-2 m-4 bg-red-300 rounded-md hover:cursor-no-drop hover:bg-red-200\">โต๊ะที่ " . $row["table_no"] . "</button>";
                                }
                            }
                        }
                     }
                ?>
            </form>
        </div>
    </div>

    <script>
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
            if (<?php echo isset($_SESSION['table_no']) ? 'true' : 'false'; ?>) {
            document.getElementById("openingModal").style.display = "none"; // Hide opening modal if table selected
            } else {
                openModal(); // Open opening modal if no table selected
            }
        });

    </script>

</body>

</html>