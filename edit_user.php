<?php
include_once 'navbar.php';
include_once 'connect.php';
$username = $_GET['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$result = $con->query($sql);
$row = mysqli_fetch_array($result);
if (isset($_POST['submit'])) { //เช็คการกดปุ่ม
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  if ($password == '' || $fullname == '' || $email == '') {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบ!!');history.back();</script>";
  } else {
    $sql = "UPDATE user SET password = '$password',fullname = '$fullname',email = '$email' 
  WHERE username = '$username'";
    $result = $con->query($sql);
    if (!$result) {
      echo "<script>alert('ไม่สามารถแก้ไขข้อมูลได้');history.back();</script>";
    } else {
      header('location:user.php');
    }
  }
}
?>

<div class="container mt-5 w-50">
  <div class="card">
    <div class="card-header bg-secondary text-black fs-5 fw-bold text-center">
      แก้ไขข้อมูล User
    </div>
    <div class="card-body">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mb-3">
          <label for="" class="form-label">Username</label>
          <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>" disabled>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" value="<?php echo $row['password'] ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Fullname</label>
          <input type="text" name="fullname" class="form-control" value="<?php echo $row['fullname'] ?>">
        </div>
        <div class="mb-3">
          <label for="" class="form-laebl">Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo $row['email'] ?>">
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="btn btn-outline-secondary text-black px-5 my-2">บันทึกข้อมูล
          </button>
        </div>
      </form>
    </div>
  </div>
</div>