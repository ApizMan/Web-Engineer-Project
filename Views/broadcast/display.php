<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student's Display</title>
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
            text-align: center;
            height: 50%;
            border: 1px solid black;
            background-color: lightyellow;
        }
    </style>
</head>
<body>
    <center>
        <a href="../broadcast/index.php"><img class="logo" src="../../logo/logo.png" alt="UMP_Logo" style="width: 50%; height:50%;"></a>
    </center>
    <br>
    <br>
    <fieldset>

        <h1>Student's View</h1>

        <?php
            include("dbase.php");

            $query = "SELECT * FROM student";
            $result = mysqli_query($conn,$query);

            if (mysqli_num_rows($result) > 0){
                // output data of each row
        ?>

        <center>
        <table>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Announcement</th>
                        <?php
                            $i=0;
                            while($row = mysqli_fetch_assoc($result)){
                                $date = $row["date"];
                                $time = $row["time"];
                                $category = $row["category"];
                                $title = $row["title"];
                                $announcement = $row["announcement"];
                        ?>
                        <tr>
                            <td><?php echo $date; ?></td>
                            <td><?php echo $time; ?></td>
                            <td><?php echo $category; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $announcement; ?></td>
                        </tr>
                        <?php
                            $i++;
                            }
                        ?>
                    </tr>
                </table>

                <?php
            } else {
                echo "0 results";

            }
        ?>
        </center>
    </fieldset>
</body>
</html>