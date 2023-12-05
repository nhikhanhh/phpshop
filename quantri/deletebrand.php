<?php

// lấy id gọi đến 
$delid = $_GET['id'];

// kết nối cơ sở dữ liệu
require('../DB/conn.php');

$sql_str = "delete from brands where id=$delid";
mysqli_query($conn, $sql_str);

// trở về trang liệt kê brands
header("location: listbrands.php");

