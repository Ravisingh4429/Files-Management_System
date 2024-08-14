<?php
include("../com.php");
include("../sweat_alert/sw.php");
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
                    <li><a href="../dashboard/home.php"> <i class="fa-solid fa-house fa-xl" style="color: #000000;"></i>Dashboard</a></li>
                    <li>
                        <a href="../teacher_att/startatt.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000"></i>Teacher
                            Attendance</a>
                    </li>
                    <li>
                        <a href="../student_query/fetch_query.php"> <i class="fa-solid fa-clipboard-question fa-xl" style="color: #030303;"></i> student's query</a>
                    </li>
                    <li><a href="./study.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Study Material</a>
                        <ul id="tec">
                            <li><a href="./study.php"> Send Study Material</a></li>
                            <li><a href="./manage_study.php">Manage Study Material</a></li>
                        </ul>
                    </li>
                    <li>
            <a href="../time_table/fetch.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a>
           
          </li>
                    <li>
                        <a href="../student_att/year.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000"></i>Student
                            Attendance</a>
                    </li>
                    
                </ul>
            </div>
            <div class="col-md-10">
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
                <div class="row justify-content-between py-3">
                    <div class="col-md-3">
                        <form action="<?php $_SERVER["PHP_SELF"] ?>" onsubmit="return vali()" method="post">
                            <label class="text-success" for="report">
                                Report Date
                            </label>
                            <input type="date" id="rd" class="form-control" name="date">
                            <p id="errda" class="err"></p>
                    </div>

                    <div class="col-md-4">
                        <input type="submit" value="Search" class="form-control btn btn-success" name="sub">

                    </div>
                    </form>
                </div>
                <div class="table-responsive py-1">

                    <?php
                    if (isset($_POST["sub"])) {
                        $date = $_POST["date"];
                    ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Message</th>
                                <th>File Name</th>
                                <th>emp name</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "mini");
                                $str = "select * from study_mat where date='$date' and c_id='$c_id'";
                                $res = mysqli_query($conn, $str);
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["date"] ?></td>
                                        <td><?php echo $row["time"] ?></td>
                                        <td><?php echo $row["message"] ?></td>
                                        <td><?php echo $row["file"] ?></td>
                                        <td><?php echo $emp_name ?></td>
                                        <td>
                                            <a class="btn btn-success" href="./study_dele.php?del=<?php echo $row["smid"] ?>" onclick="return del()">Delete</a>
                                        </td>
                                    </tr>
                            </tbody>
                    <?php
                                }
                            }
                    ?>
                        </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>