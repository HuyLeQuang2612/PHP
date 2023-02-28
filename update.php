<?php
    // nhận dữ liệu từ form 
    $ht = $_POST['hoten'];
    $masv = $_POST['masv'];
    $lop = $_POST['lop'];
    $id = $_POST['sid'];
    //kết nối csdl
    require_once 'condb.php';
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //viết lệnh sql để thêm tài khoản 
    $updatesql = "UPDATE sinhvien SET masv='$masv' , hoten='$ht' , lop= '$lop' WHERE id=$id ";
    //echo $themsql; exit;
    // thực thi câu lệnh thêm

    if (mysqli_query($conn, $updatesql)){
        //in thành công 
        header("Location: lietke.php");
    }