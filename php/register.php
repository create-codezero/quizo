<?php

session_start();

include 'config.php';

if ($con) { } else {
    echo " no connection";
}

mysqli_select_db($con, 'registereduser');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$sname = $_POST['sname'];
$class = $_POST['class'];
$mobile = $_POST['mobile'];
$gmail = $_POST['ancle'];
$quizoid = $_POST['quizoid'];
$password = $_POST['password'];
$imgname = $_FILES['img']['name'];
$tempname = $_FILES['img']['tmp_name'];
$folder = "../profile_img_user/" . $imgname;
move_uploaded_file($tempname, $folder);

$q = " select * from registereduser where fname = '$fname' && lname = '$lname' && sname = '$sname' class = '$class' && mobile = '$mobile' && gmail = '$gmail' && quizoid = '$quizoid' && password = '$password' && path = '$folder' ";

//$qy = " insert into registereduer (fname , lname , sname , class , mobile , gmail , quizoid , password) values ('$fname','$lname','$sname','$class','$mobile','$gmail','$quizoid','$password') ";

$qy = " INSERT INTO `registereduser`(`fname`, `lname`, `sname`, `class`, `mobile`, `gmail`, `quizoid`, `password`, `path`) VALUES ('$fname','$lname','$sname','$class','$mobile','$gmail','$quizoid','$password','$folder') ";
mysqli_query($con, $qy);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Equizo</title>
</head>

<body>

    <h1>Registered Succesfully <?php echo $fname . $lname; ?> <a href="../">Go And Sing In</a></h1>

</body>

</html>