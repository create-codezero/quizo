<?php
session_start();

if (!isset($_SESSION['username'])) {
  header('location:../');
}

include '../php/config.php';

$teacher = $_GET['teacher'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="../style/bootstrap.min.css" />
  <title>Exam | equizo</title>
</head>

<body>
  <div class="col-lg-12 col-md-12 col-12 m-auto mt-auto">
    <h1 class="bg-dark text-center text-primary">The Exams Are</h1>
    <br />
    <h4 class="bg-dark text-center text-light">Your Id is :- <?php echo $_SESSION['username']; ?></h4>
    <div class="row m-auto">
      <!--this is a card -->

      <?php

      $sql = "SELECT * FROM addquiz_$teacher";

      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

      ?>
          <div class="col-xl-auto col-lg-3 col-md-4 col-12 m-auto">
            <a href="timecheck.php?quizname=<?php echo $row['quizname']; ?>&teacher=<?php echo $teacher; ?>" class=" text-decoration-none" id="btn">
              <div class="card border-primary mb-3 mx-32" style="max-width: 18rem;">
                <div class="card-header"><?php echo $row['quizname']; ?></div>
                <div class="card-body text-primary"><?php echo $row['condby']; ?></div>
                <div class="card-footer text-primary">
                  <h5 class="card-title" id="demo"><?php echo $row['time']; ?></h5>
                </div>
              </div>
            </a>
          </div>

          <!--JS Section for the time-->
          <!--End of JS Section for the time-->
      <?php
        }
      } else {
        echo "There are no quizs!";
      }
      ?>
      <!--- End of the card-->
    </div>
  </div>
  <div class="m-auto container">

    <a href="../php/logout.php" class="btn btn-danger text-light m-auto d-block">Log Out</a>

  </div>
</body>

</html>