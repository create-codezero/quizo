<?php

session_start();

include 'config.php';

if ($con) {
    echo " connection successful";
} else {
    echo " no connection";
}

mysqli_select_db($con, 'admin');


$username = $_POST['username'];
$password = $_POST['password'];

$q = " select * from admin where username = '$username' && password = '$password' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION['adminname'] = $username;
    header('location:../admin/controls/controls/dashboard.php');
} else {
    header('location:../admin/index.html');
}
