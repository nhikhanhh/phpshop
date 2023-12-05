<?php 


// lấy id 
$id = $_GET['id'];

// tìm trong CSDL brand có id trùng 
// kết nối cơ sở dữ liệu
require('../DB/conn.php'); 

$sql_str = "select * from brands where id=$id";
$res = mysqli_query($conn, $sql_str);

$brand = mysqli_fetch_assoc($res);
if (isset($_POST['btnUpdate'])){
    // nếu nút câph nhật được nhận
    // lấy name
    $name = $_POST['name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    // thực hiện việc cập nhận
    $sql_str2 = "update brands set name='$name', slug='$slug' where id=$id";
    
    mysqli_query($conn, $sql_str2);
    
    // chuyển qua trang listbrands
    header("location: listbrands.php");
} else {
    require('includes/header.php');
?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Cập nhật thương hiệu (brand)</h1>
                    </div>
                    <form class="user" method="post" action="#">                        
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user"
                            id="name" name="name" aria-describedby="emailHelp"
                            placeholder="Tên thương hiệu"
                            value=<?php echo $brand['name']?>>
                    </div>
                    <button class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                    </form>
                    <hr>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>

      
<?php
require('includes/footer.php');
}
?>