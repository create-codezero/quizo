<?php

include 'config.php';

$quizname = $_GET['quizname'];
$adminname = $_GET['adminname'];
$id = $_GET['id'];

echo $quizname;

$d_a_t = "DROP TABLE `answers_$quizname`";
mysqli_query($con, $d_a_t);

$d_q_t = "DROP TABLE `questions_$quizname`";
mysqli_query($con, $d_q_t);

$d_s_a_t = "DROP TABLE `atttest_$quizname`";
mysqli_query($con, $d_s_a_t);

$q = " DELETE FROM `addquiz_$adminname` WHERE id = $id ";
mysqli_query($con, $q);

header('location:../admin/controls/controls/dashboard.php');
