<?php
session_start();
session_destroy();
header('location:login.php');//กลับไปหน้า Login