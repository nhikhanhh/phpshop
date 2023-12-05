<?php

// lấy id gọi đến
$delid = $_GET['id'];

// kết nối CSDL
require('../DB/conn.php');

// tìm các hình ảnh của sản phẩm và xoá
$sql1 = "select images from products where id=$delid";
$rs = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($rs);

// danh sách các ảnh
$images_arr = explode(';', $row['images']);
// print_r($images_arr); exit;
// xoá các ảnh trong thư mục lưu
foreach($images_arr as $img){
    unlink($img);
}

// xoá dữ liệu sản phẩm trong CSDL
$sql_str = "delete from products where id=$delid";
mysqli_query($conn, $sql_str);

//trở về trang liệt kê brands
header("location: listsanpham.php");
