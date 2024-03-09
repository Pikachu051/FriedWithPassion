<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FWP: Self Service - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-orange-100">
    <style>
    .modal {
        display: none;
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
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        height: auto;
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

    <button onclick="openModal()">Open Modal</button>

    <div id="myModal" class="modal">
        <div class="modal-content rounded-md">
            <span class="close" onclick="closeModal()"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 6l-12 12" /><path d="M6 6l12 12" /></svg></span>
            <h1 class="text-center font-bold text-2xl">ยินดีต้อนรับ</h1>
            <h3 class="text-center font-semibold text-xl">กรุณาเลือกรูปแบบการสั่งซื้อ</h3>
            <div class="item-center grid grid-cols-2 mt-4">
            <input value="สั่งกลับบ้าน (Takeaway)" class="text-center p-2 m-4 bg-orange-300 rounded-md hover:cursor-pointer hover:bg-orange-200"></input>
            <input value="ทานที่นี่ (Dine-in)" class="text-center p-2 m-4 mt-4 bg-orange-300 rounded-md hover:cursor-pointer hover:bg-orange-200"></input>
            </div>
        </div>
    </div>

    <script>
    function openModal() {
        document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("myModal").style.animationName = "modalclose";
        setTimeout(function() {
            document.getElementById("myModal").style.display = "none";
            document.getElementById("myModal").style.animationName = "modalopen";
        }, 300);
    }

    </script>
</body>
</html>