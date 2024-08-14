<?php
// session_start();

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
                        <a href="./fetch_query.php"><i class="fa-solid fa-clipboard-question fa-xl" style="color: #030303;"></i> student's query</a>
                    </li>
                    <li><a href="../studey_material/study.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Study Material</a>

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
           
                <div class="row justify-content-between py-3">
                    <div class="col-md-3">
                        <?php
                        $qid = $_REQUEST["qid"];
                        $conn = mysqli_connect("localhost", "root", "", "mini");
                        $str = "select que from query where qid='$qid'";
                        $res = mysqli_query($conn, $str);

                        while ($row = mysqli_fetch_array($res)) {
                            // print_r($row);

                        ?>
                            <form action="./ans_to.php" onsubmit="return vali()" method="post">

                                <label for="sub">
                                    Question
                                </label>

                                <input type="hidden" value="<?php echo $qid ?>" class="form-control" name="qid">
                               
                                <textarea disabled name="ques" id="" cols="40" class="form-control" rows="6"><?php echo $row["que"] ?></textarea>
                                <!-- <textarea name="que" id="" cols="30" rows="10"></textarea> -->


                    </div>
                    <div class="col-md-3">
                        <label for="qu">
                            Answer
                        </label>
                        <textarea name="ans" id="" cols="40" class="form-control" rows="6"></textarea>

                    </div>

                    <div class="col-md-4">
                        <input type="submit" value="Submit" class="form-control btn btn-success" name="sub">

                    </div>
                    </form>
                <?php
                        }
                ?>
                </div>
            </div>
        </div>
</body>

</html>