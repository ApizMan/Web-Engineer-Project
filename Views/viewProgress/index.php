<?php

    session_start();

    if($_SESSION["Login"] != "YES"){
        header("Location: ../../index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View | Progress Listing</title>
    <link rel="icon" href="../../logo/logo-rasmi-ump-logo-sahaja.png" type="image/x-icon">
    <link rel="stylesheet" href="../viewProgress/styleSheet/progressStyle.css">
    <style>
        table{
            border: 1px solid black;
            height: 100%;
            width: 100%;
            margin-bottom: 20px;
        }

        h1{
            text-align: center;
        }

        table{
            background-color: rgb(41, 134, 114);;
        }

        th{
            height: 50%;
            border: 1px solid black;
            background-color: lightgreen;
        }

        td{
            text-align: center;
            height: 50%;
            border: 1px solid black;
            background-color: lightyellow;
        }
    </style>
</head>
<body>
<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php">Home</a>
        <a href="../broadcast/index.php">Broadcast</a>
        <a href="../classesUser/index.php">User Class</a>
        <a href="../report/index.php">Report</a>
        <a href="../../logout.php" id="username">Logout</a>
        <a href="../Profile/index.php" style="float: right; margin-top:-15px; margin-bottom:-15px"><img src="../../logo/user_logo.png" alt="User Logo" id="userlogo"></a>
    </div>
    <hr>

    <h1 id="title">View Progress Listing</h2>

    <br>

    <?php
        include("dbase.php");

        $query = "SELECT * FROM views, supervisor, evaluator WHERE views.id = supervisor.id AND views.id = evaluator.id GROUP BY rating ORDER BY rating DESC";
        $result = mysqli_query($conn,$query);

        if (mysqli_num_rows($result) > 0){
         // output data of each row
    ?>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Supervisor</th>
                <th>Evaluator</th>
                <th>Project Name</th>
                <th style="width: 30%;">Progress</th>
                <th style="width: 20%;">Rating</th>
                <?php
                    $i=0;
                    while($row = mysqli_fetch_assoc($result)){
                        $student_id = $row["student_id"];
                        $supervisor = $row["name_super"];
                        $evaluator = $row["name_eva"];
                        $project_name = $row["project_name"];
                        $comment_Super = $row["comment_Super"];
                        $comment_Eva = $row["comment_Eva"];
                        $rating = $row["rating"];
                ?>
                <tr>
                    <td><?php echo $student_id; ?></td>
                    <td><?php echo $supervisor; ?></td>
                    <td><?php echo $evaluator; ?></td>
                    <td><?php echo $project_name; ?></td>
                    <td style="text-align: justify; padding:10px;">
                        Comment Evaluator:
                        <ul>
                            <?php echo $comment_Eva; ?>
                        </ul>
                        Comment Supervisor:
                        <ul>
                            <?php echo $comment_Super; ?>
                        </ul>
                    </td>
                    <td><?php echo $rating; ?></td>
                </tr>
                <?php
                    $i++;
                    }
                ?>
            </tr>
        </table>
    <?php
        }
    ?>
</body>
</html>