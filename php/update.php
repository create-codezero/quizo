<?php


include 'config.php';


$id = $_GET['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$sname = $_POST['sname'];
$class = $_POST['class'];
$mobile = $_POST['mobile'];
$gmail = $_POST['ancle'];
$quizoid = $_POST['quizoid'];
$password = $_POST['password'];

//$qy = " insert into registereduser (fname , lname , sname , class , mobile , gmail , quizoid , password) values ('$fname','$lname','$sname','$class','$mobile','$gmail','$quizoid','$password') ";

$qy = " update `registereduser` set id=$id, fname='$fname', lname='$lname', sname='$sname', class=$class, mobile='$mobile', gmail='$gmail', quizoid='$quizoid', password='$password' where id =$id ";


mysqli_query($con, $qy);
header('location:../admin');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/index.css" />
    <title>Update</title>
</head>

<body>
    <div class="register" id="register">
        <div class="center-log-in">
            <form method="POST" class="form">
                <p>Update</p>
                <br />
                <input name="fname" class="input-in" type="text" placeholder="First Name" required /><br />
                <input name="lname" class="input-in" type="text" placeholder="Last Name" required /><br />
                <input name="sname" class="input-in" type="text" placeholder="School Name" required /><br />
                <input name="class" class="input-in" type="number" placeholder="Class" required /><br />
                <input name="mobile" class="input-in" type="number" placeholder="Mobile Number" required /><br />
                <input name="ancle" class="input-in" type="text" placeholder="Gmail" required><br />
                <input name="quizoid" class="input-in" type="number" placeholder="Create Quizo Id" required /><br />
                <input name="password" class="input-in" type="text" placeholder="Password" minlength="8" required /><br />
                <input name="rePassword" class="input-in" type="text" placeholder="re-Password" minlength="8" required /><br />
                <input class="input-submit" type="submit" value="Register" />
            </form>
        </div>
    </div>
</body>

</html>