<?php
include_once 'navdar.php';
include_once 'connect.php';
$username = $_GET['username'];
$sql = "DELETE FROM user WHERE username = '$username'";
$result = $con->query($sql);
if (!$result) {
  echo "<script>alert('ERROR : ไม่สามารถลบข้อมูลได้');history.back();</script>";
} else {
  header('location:user.php');
}
