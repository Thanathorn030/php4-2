<?php
include_once 'navbar.php';
include_once 'connect.php';
$pro_id = $_GET['pro_id'];
$sql = "SELECT * FROM product WHERE pro_id='$pro_id'";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['submit'])) { //เช็คการกดปุ่ม
  $pro_name = $_POST['pro_name'];
  $pro_price = $_POST['pro_price'];
  $pro_amount = $_POST['pro_amount'];
  $pro_status = $_POST['pro_status'];
  if ($pro_name == '' || $pro_price == '' || $pro_amount == '' || $pro_status == '') {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบ!!');history.back();</script>";
  } else {
    $sql = "UPDATE product SET pro_name = '$pro_name',pro_price = '$pro_price',pro_amount = '$pro_amount', pro_status = '$pro_status' 
  WHERE pro_id = '$pro_id'";
    $result = $con->query($sql);
    if (!$result) {
      echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
    } else {
      header('location:product.php');
    }
  }
}
?>

<div class="container mt-5 w-50">
  <div class="card">
    <div class="card-header bg-secondary text-black fs-5 fw-bold text-center">
      แก้ไขข้อมูล Product
    </div>
    <div class="card-body">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mb-3">
          <label for="" class="form-label">Product Name</label>
          <input type="text" name="pro_name" class="form-control" value="<?php echo $row['pro_name'] ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Price</label>
          <input type="number" name="pro_price" class="form-control" value="<?php echo $row['pro_price'] ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Amount</label>
          <input type="number" name="pro_amount" class="form-control" value="<?php echo $row['pro_amount'] ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-laebl mb-2">Status</label>
          <select class="form-select" name="pro_status" value="<?php echo $row['pro_status'] ?>">
            <option value="<?php echo $row['pro_amount'] ?>">
              <?php
              if ($row['pro_status'] == 1) {
                echo "สินค้าพร้อมจำหน่าย";
              } else if ($row['pro_status'] == 2) {
                echo "สินค้าหมด";
              } else if ($row['pro_status'] == 3) {
                echo "สินค้ายกเลิก";
              }
              ?>
            </option>
            <option value="1">สินค้าพร้อมจำหน่าย</option>
            <option value="2">สินค้าหมด</option>
            <option value="3">สินค้ายกเลิก</option>
          </select>
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="btn btn-outline-secondary text-black px-5 my-2">บันทึกข้อมูล
          </button>
        </div>
      </form>
    </div>
  </div>
</div>