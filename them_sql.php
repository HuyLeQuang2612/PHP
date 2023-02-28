<?php
    // nhận dữ liệu từ form 
    $ht = $_POST['hoten'];
    $masv = $_POST['masv'];
    $lop = $_POST['lop'];

    echo $_POST['hoten'];
    echo $_POST['masv'];
    echo $_POST['lop'];
    
    //kết nối csdl
    require_once 'condb.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //viết lệnh sql để thêm tài khoản 
    $themsql = "INSERT INTO sinhvien (masv, hoten, lop) 
                VALUES('$masv', '$ht', '$lop') ";
    //echo $themsql; exit;
    // thực thi câu lệnh thêm

    if (mysqli_query($conn, $themsql)){
        //in thành công 
        header("Location: lietke.php");
    }

    
?>