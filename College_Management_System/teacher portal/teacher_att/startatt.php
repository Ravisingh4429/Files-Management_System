<?php
session_start();
include("../sweat_alert/sw.php");
$con = mysqli_connect("localhost", "root", "", "mini");
$email = $_SESSION["uname"];
$re = mysqli_query($con, "select * from teacher_reg where emp_email='$email'");
$ro = mysqli_fetch_assoc($re);
$empi = $ro["empid"];
$c_id = $ro["course_id"];
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../bootstrap.css" />
  <link rel="stylesheet" href="../Dashboard/home.css" />
  
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
            <a href="./startatt.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000"></i>Teacher
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
        <div class="row">
            <div class="col-md-3 my-3">
                <a href="./att.php" class="btn btn-success">Start</a>
               <script>
                    const keyvalue=window.location.search;
                    const urlp= new URLSearchParams(keyvalue);
                    const msg=urlp.get("msg");
                    if (msg!="") {
                        Swal.fire({
                                position: "center",
                                icon: "success",
                                title: "Attendance Taken",
                                showConfirmButton: false,
                                timer: 1000
                            });
                        
                    }
               </script>
            </div>
        </div>
      </div>
</body>

</html>