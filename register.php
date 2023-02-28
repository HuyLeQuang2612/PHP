<!DOCTYPE html>
<html lang="en">

<head>
    <title>REGISTER FORM FOR QUẢN LÝ SINH VIÊN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--important link source from "https://bootsnipp.com/snippets/yNmeG"-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://cdn.lineicons.com/1.0.0/LineIcons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
    <div class="container-fluid bg">
        <style>
        html,
        body {
            height: 100%;
            overflow: hidden;
        }

        body {
            background: #00BFFF;
            background-size: cover;
            font-family: sans-serif;
            padding-top: 5%
        }

        #khung-ngoai {
            margin-left: 250px;
            padding-right: 50px;
            padding-left: 50px;
            border-radius: 20px;
            width: 600px;
            height: auto;
        }

        label {
            font-size: 20px;
        }

        ::placeholder {
            font-size: medium;
        }

        #myButton {
            font-size: 20px;

        }

        #returnLogin {
            font-size: 15px;
        }

        .sign {
            font-size: 50px;
        }

        .form-control {
            font-size: 15px;
        }
        input[type=text],[type=password] {
  width: 100%;
  padding: 20px 15px;
  margin: 0px 0;
  box-sizing: border-box;
  border: 3px solid #ccc;
  border-radius: 15px ;
  -webkit-transition: 0.5s;
  transition: 0.5s;
  outline: none;
}

input[type=text]:focus,[type=password]:focus {
  border: 3px solid #555;
}
        </style>
</head>

<body>
    <div class="container">
        <?php 
if (isset($_POST['submit'])) {
// nhận dữ liệu từ form 
$name = $_POST['name'];
$usrname = $_POST['username'];
$pwd = $_POST['password'];
if (empty($usrname) || empty($pwd)) {
    //header("Location: register.html");
    echo "<script> alert('Please insert username and password'); </script>";
} else {
    
//kết nối csdl
require_once 'conndb.php';
if ($conndb->connect_error) {
    die("Connection failed: " . $conndb->connect_error);
}

//viết lệnh sql để thêm tài khoản 
$addaccount = "INSERT INTO userlogin (name ,username, passwordd) 
                        VALUES('$name','$usrname', '$pwd')";

// thực thi câu lệnh thêm
if (mysqli_query($conndb, $addaccount)) {
    //in thành công 
    header("Location: login.php");
} else {
    header("Location: register.html");
}
}
}
?>
        <!-- <form action="register.php" method="post" class="p-5 rounded shadow-lg bg-white">
    <h2 class="mb-3">REGISTER </h2>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
      <label for="name">Name</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="username" placeholder="Username" name="username">
      <label for="username">Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      <label for="password">Password</label>
    </div>
    <div class="d-flex justify-content-between">
      <button type="submit" class="btn btn-primary" name="submit">Register</button>
      <a href="login.php" class="btn btn-secondary">Login</a>
    </div>
  </form> -->
        <div id="khung-ngoai" class="card regform wow bounce animated" data-wow-delay="0.05s">
            <div class="card-body regform">
                <div class="myform form ">
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1 class="sign" style="font-family: serif;">SIGNUP</h1>
                        </div>
                    </div>
                    <form  method="post">
                        <div class="form-group">
                            <label for="register-form">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username"
                                placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter Password">
                        </div><BR>
                        <div class="col-md-12 text-center mb-3">
                            <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm" name="submit"
                                id="myButton">Sign
                                Up</button>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <p id="returnLogin" class="text-center"><a href="login.php" id="signin">Already have an
                                        account?</a></p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

</body>

</html>