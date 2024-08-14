<?php
// session_start();
include("../com.php");
// require("C:/xampp/htdocs/php_and_mysql/fpdf186/fpdf.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap.css" />
    <link rel="stylesheet" href="../dashboard/home.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .cpas {
            background-color: #ff4d4d;
            border: none;
            color: white;
            border-radius: 15px 5px 15px 5px;


        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row first">
            <div class="col-md-2 top2">
                <a href="../dashboard/home.php">
                    <h5><i class="fa-brands fa-slack fa-xl"></i> ABC COLLAGE Teacher Portal</h5>
                </a>

            </div>
            <div class="col-md-10 topbar">

                <ul>
                    <li><a href="../manage account/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i></a></li>
                    <li><a href="../notification/fetch.php"><i class="fa-solid fa-bell"></i></a></li>
                    <li><a href="../personal fetch/pfetch.php">
                            <?php
                            if ($_SESSION["uname2"] != "") {
                                echo $_SESSION["uname2"];
                            } else {
                                header("location:../manage account/login.php");
                            }
                            ?>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="row sidemain">
            <div class="col-md-2 side">
                <ul>
                    <li><a href="../dashboard/home.php"> <i class="fa-solid fa-house fa-xl" style="color: #000000;"></i>Dashboard</a></li>
                    <li><a href="../class notification/fetch.php"> <i class="fa-solid fa-briefcase fa-xl" style="color: #000000;"></i>Class Notification</a></li>

                    <li><a href="../studey_material/study.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Study Material</a>

                    </li>
                    <li>
                        <a href="../student_att/att_reg.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000"></i>Student
                            Attendance</a>
                    </li>
                    <li>
                        <a href="./fetch.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a>

                    </li>
                    <li><a href="../ask_query/ask.php"> <i class="fa-solid fa-clipboard-question fa-xl" style="color: #030303;"></i> Ask's query</a></li>

                </ul>
            </div>
            <div class="col-md-10">

                <div class="table-responsive py-1">


                    <table class="table table-bordered">
                        <thead>
                            <th>Subject Name</th>
                            <th>Time</th>
                            <th>Day</th>
                            <!-- <th>Course Name</th> -->
                            <th>Teacher Name</th>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_POST["sub"])) {
                                // $course=$_POST["course"];
                                $day = $_POST["day"];
                                // $year = $_POST["year"];

                                # code...
                            }

                            $conn = mysqli_connect("localhost", "root", "", "mini");

                            $str1 = "select s.sub_name,s.year,tt.time,tt.day,c.course_name,e.empname from teacher_reg as e, course as c, subject as s,time_table as tt where s.subj_id=tt.subj_id and c.course_id=tt.course_id and tt.empid=e.empid and tt.day='$day' and tt.course_id='$c_id'and tt.year='$year'";
                            $res = mysqli_query($conn, $str1);
                            while ($row = mysqli_fetch_assoc($res)) {
                                //    print_r($row);
                                $sname=$row["sub_name"];
                                $time= $row["time"];
                                $day=$row["day"];
                                $emp=$row["empname"];
                            ?>
                                <tr>
                                    <td><?php echo $row["sub_name"] ?></td>
                                    <td><?php echo $row["time"] ?></td>
                                    <td><?php echo $row["day"] ?></td>
                                    <!-- <td><?php echo $row["course_name"] ?></td> -->
                                    <td><?php echo $row["empname"] ?></td>
                                </tr>
                        </tbody>

                    <?php
                            }
                    ?>
                    </table>
                    
                </div>
                <!-- <div class="row">
                    <div class="col-md-2">
                        <a class="btn btn-danger" href="./pdf.php?day=<?php $day?>">PDF</a>
                    </div>
                </div> -->
               
                
            </div>
        </div>
    </div>
</body>

</html>