<?php
//Lấy id cần xóa
$svid = $_GET['sid'];
//kết nối 
require_once 'condb.php';
//câu lệnh sql 
$xoa_sql = "DELETE FROM sinhvien WHERE id=$svid";
mysqli_query($conn, $xoa_sql);

//trở về trang liet ke 
header("Location: lietke.php");
?>