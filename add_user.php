<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #FFECD9;
            padding-top: 50px;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="text-center">
            <h1>เพิ่มผู้ใช้ใหม่</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="post" action="manage_Accounts.php">
                    <div class="form-group">
                        <label for="posbox">ตำเเหน่ง:</label>
                        <select class="form-control" id="posbox" name="posbox" required onchange="toggleIdBox()">
                            <option value="พนักงาน">พนักงาน</option>
                            <option value="ผู้จัดการ">ผู้จัดการ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="idbox">รหัสพนักงาน:</label>
                        <input type="text" class="form-control" id="idbox" name="idbox" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="fnbox">ชื่อ:</label>
                        <input type="text" class="form-control" id="fnbox" name="fnbox" required>
                    </div>
                    <div class="form-group">
                        <label for="lnbox">นามสกุล:</label>
                        <input type="text" class="form-control" id="lnbox" name="lnbox" required>
                    </div>
                    <div class="form-group">
                        <label for="sexbox">เพศ:</label>
                        <select class="form-control" id="sexbox" name="sexbox" required>
                            <option value="ช">ชาย</option>
                            <option value="ญ">หญิง</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="emailbox">อีเมล:</label>
                        <input type="email" class="form-control" id="emailbox" name="emailbox" required>
                    </div>
                    <div class="form-group">
                        <label for="phonebox">เบอร์โทรศัพท์:</label>
                        <input type="text" class="form-control" id="phonebox" name="phonebox" required>
                    </div>
                    <button type="submit" name="addemp" class="btn btn-success"><i class="fas fa-plus"></i>
                        เพิ่มผู้ใช้ใหม่</button>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script>
        function toggleIdBox() {
            var posbox = document.getElementById('posbox');
            var idbox = document.getElementById('idbox');

            if (posbox.value === 'ผู้จัดการ') {
                idbox.readOnly = false;
            } else {
                idbox.readOnly = true;
            }
        }
    </script>
</body>

</html>