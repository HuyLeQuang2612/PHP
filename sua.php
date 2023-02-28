<?php
//Lấy id cần xóa
$id = $_GET['sid'];
//kết nối 
require_once 'condb.php';
//câu lệnh sql 
$sua_sql = "SELECT * FROM sinhvien WHERE id=$id ";

$result = mysqli_query($conn, $sua_sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sua</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <form action="update.php" method="post">
            <div class="form-group">
              <input type="hidden" name="sid" value="<?php echo $id?>"></input>
                <label for="hoten">Họ và tên:</label>
                <input type="text" class="form-control" id="hoten" name="hoten" value="<?php echo $row['hoten']?>">
              </div>
            <div class="form-group">
              <label for="masv">Mã sinh viên:</label>
              <input type="text" class="form-control"  id="masv" name="masv" value="<?php echo $row['masv']?>">
            </div>
            <div class="form-group">
              <label for="lop">Lớp:</label>
              <input type="text" class="form-control"  id="lop" name="lop" value="<?php echo $row['lop']?>">
            </div>

            <button type="submit" class="btn btn-primary">Cập nhật</button>
            
          </form>
    </div>
</body>

</html>