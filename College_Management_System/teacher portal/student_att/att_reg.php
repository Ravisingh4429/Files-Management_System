<?php
// session_start();
include("../sweat_alert/sw.php");
include("../com.php");
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
                    <li>
                        <a href="../manage account/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff"></i></a>
                    </li>
                    <li><a href="../notification/fetch.php"><i class="fa-solid fa-bell"></i></a></li>

                    <li><a href="../announcement/anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li>
                    <li><a href="../personal fetch/pfetch.php">
                            <?php
                            if ($_SESSION["uname"] != "") {
                                echo $_SESSION["uname"];
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
                    <li>
                        <a href="../dashboard/home.php">
                            <i class="fa-solid fa-house fa-xl" style="color: #000000"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="../teacher_att/startatt.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000"></i>Teacher
                            Attendance</a>
                    </li>
                    <li>
                        <a href="../student_query/fetch_query.php"> <i class="fa-solid fa-clipboard-question fa-xl" style="color: #030303;"></i> student's query</a>
                    </li>
                    <li><a href="../studey_material/study.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Study Material</a>

                    </li>
                    <li>
                        <a href="../time_table/fetch.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a>

                    </li>
                    <li>
                        <a href="./year.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000"></i>Student
                            Attendance</a>
                        <ul id="tec">
                            <li><a href="./att_reg.php">Attendance</a></li>
                            <li><a href="./att_report.php">Attendance Report</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
            <div class="col-md-10">
                <div class="table-responsive py-3">

                    <h5>
                        <?php $date = date_create(date('y-m-d'));
                        echo date_format($date, "Y-m-d");
                        $year = $_POST["year"];

                        ?>

                    </h5>

                    <?php
                    if (isset($_REQUEST["msg"])) {
                    ?>
                        <script>
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "<?php echo $_REQUEST["msg"]; ?>",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        </script>
                    <?php
                    }
                    ?>
                    <form action="./att_reg_data.php" method="post">
                        <table class="table table-bordered">
                            <thead align="center">
                                <th>roll_no</th>
                                <th> Name</th>
                                <th>Course</th>
                                <th>Attendance</th>

                            </thead>
                            <tbody>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "mini");
                                $str = "select s.stu_id,s.year,s.sname,c.course_name from stu as s , course as c where s.course_id = c.course_id  and s.course_id='$c_id' and s.year='$year' order by c.course_id";
                                $res = mysqli_query($conn, $str);

                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <input type="hidden" name="year" value="<?php echo $year ?>">
                                        <td><?php echo $row["stu_id"] ?></td>
                                        <td><?php echo $row["sname"] ?></td>
                                        <td><?php echo $row["course_name"] ?></td>
                                        <td align="center">
                                            <input type="checkbox" value="<?php echo $row["stu_id"] ?>" name="att[]" id="att">
                                        </td>
                                    </tr>
                            </tbody>
                        <?php
                                }
                        ?>
                        </table>

                </div>
                <div class="col-md-1 ">
                    <input type="submit" value="Submit" name="sub" class="form-control btn btn-success">
                </div>
            </div>
            </form>

        </div>
    </div>
</body>

</html>