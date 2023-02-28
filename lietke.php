<?php
//kết nối với database thông qua file conndb.php.
require_once 'conndb.php';
session_start();
if (isset($_SESSION["username"])) {
    //lấy tên đăng nhập của người dùng từ session và lưu trữ trong biến $username.
    $username = $_SESSION['username'];

    //tạo một truy vấn SQL để lấy thông tin của người dùng từ cơ sở dữ liệu, dựa trên tên đăng nhập lấy được từ session.
    $userQuery = "SELECT * FROM userlogin WHERE username = '$username'";

    //thực thi truy vấn SQL bằng cách sử dụng kết nối cơ sở dữ liệu đã được thiết lập trước đó và lưu kết quả trong biến $userResult.
    $userResult = mysqli_query($conndb, $userQuery);

    //lấy dữ liệu được trả về từ truy vấn SQL và lưu trữ trong biến $data dưới dạng một mảng kết hợp.
    $data = mysqli_fetch_assoc($userResult);
} else {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        nav{
            height: fit-content;
        }
        .navbar-brand{
            margin-right: 900px;
        }
        h4{
            color: white;
        }
        tr{
            font-size: 17px;
        }
        footer{
            margin-top: 240px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="lietke.php">Quản lý sinh viên</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
            <h4>Wellcome back, <span class="text-success text-underline"><?php echo $data['name']; ?></span></h4>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <br>
        <h1>DANH SÁCH SINH VIÊN</h1><br>
        <!-- Trigger the modal with a button -->
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Thêm sinh
            viên</button>
        <br>
        <br>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Họ và tên </th>
                    <th>Lớp</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //kết nối 
                require_once 'condb.php';
                //câu lệnh 
                $lietke_sql = "SELECT * FROM sinhvien order by lop , hoten";
                //thực thi câu lệnh 
                $result = mysqli_query($conn, $lietke_sql);
                //duyệt qua result và in ra
                while ($r = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $r['masv']; ?></td>
                        <td><?php echo $r['hoten']; ?></td>
                        <td><?php echo $r['lop']; ?></td>
                        <td><a href="sua.php?sid=<?php echo $r['id']; ?>" class="btn btn-primary">Sửa </a> |
                            <a onclick="return confirm('Bạn có muốn xóa hoc sinh này ?');" href="xoa.php?sid=<?php echo $r['id']; ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Thêm sinh viên</h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="them_sql.php" method="post">
                        <div class="form-group">
                            <label for="hoten">Họ và tên:</label>
                            <input type="text" class="form-control" id="hoten" name="hoten">
                        </div>
                        <div class="form-group">
                            <label for="masv">Mã sinh viên:</label>
                            <input type="text" class="form-control" id="masv" name="masv">
                        </div>
                        <div class="form-group">
                            <label for="lop">Lớp:</label>
                            <input type="text" class="form-control" id="lop" name="lop">
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
            </div>

        </div>
    </div>
</body>
<footer class="text-center text-lg-start text-white" style="background-color: #343a40">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: Links -->
      <section class="">
        <!--Grid row-->
        <div class="row">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">
              INDUSTRY UNIVERSITY
            </h6>
          </div>
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-envelope mr-3"></i> lequanghuy26122001@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> 0772954174</p>
          </div>
          <!-- Grid column -->
        </div>
        <!--Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-3">

      <!-- Section: Copyright -->
      <section class="p-3 pt-0">
        <div class="row d-flex align-items-center">
          <!-- Grid column -->
          <div class="col-md-7 col-lg-8 text-center text-md-start">
            <!-- Copyright -->
            <div class="p-3">
              © 2020 Copyright:
              <a class="text-white" href="#"
                 >Futeristic.com</a
                >
            </div>
            <!-- Copyright -->
          </div>
        </div>
      </section>
      <!-- Section: Copyright -->
    </div>
    <!-- Grid container -->
  </footer>
  <!-- Footer -->
</html>