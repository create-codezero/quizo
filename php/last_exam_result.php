<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/userlist.css">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <title>Last Exam Result</title>
</head>

<body>
    <div class="card m-lg-12">
        <div class="main-table">
            <h1 class="text-center text-primary bg-dark font-weight-bold">Last Exam Result Is Here</h1>
            <table id="customers">
                <?php

                $quizname = $_GET["quizname"];

                include '../php/config.php';

                $sql = "SELECT * FROM atttest_$quizname";

                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Id</th><th>Username</th><th>Total Question</th><th>Correct Answer</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>";
                        echo "<td>";
                        echo $row['id'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['username'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['questionatt'];
                        echo "</td>";
                        echo "<td>";
                        echo $row['correctans'];
                        echo "</td>";

                ?>

                <?php

                        echo "</tr>";
                    }

                    echo "</tbody>";
                } else {
                    echo "There are no Results";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>