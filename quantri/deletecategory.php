<?php

// lấy id gọi đến 
$delid = $_GET['id'];

// kết nối cơ sở dữ liệu
require('../DB/conn.php');

$sql_str = "delete from categories where id=$delid";
mysqli_query($conn, $sql_str);

// trở về trang liệt kê brands
header("location: listcats.php");

