<?php
session_start();
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
                    <h5><i class="fa-brands fa-slack fa-xl"></i> ABC COLLAGE Student Portal</h5>
                </a>
            </div>
            <div class="col-md-10 topbar">

                <ul>
                    <li><a href="../manage account/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i></a></li>
                    <!-- <li><a href="../notification/fetch.php"><i class="fa-solid fa-bell"></i></a> -->

                    <li><a href="./fetch.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li>

                    </li>
                    <!-- <li><a href="../announcement/anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li> -->
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
                    <li><a href="../study_material/study_mat.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Study Material</a>
                    <li><a href="../attendance/attfetch.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000;"></i>Student Attendance</a></li>
                    <li><a href="../time_table/fetch.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a></li>
                    <li><a href="../ask_query/ask.php"> <i class="fa-solid fa-clipboard-question fa-xl" style="color: #030303;"></i> Ask's query</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <div class="table-responsive py-1">
                    <h5 class="text-success">

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
                    </h5>

                    <table class="table table-bordered">
                        <thead>
                            <th>date</th>
                            <th>time</th>
                            <th>message</th>
                            <th>image</th>

                        </thead>
                        <tbody>


                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "mini");
                            $str = "select * from announcement";
                            $res = mysqli_query($conn, $str);
                            while ($row = mysqli_fetch_assoc($res)) {


                            ?>
                                <tr>
                                    <td><?php echo $row["date"] ?></td>
                                    <td><?php echo $row["time"] ?></td>
                                    <td><?php echo $row["message"] ?></td>
                                    <td><img src="C:/xampp/htdocs/php_and_mysql/student management/anoc_image/<?php echo $row["image"] ?>" alt="image" width="50px"></td>


                                </tr>
                        </tbody>
                    <?php
                            }
                    ?>
                    </table>
                </div>


            </div>

        </div>
    </div>
</body>

</html>