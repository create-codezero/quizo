<?php

include '../php/config.php';
$teacher = $_GET['teacher'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <title>Select Your Exam To See Result</title>
</head>

<body>

    <h1 class="text-center text-primary bg-dark font-weight-bold">Select Your Exam Here</h1>
    <div class="row">
        <?php
        $sql = "SELECT * FROM addquiz_$teacher";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {

        ?>

                <a class="btn btn-large btn-success d-block col-lg-auto col-12 m-auto" href="last_exam_result.php?quizname=<?php echo $row['quizname']; ?>"><?php echo $row['quizname']; ?></a>

        <?php
            }
        }
        ?>


    </div>
</body>

</html>
<?php

?>