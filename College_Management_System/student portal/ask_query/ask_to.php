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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
                    <li><a href="../study_material/study_mat.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Study Material</a>
                    <li><a href="../attendance/attfetch.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000;"></i>Student Attendance</a></li>
                    <li><a href="../time_table/fetch.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a></li>
                    <li><a href="./ask.php"> <i class="fa-solid fa-clipboard-question fa-xl" style="color: #030303;"></i> Ask's query</a>
                        <ul id="tec">
                            <li><a href="./asked_query.php"> Asked query</a>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">

                <div class="row justify-content-between py-3">
                    <div class="col-md-3">
                        <?php
                        $subjid = $_POST["subject"];
                        $conn = mysqli_connect("localhost", "root", "", "mini");
                        $str = "select * from subject where subj_id='$subjid'";
                        $res = mysqli_query($conn, $str);

                        while ($row = mysqli_fetch_array($res)) {
                            // print_r($row);

                        ?>
                            <form action="./ask_to_data.php" onsubmit="return vali()" method="post">

                                <label for="sub">
                                    Subject
                                </label>

                                <input type="hidden" value="<?php echo $subjid ?>" class="form-control" name="subid">
                                <input disabled type="text" value="<?php echo $row["sub_name"] ?>" class="form-control" name="subname">



                    </div>
                    <div class="col-md-3">
                        <label for="qu">
                            Your question
                        </label>
                        <textarea name="ques" id="" cols="40" class="form-control" rows="6"></textarea>
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
    </div>
    </div>
</body>

</html>