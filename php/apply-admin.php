<?php
session_start();

include 'config.php';

if ($con) {
} else {
    echo " no connection";
}

mysqli_select_db($con, 'apply-admin');

$username = $_POST['username'];
$password = $_POST['password'];
$gmail = $_POST['gmail'];
$groupname = $_POST['groupname'];
$grouplink = $_POST['grouplink'];
$numofstudent = $_POST['numofstudent'];

$q = " INSERT INTO `apply-admin`(`username`, `password`, `gmail`, `groupname`, `grouplink`, `numofstudent`) VALUES ('$username','$password','$gmail','$groupname','$grouplink','$numofstudent') ";
mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply SuccesFully</title>
</head>

<body>
    <script>
        alert("Apply For Admin Successfully");
    </script>
</body>

</html>