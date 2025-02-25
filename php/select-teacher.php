<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Select Teacher</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <div class="container bg-white">
        <div class="row bg-white">
            <div class="col-lg-10 m-auto bg-white flex-wrap">
                <h4 class="bg-primary text-center text-white mb-4 mt-4 p-2">Select Your Exam Teacher</h4>

                <?php
                include './config.php';

                $sql = "SELECT * FROM list_admin";

                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                ?>

                        <div class="col-lg-4 col-md-4 col-12 bg-white p-2">
                            <div class="card border-primary">
                                <div class="card-body text-center">
                                    <h5 class="card-title text-danger"><?php echo $row['teacher'] ?></h5>
                                    <a href="./select_quiz.php?teacher=<?php echo $row['teacher'] ?>" class="btn btn-lg btn-primary">View Result</a>
                                </div>
                            </div>
                        </div>

                <?php

                    }
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>