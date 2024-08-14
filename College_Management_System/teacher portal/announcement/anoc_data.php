<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "mini");
$email=$_SESSION["uname"];
$re = mysqli_query($con, "select * from teacher_reg where emp_email='$email'");
$ro = mysqli_fetch_assoc($re);
$empi=$ro["empid"];
$c_id=$ro["course_id"];
$date = date_create(date('y-m-d'));
$date1 = date_format($date, "Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$time= date("h:i:sa");

if (isset($_POST["sub"])){
// echo $empi;
    $mess = $_POST["mess"];
    $image = $_FILES["img"];
    $name = $_FILES["img"]["name"];
    $tmp = $_FILES["img"]["tmp_name"];
    $path = "C:/xampp/htdocs/php_and_mysql/teacher portal/empanoc_img/" . $name;
    move_uploaded_file($tmp, $path);
    $conn = mysqli_connect("localhost", "root", "", "mini");
    $str = "insert into emp_announce(date,time,message,empid,course_id,img) values ('$date1','$time','$mess','$empi','$c_id','$name')";
    $res = mysqli_query($conn, $str);
    if($res==true){
            header("location:anoc.php?msg=messages sent successfully");
        }

    }