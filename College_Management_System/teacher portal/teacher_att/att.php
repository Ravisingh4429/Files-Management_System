<?php
session_start();
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
            <a href="./att.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000"></i>Teacher
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
          <div class="table table-responsive">

            <div class="col-md-3 my-3" id="my_camera">
              
              </div>
              <input type=button value="Take Snapshot" class="btn btn-success my-3" onClick="take_snapshot()">
            </div>
            
        </div>
        
        <script type="text/javascript" src="webcam.min.js"></script>

        <!-- Code to handle taking the snapshot and displaying it locally -->
        <script language="JavaScript">
          // Configure a few settings and attach camera
          Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90
          });
          Webcam.attach('#my_camera');

          function take_snapshot() {

            // take snapshot and get image data
            Webcam.snap(function(data_uri) {
              Webcam.upload(data_uri, 'saveimage.php', function(code, text, Name) {
                if(data_uri!=""){
                  
                  window.location="./startatt.php?msg=done"
                  
                }
             
              });


            });
          }
        </script>
      </div>
</body>

</html>