<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:../');
}
$quizname = $_GET['quizname'];

include '../php/config.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Quiz | quizo</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="
            https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <style type="text/css">
        .animateuse {
            animation: leelaanimate 0.5s infinite;
        }
    </style>
</head>

<body>

    <script type="text/javascript">
        alert("Welcome to quizo , \n Remainig time is runing on your screen \n Submit before time otherwise your score is zero.");
    </script>

    <?php



    ?>

    <div class="container-fluid">
        <!--   <h1 class="text-center text-white font-weight-bold text-uppercase bg-dark" >  Complete Quiz Website using PHP and MYSQL using Session</h1><br>
        <div class="container "><br> -->

        <div class="col-lg-8 card border-primary m-auto">
            <h3 class="card-header text-center text-success font-weight-bold text-uppercase bg-white"> <?php echo $quizname; ?> By Onlinequizo.ga</h3>
        </div><br>
        <div class="col-lg-8 card border-success m-auto ">
            <h5 class="card-header text-center text-primary text-uppercase bg-white">Your Remaining Time Is :- <span id="demo"></span></h5>
        </div>
        <script type="text/javascript">
            var distance = 1200000;
            var x = setInterval(function() {


                var days = Math.floor(distance / (1000 * 60 * 60 * 24));

                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

                var seconds = Math.floor((distance % (1000 * 60)) / 1000);


                document.getElementById("demo").innerHTML = minutes + " min: " + seconds + " sec";


                if (distance < 0) {
                    clearInterval(x);
                    window.location.href = "quiz-1-jbjggfflk-jhkhhghfhgfhf-fgfddcr657687-kjhjhknhigy_guguygug577676-checked.php";
                }

                distance = distance - 1000;

            }, 1000);
        </script>
        <div class="container-fluid"><br>
            <div class="container">
                <div class="col-lg-12 text-center">
                    <h3> <a href="#" class="text-uppercase text-warning"> Your Id is <?php echo $_SESSION['username']; ?>,</a>
                        Welcome to onlinequizo.ga Quiz </h3>
                </div>
                <br>
                <div class="col-lg-8 col-md-12 col-12 d-block m-auto quizsetting">
                    <div class="card border-success">
                        <p class="card-header text-center font-weight-bold text-success"> Your Id is <?php echo $_SESSION['username']; ?>, you have to select
                            only one out of 4. Best of Luck <i class="fas fa-thumbs-up"></i> </p>
                    </div>
                    <br>
                    <form action="quiz-1-jbjggfflk-jhkhhghfhgfhf-fgfddcr657687-kjhjhknhigy_guguygug577676-checked.php?quizname=<?php echo $quizname; ?>" method="post" class="m-auto">
                        <?php


                        for ($i = 1; $i < 21; $i++) {
                            $l = 1;

                            $ansid = $i;

                            $sql1 = "SELECT * FROM `questions_$quizname` WHERE `q_id` = $i ";
                            $result1 = mysqli_query($con, $sql1);
                            if (mysqli_num_rows($result1) > 0) {
                                while ($row1 = mysqli_fetch_assoc($result1)) {
                        ?>
                                    <br>
                                    <div class="card border-primary">
                                        <p class="card-header border-success text-primary font-weight-bold"> <?php echo $i . " : " . $row1['question']; ?> </p>

                                        <?php
                                        $sql = "SELECT * FROM `answers_$quizname` WHERE `q_id` = $i";
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                        ?>

                                                <div class="card-body font-weight-bold border-primary text-success">
                                                    <input type="radio" name="quizcheck[<?php echo $row['q_id']; ?>]" id="<?php echo $row['q_id']; ?>" value="<?php echo $row['a_id']; ?>"> <?php echo $row['ans']; ?>
                                                </div>
                                <?php

                                            }
                                        }
                                        $ansid = $ansid + $l;
                                    }
                                }

                                ?>

                                    </div>

                                <?php
                            }

                                ?>


                                <br>
                                <div>
                                    <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>

                    </form>
                </div>
                <br>
            </div>
            <br>
            <footer class="m-auto text-center">
                <a href="../php/logout.php" class="btn btn-primary text-light m-auto"> Logout </a> <br> <br>
                <h5 class="text-center"> &copy2020 quizo Made And Designed by Amit Tiwari </h5>
            </footer>
        </div>

        <?php

        $startlimit  = 0;
        $q = " select q_id from answers_$quizname";
        $query = mysqli_query($con, $q);
        $lastpage = mysqli_num_rows($query);

        $totalpage = ceil($lastpage / 2);
        ?>



</body>

</html>