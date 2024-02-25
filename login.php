<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWP:Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>
<body class="flex">
    <div class="w-50 bg-orange-300 h-[100vh]">
        <h1 class="font-bold mt-3 ml-5">FWP<p class="text-2xl">: Authentication</p></h1>
        <div class="relative top-[11.5%] bg-orange-200 m-5 rounded-lg shadow-2xl border-1 border-orange-400">
            <h2 class="text-center font-bold text-2xl pt-5 pl-5 pr-5">เข้าสู่ระบบ</h2>
            <form action="login.php" class="p-5" method="post">
                <label>ชื่อผู้ใช้</label>
                <input class="form-control prompt-regular" type="text" name="username" placeholder="Username" required>
                <label class="mt-3">รหัสผ่าน</label>
                <input class="form-control prompt-regular" type="password" name="password" placeholder="Password" required>
                <div class="mt-3 text-center">
                    <input class="prompt-medium button btn btn-primary" type="submit" value="เข้าสู่ระบบ">
                </div>
            </form>
        </div>
        <p id="time" class="text-center font-medium"></p>
    </div>
    <div class="w-50 h-[100vh]">
        <img class="object-cover w-[100%] h-[100vh]" src="./public/login.png">
    </div>

</body>
<script>
    var timeDisplay = document.getElementById("time");

    function refreshTime() {
        var dateString = new Date().toLocaleString("en-US", {timeZone: "Asia/Bangkok"});
        var formattedString = dateString.replace(", ", " - ");
        timeDisplay.innerHTML = formattedString;
    }

    setInterval(refreshTime, 1000);
</script>
</html>