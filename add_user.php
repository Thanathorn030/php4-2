<?php
include_once 'navbar.php';
if (isset($_POST['submit'])) {
  include_once 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  if ($username == '' || $password == '' || $fullname == '' || $email == '') {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบ!!');history.back();</script>";
  } else {
    $check = mysqli_fetch_array($con->query("SELECT * FROM user"));
    if ($check['username'] == $username) {
      echo "<script>alert('Username นี้มีคนใช้แล้ว!!');history.back();</script>";
    } else {
      $sql = "INSERT INTO user VALUES('$username','$password','$fullname','$email')";
      $result = $con->query($sql);
      if (!$result) {
        echo "<script>alert('!!Error : ไม่สามารถเพิ่มข้อมูลได้โปรดลองอีกครั้ง!');history.back();</script>";
      } else {
        header('location:user.php');
      }
    }
  }
}
?>
<div class="container mt-5 w-50">
  <div class="card">
    <div class="card-header bg-secondary text-black fs-5 fw-bold text-center">
      เพิ่มข้อมูล User
    </div>
    <div class="card-body">
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="mb-3">
          <label for="" class="form-label">Username</label>
          <input type="text" name="username" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Fullname</label>
          <input type="text" name="fullname" class="form-control">
        </div>
        <div class="mb-3">
          <label for="" class="form-laebl mb-2">Email</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="text-center">
          <button type="submit" name="submit" class="btn btn-outline-secondary text-black px-5 my-2">บันทึกข้อมูล
          </button>
        </div>
      </form>
    </div>
  </div>
</div>