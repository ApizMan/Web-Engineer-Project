<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Class</title>
    <link rel="stylesheet" href="./styleSheet/userClass.css">
    <style>
        table{
            border: 1px solid black;
            height: 50%;
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
            height: 50%;
            border: 1px solid black;
            background-color: lightyellow;
        }

        #add:hover{
            background-color:black;
            opacity: 0.8;
        }
        #add{
            width: 20%;
            color: white;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #33b998;
            opacity: 0.9;
            float: right;
        }
    </style>
</head>
<body>
<a href="../../calendar_view/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo"></a>
    <br>
    <br>
    <div class="nav_top">
        <a href="../../calendar_view/index.php" style="text-decoration: none;">Home</a>
        <a href="../broadcast/index.php" style="text-decoration: none;">Broadcast</a>
        <a href="../viewProgress/index.php" style="text-decoration: none;">Progress</a>
        <a href="../Views/report.html" style="text-decoration: none;">Report</a>
        <a href="#UserName" id="username" style="text-decoration: none;">Username</a>
        <img src="../../logo/user_logo.png" alt="User Logo" id="userlogo">
    </div>
    <hr>

    <h1 id="title">Dashboard Class</h2>

    <form action="class.php" method="POST">
        <button id="add" name="Add">Add User</button>
        <br><br>
    </form>

    <br>

    <form name=dashboard method="POST">
        <center>
            <?php
                include("dbase.php");

                $query = "SELECT * FROM userclass GROUP BY id ORDER BY id ASC";
                $result = mysqli_query($conn,$query);

                if (mysqli_num_rows($result) > 0){
                    // output data of each row
            ?>

                    <table>
                        <tr>
                            <td style="border: none; background-color:transparent"></td>
                            <th>Student</th>
                            <th>Supervisor</th>
                            <th>Evaluator</th>
                            <th>Class Name</th>
                            <?php
                                $i=0;
                                while($row = mysqli_fetch_assoc($result)){
                                    $student = $row["std_name"];
                                    $supervisor = $row["super_name"];
                                    $evaluator = $row["evaluator_name"];
                                    $faculty = $row["faculty"];
                                    $className = $row["class_Name"];
                            ?>
                            <tr>
                                <td style="text-align: center;"><input type="checkbox" name="userclass[]" value="<?php echo $row["id"]; ?>" ></td>
                                <td><?php echo $student; ?></td>
                                <td><?php echo $supervisor; ?></td>
                                <td><?php echo $evaluator; ?></td>
                                <td><?php echo $faculty; ?></td>
                                <td><?php echo $className; ?></td>
                            </tr>
                            <?php
                                $i++;
                                }
                            ?>
                            
                        </tr>
                        <tr class="head" style="background-color: transparent; border: none;">
                            <td colspan="8" style="background-color: transparent; border: none;"><input id="update" type="button" name="Edit" value="Edit" onClick="setUpdateAction();" /> 
				                                                                                <input id="del" type="button" name="delete" value="Delete"  onClick="setDeleteAction();" />
                            </td>
                        </tr>
                    </table>

            <?php
                } else {
            ?>

                    <table>
                        <tr>
                            <th>Student</th>
                            <th>Supervisor</th>
                            <th>Evaluator</th>
                            <th>Faculty</th>
                            <th>Class Name</th>

                            <tr>
                                <td colspan="5">No Data Found.</td>
                            </tr>
                        </tr>
                    </table>
            <?php
                }
            ?>
        </center>
    </form>
</body>
</html>