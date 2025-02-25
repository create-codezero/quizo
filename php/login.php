<?php

session_start();

include 'config.php';

if ($con) {
    echo " connection successful";
} else {
    echo " no connection";
}

// mysqli_select_db($con, 'registereduser');


$quizoid = $_POST['quizoid'];
$password = $_POST['password'];

$q = " select * from `registereduser` where `quizoid` = '$quizoid' && `password` = '$password' ";

$result = mysqli_query($con, $q);

$num = mysqli_num_rows($result);

if ($num == 1) {
    $_SESSION['username'] = $quizoid;
    header('location:../exam/select-teacher.php');
} else {
    header('location:../');
}
