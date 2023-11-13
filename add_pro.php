<?php
include_once 'navbar.php';
if (isset($_POST['submit'])) {
  include_once 'connect.php';
  $pro_name = $_POST['pro_name'];
  $pro_price = $_POST['pro_price'];
  $pro_amount = $_POST['pro_amount'];
  $pro_status = $_POST['pro_status'];
  if ($pro_name == '' || $pro_price == '' || $pro_amount == '' || $pro_status == '') {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบ!!');history.back();</script>";
  } else {
    $check = mysqli_fetch_array($con->query("SELECT * FROM product"));
    if ($check['pro_name'] == $pro_name) {
      echo "<script>alert('มีสินค้านี้อยู่แล้ว!!');history.back();</script>";
    } else {
      $sql = "INSERT INTO product VALUES('','$pro_name','$pro_price','$pro_amount','$pro_status')";
      $result = $con->query($sql);
      if (!$result) {
        echo "<script>alert('!!Error : ไม่สามารถเพิ่มข้อมูลได้โปรดลองอีกครั้ง!');history.back();</script>";
      } else {
        header('location:product.php');
      }
    }
  }
}
?>
<div class="container mt-5 w-50">
  <div class="card">
    <div class="card-header bg-secondary text-black fs-5 fw-bold text-center">
      เพิ่มข้อมูล Product
    </div>
    <div class="card-body">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mb-3">
          <label for="" class="form-label">Product Name</label>
          <input type="text" name="pro_name" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Price</label>
          <input type="number" name="pro_price" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Amounts</label>
          <input type="number" name="pro_amount" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-laebl mb-2">Status</label>
          <select class="form-select" name="pro_status">
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