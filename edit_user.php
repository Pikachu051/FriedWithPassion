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
}
// Retrieve employee details based on ID
if (isset($_POST['idbox'])) {
    $emp_id = $_POST['idbox'];

    // Perform SQL SELECT to fetch employee details
    $stmt = $db->prepare("SELECT * FROM employees WHERE emp_id = :emp_id");
    $stmt->bindValue(':emp_id', $emp_id, SQLITE3_INTEGER);
    $result = $stmt->execute();

    // Check if the employee exists
    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        // Populate form fields with employee details
        $firstname = $row['first_name'];
        $lastname = $row['last_name'];
        $sex = $row['sex'];
        $email = $row['email'];
        $phone = $row['phone'];
        $position = $row['position'];
    }
}
?>

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
            <h1>เเก้ไขบัญชีผู้ใช้</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form method="post" action="manage_Accounts.php">
                    <div class="form-group">
                        <label for="idbox">รหัสพนักงาน:</label>
                        <input type="text" class="form-control" id="idbox" name="idbox" value="<?php echo $emp_id; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fnbox">ชื่อ:</label>
                        <input type="text" class="form-control" id="fnbox" name="fnbox" value="<?php echo $firstname; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lnbox">นามสกุล:</label>
                        <input type="text" class="form-control" id="lnbox" name="lnbox" value="<?php echo $lastname; ?>" required>
                    </div>
                    <div class="form-group">
                    <label for="sexbox">เพศ:</label>
                        <select class="form-control" id="sexbox" name="sexbox" required>
                            <option value="ช" <?php if ($sex === 'ช') echo 'selected'; ?>>ชาย</option>
                            <option value="ญ" <?php if ($sex === 'ญ') echo 'selected'; ?>>หญิง</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="emailbox">อีเมล:</label>
                        <input type="email" class="form-control" id="emailbox" name="emailbox" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phonebox">เบอร์โทรศัพท์:</label>
                        <input type="text" class="form-control" id="phonebox" name="phonebox" value="<?php echo $phone; ?>" required>
                    </div>
                    <div class="form-group">
                    <label for="posbox">ตำเเหน่ง:</label>
                        <select class="form-control" id="posbox" name="posbox" required>
                            <option value="พนักงาน" <?php if ($position === 'พนักงาน') echo 'selected'; ?>>พนักงาน</option>
                            <option value="ผู้จัดการ" <?php if ($position === 'ผู้จัดการ') echo 'selected'; ?>>ผู้จัดการ</option>
                        </select>
                    </div>
                    <button type='submit' name='editemp' class='btn btn-primary'><i class='fas fa-edit'></i> เเก้ไข</button>
                </form>
            </div>
        </div>
    </div>
    
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
