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
                    <li><a href="../notification/fetch.php"><i class="fa-solid fa-bell"></i></a>

                    <!-- <li><a href="./fetch.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li> -->

                    </li>
                    <li><a href="../announcement/anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li>
                    <li><a href="./pfetch.php">
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
                <h5 class="text-success pt-3">
                    <?php

                    $conn = mysqli_connect("localhost", "root", "", "mini");
                    $str = "select e.timg,e.empid,e.empname,e.emp_phone,e.emp_email,e.emp_address,e.emp_gender,s.sub_name,c.course_name from teacher_reg as e,subject as s,course as c where empid='$empi'and c.course_id='$c_id'and s.subj_id='$sub'";
                    $res = mysqli_query($conn, $str);
                    $row = mysqli_fetch_assoc($res);
                    //  print_r($row);


                    ?>
                </h5>
                <form method="post" class="form-group">
                    <!-- <input  type="hidden" value="<?php echo $row["course_id"] ?>"   class="form-control" name="course_id">
                <input type="hidden"  value="<?php echo $row["stu_id"] ?>" class="form-control" name="stu_id"> -->
                    <div class="row py-4 ">
                        <div class="col-md-4">
                            <label for="ref_no">
                                emp id
                            </label>
                            <input disabled type="text" value="<?php echo $row["empid"] ?>" class="form-control" name="ref">
                        </div>

                        <div class="col-md-4">
                            <label for="sname">
                                Full Name
                            </label>
                            <input disabled type="text" value="<?php echo $row["empname"] ?>" class="form-control" name="sname">
                        </div>
                        <!-- <div class="col-md-4">
                            <label for="stu_fathername">
                                Father Name
                            </label>
                            <input disabled type="text"  value="<?php echo $row["stu_fathername"] ?>" class="form-control" name="stu_fathername">
                        </div> -->
                    </div>
                    <div class="row py-3">
                        <div class="col-md-4">
                            <label for="sphone">
                                Contact No
                            </label>
                            <input disabled type="text" value="<?php echo $row["emp_phone"] ?>" class="form-control" name="sphone">
                        </div>
                        <div class="col-md-4">
                            <label for="sgender">
                                Gender
                            </label>
                            <input disabled type="text" value="<?php echo $row["emp_gender"] ?>" class="form-control" name="gender">

                        </div>
                        <div class="col-md-4">
                            <label for="saddress">
                                Address
                            </label>
                            <!-- <input  type="text"  value="<?php echo $row["saddress"] ?>"  name="gender"> -->
                            <textarea disabled name="" id="" cols="30" class="form-control" rows="4"><?php echo $row["emp_address"] ?></textarea>

                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col-md-3">
                            <label for="email">
                                Email
                            </label>
                            <input disabled type="text" value="<?php echo $row["emp_email"] ?>" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="cname">
                                Course Name
                            </label>
                            <input disabled type="text" value="<?php echo $row["course_name"] ?>" class="form-control" name="tottal_fee">
                        </div>
                        <div class="col-md-3">
                            <label for="fee_status">
                                Subject Name
                            </label>
                            <input disabled type="text" value="<?php echo $row["sub_name"] ?>" class="form-control" name="tottal_fee">
                        </div>
                        <div class="col-md-3">
                            <label for="photo">
                                Photo
                            </label>

                            <img src="C:/xampp/htdocs/php_and_mysql/student management/teacher_image/<?php echo $row["timg"] ?>" width="50%" alt="image" class="form-control">
                        </div>

                    </div>
                    <div class="row py-4">
                        <div class="col-md-1 ">
                            <a href="../dashboard/home.php" class="form-control btn btn-primary">Okay</a>
                            <!-- <input  type="submit" value="Submit" name="sub" class="form-control btn btn-success"> -->
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>