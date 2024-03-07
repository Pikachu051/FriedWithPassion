<?php
session_start();

if (isset($_SESSION['mngLoggedin']) && $_SESSION['mngLoggedin'] === true) {
    header("Location: main_manager.php");
    exit();
} else if (isset($_SESSION['stfLoggedin']) && $_SESSION["stfLoggedin"] === true) {
    header("Location: main_staff.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWP:Login</title>
    <link rel="stylesheet" href="style.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
    <script src="script.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>
</head>

<body class="flex prompt">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "fwp_project"; // change to your db
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST["username"]) && isset($_POST["password"])) { // main login verification function
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $getPw = "SELECT pass FROM accounts WHERE username = '$user';";
        $getPos = "SELECT position FROM employees JOIN accounts USING (emp_id) WHERE username = '$user';";
        $getFn = "SELECT first_name FROM employees JOIN accounts USING (emp_id) WHERE username = '$user';";
        $pwResult = mysqli_query($conn, $getPw);
        $posResult = mysqli_query($conn, $getPos);
        $fnResult = mysqli_query($conn, $getFn);

        if ($pwResult && mysqli_num_rows($pwResult) == 1) {
            $pwRow = mysqli_fetch_assoc($pwResult);
            $hashed_password = $pwRow['pass'];
            $posRow = mysqli_fetch_assoc($posResult);
            $position = $posRow['position'];
            $fnRow = mysqli_fetch_assoc($fnResult);
            $fname = $fnRow['first_name'];

            if (password_verify($pass, $hashed_password) && $position == 'ผู้จัดการ') { // for manager
                $_SESSION['mngLoggedin'] = true;
                $_SESSION['user'] = $fname;
                header("Location: main_manager.php");
                exit();
            } else if (password_verify($pass, $hashed_password) && $position == "พนักงาน") { // for staff
                $_SESSION['stfLoggedin'] = true;
                $_SESSION['user'] = $fname;
                header("Location: main_staff.php");  // change to actual staff page
                exit();
            }
        }
        echo "<div id=\"alert\" class=\"block absolute top-4 start-[16%] w-[20rem] bg-orange-100 border text-sm rounded-lg border-red-900 text-red-500\" role=\"alert\">
                    <div class=\"flex p-4\">
                        <div>
                            <h5 class=\"font-bold text-lg\">เข้าสู่ระบบล้มเหลว</h5>
                            <p>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</p>
                        </div>
                        <div class=\"my-auto mx-0 text-right ms-auto\">
                            <button type=\"button\" onclick=\"close_alert()\" class=\"inline-flex flex-shrink-0 justify-center items-center size-5 rounded-lg text-red-500 opacity-50 hover:opacity-100 focus:outline-none focus:opacity-100\">
                                <span class=\"sr-only\">Close</span>
                                <svg class=\"flex-shrink-0 size-4\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M18 6 6 18\"/><path d=\"m6 6 12 12\"/></svg>
                            </button>
                        </div>
                    </div>
                </div>";
    }
    ?>
    <div class="w-[100vw] bg-orange-300 h-[100vh] sm:w-[50vw] md:w-[50vw]">
        <div class=" grid grid-cols-2 gap-4 w-[100%]">
            <img src="public/fwp-logo-color.png" class=" w-auto h-[75px] m-4" alt="logo">
            <p id="time" class="mx-4 my-3 text-right font-medium"></p>
        </div>
        <div class="mx-10 my-[20vh] bg-orange-200 rounded-lg shadow-2xl border-1 border-orange-400">
            <h2 class="text-center font-bold text-2xl pt-5 pl-5 pr-5">เข้าสู่ระบบ</h2>
            <form action="login.php" class="p-5" method="post">
                <label for="input-label" class="block text-sm font-medium mb-2">ชื่อผู้ใช้</label>
                <input
                    class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-2 focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    type="text" name="username" placeholder="Username" required>
                <label for="input-label" class="block text-sm font-medium mt-4 mb-2">รหัสผ่าน</label>
                <input
                    class="py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-2 focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    type="password" name="password" placeholder="Password" required>
                <div class="mt-5 text-center">
                    <input class="prompt-medium button btn btn-primary" type="submit" value="เข้าสู่ระบบ">
                </div>
            </form>

        </div>
    </div>
    <div class="w-[50vw] h-[100vh] hidden sm:block md:block">
        <img class="object-cover w-[100%] h-[100vh]" src="./public/login.png">
    </div>

</body>
<script>
    var timeDisplay = document.getElementById("time");

    function refreshTime() {
        var dateString = new Date().toLocaleString("en-US", { timeZone: "Asia/Bangkok" });
        var formattedString = dateString.replace(", ", " - ");
        timeDisplay.innerHTML = formattedString;
    }

    setInterval(refreshTime, 1000);
</script>

</html>