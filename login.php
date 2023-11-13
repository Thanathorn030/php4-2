<?php
include_once 'connect.php';
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username == '' || $password == '') {
    echo "<script>alert('กรุณากรอกข้อมูลให้ครบ')</script>";
  } else {
    $sql = "SELECT * FROM user WHERE username ='$username' AND password='$password' ";
    //$result = mysqli_query($con, $sql);
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result);
    $num = mysqli_num_rows($result);
    if ($num != 1) {
      //echo "<script>alert('Login ไม่สำเร็จ')</script>";
      $login_error = "ชื่อผู้ใช้ หรือ รหัสผ่าน ไม่ถูกต้อง";
    } else {
      session_start();
      $_SESSION['username'] = $row['username'];
      $_SESSION['fullname'] = $row['fullname'];
      header('location:index.php');
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header text-center bg-dark">
            <a class="nav-link text-light fs-2">LOGIN</a>
          </div>
          <div class="card-body">
            <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                  name="username">
                <label for="floatingInput">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingInput" placeholder="name@example.com"
                  name="password">
                <label for="floatingInput">Password</label>
              </div>
              <div class="text-center text-danger mb-3">
                <?php
                if (isset($login_error)) {
                  echo "$login_error";
                }
                ?>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-dark px-5 fs-5" name="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>