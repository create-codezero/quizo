<?php
session_start();

include '../php/config.php';

$quizname = $_GET['quizname'];

?>
<!DOCTYPE html>
<html>

<head>
    <title>Your Result | quizo</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</head>

<body>
    <div class="container text-center">
        <br><br>
        <h1 class="text-center text-success text-uppercase animateuse"> Quizo Quiz Result</h1>
        <br><br><br><br>
        <table class="table text-center table-bordered table-hover">
            <tr>
                <th colspan="2" class="bg-dark">
                    <h1 class="text-white"> Results </h1>
                </th>

            </tr>
            <tr>
                <td>
                    Questions Attempted
                </td>

                <?php
                $counter = 0;
                $Resultans = 0;
                if (isset($_POST['submit'])) {
                    if (!empty($_POST['quizcheck'])) {
                        // Counting number of checked checkboxes.
                        $checked_count = count($_POST['quizcheck']);
                        // print_r($_POST);
                ?>

                        <td>
                            <?php
                            echo "Out of 20, You have attempt " . $checked_count . " option."; ?>
                        </td>


                        <?php
                        // Loop to store and display values of individual checked checkbox.
                        $selected = $_POST['quizcheck'];

                        $q1 = " select ans from questions_$quizname ";
                        $ansresults = mysqli_query($con, $q1);
                        $i = 1;
                        while ($rows = mysqli_fetch_array($ansresults)) {
                            // print_r($rows);
                            $flag = $rows['ans'] == $selected[$i];

                            if ($flag) {
                                // echo "correct ans is ".$rows['ans']."<br>";				
                                $counter++;
                                $Resultans++;
                                // echo "Well Done! your ". $counter ." answer is correct <br><br>";
                            } else {
                                $counter++;
                                // echo "Sorry! your ". $counter ." answer is innncorrect <br><br>";
                            }
                            $i++;
                        }
                        ?>


            <tr>
                <td>
                    Your Total score
                </td>
                <td colspan="2">
            <?php
                        echo " Your score is " . $Resultans . ".";
                    } else {
                        echo "<b>Please Select Atleast One Option.</b>";
                    }
                }
            ?>
                </td>
            </tr>

            <?php

            $name = $_SESSION['username'];
            $finalresult = " insert into atttest_$quizname(username,questionatt, correctans) values ('$name','20','$Resultans') ";
            $queryresult = mysqli_query($con, $finalresult);
            // if($queryresult){
            // 	echo "successssss";
            // }
            ?>


        </table>

        <a href="../php/logout.php" class="btn btn-success"> LOGOUT </a>
    </div>
</body>

</html>