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
    <link rel="stylesheet" href="../bootstrap.css"/>
    <link rel="stylesheet" href="../dashboard/home.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row first">
            <div class="col-md-2 top2">
                <a href="../dashboard/home.php"><h5><i class="fa-brands fa-slack fa-xl"></i> ABC COLLAGE</h5></a>
            </div>
            <div class="col-md-10 topbar">
                <ul>
                    <li>
                        <a href="../manage account/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff"></i></a>
                    </li>
                    <li><a href="../student/student_reg.php">admission</a></li>
                   
                    <li><a href="../announcement/anoc.php"><i class="fa-solid fa-bullhorn"></i></a></li>                    <li><a href="#">
                      <?php
                        if ($_SESSION["uname1"]!="") {
                          echo $_SESSION["uname1"];
                        }
                        else{
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
                        <a href="../teacher/teacher_reg.php"><i class="fa-solid fa-user fa-xl"
                                style="color: #000000"></i>Teacher Registration</a>
                                
                    </li>
                    <li>
                        <a href="../student/student_reg.php"><i class="fa-solid fa-user-graduate fa-xl" style="color: #000000"></i>Student
                            Registration</a>
                            
                    </li>
                    <li>
                        <a href="../course/course_reg.php"><i class="fa-solid fa-book fa-xl" style="color: #000000"></i>Courses</a>
                        
                    </li>
                    <li>
                        <a href="./subject_reg.php"><i class="fa-solid fa-book-open fa-xl" style="color: #000000"></i>Subjects</a>
                        <ul id="tec">
                            <li><a href="./subject_reg.php">Register Subject</a></li>
                            <li><a href="./subject_manage.php">Manage Subject</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../time_table/time_table_reg.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a>
                    </li>
                    
                    <li>
                        <a href="../teacher_salary/salary_reg.php"><i class="fa-solid fa-hand-holding-dollar fa-xl" style="color: #000000"></i>Teacher
                            Salary</a>
                    </li>
                    
                    <li>
                        <a href="../fee student/fee_reg.php"><i class="fa-solid fa-credit-card fa-xl" style="color: #000000"></i>Student Fee</a>
                    </li>
                    <li>
                        <a href="../manage account/mainpage.php"><i class="fa-solid fa-key fa-xl" style="color: #000000"></i>Manage Account</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                
                <div  class="table-responsive py-1">
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
                        <th>Subject Id</th>
                        <th>Subject Name</th>
                        <th>Year</th>
                        <th>Course </th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </thead>
                    <tbody>
                    <?php
                            $conn = mysqli_connect("localhost", "root", "", "mini");
                            $str = "select s.subj_id ,s.sub_name,s.year,c.course_name from subject as s, course as c where c.course_id = s.course_id order by s.sub_credit ";
                            $res = mysqli_query($conn, $str);
                            while ($row = mysqli_fetch_assoc($res)) {


                            ?>
                        <tr>
                            <td><?php echo $row["subj_id"] ?></td>
                            <td><?php echo $row["sub_name"] ?></td>
                            <td><?php echo $row["year"] ?></td>
                            <td><?php echo $row["course_name"] ?></td>
                            <td>
                                <a class="btn btn-success" href="./delete.php?del=<?php echo $row["subj_id"] ?>"onclick="return del()">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="./edit.php?edit=<?php echo $row["subj_id"] ?>">Edit</a>
                            </td>
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