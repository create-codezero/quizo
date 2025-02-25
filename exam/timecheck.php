<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:../');
}
$quizname = $_GET['quizname'];

$quizname1 = '"' . $quizname . '"';

include '../php/config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing the Time of Exam</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <?php

        $teacher = $_GET['teacher'];

        $sql = "SELECT * FROM `addquiz_$teacher` WHERE `quizname` = " . $quizname1;

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

        ?>

                <div class="card text-center m-auto mt-auto">
                    <div class="card-header">
                        Selected Exam
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['quizname']; ?></h5>
                        <a href="#" class="btn btn-primary" id="btn">Go to Exam</a>
                    </div>
                    <div class="card-footer text-muted" id="demo">

                    </div>
                </div>

                <script type="text/javascript">
                    var countDownDate = new Date("<?php echo $row['time']; ?>").getTime();

                    var x = setInterval(function() {

                        var now = new Date().getTime();

                        var distance = countDownDate - now;

                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));

                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);


                        document.getElementById("demo").innerHTML = days + ":" + hours + ":" + minutes + ":" + seconds;


                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("demo").innerHTML = "Go to Exam";
                            document.getElementById("btn").href = "quiz-1-jbjggfflk-jhkhhghfhgfhf-fgfddcr657687-kjhjhknhigy_guguygug577676.php?quizname=<?php echo $row['quizname']; ?>";
                        }



                    }, 1000);
                </script>
        <?php
            }
        } else {
            echo "No quiz selected !";
        }
        ?>
    </div>
</body>

</html>