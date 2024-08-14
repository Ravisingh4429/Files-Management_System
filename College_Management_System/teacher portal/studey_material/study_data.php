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
    $path = "../study_material_file/" . $name;
    move_uploaded_file($tmp, $path);
    $conn = mysqli_connect("localhost", "root", "", "mini");
    $str = "insert into study_mat(date,time,message,file,c_id,emp_id) values ('$date1','$time','$mess','$name','$c_id','$empi')";
    $res = mysqli_query($conn, $str);
    if($res==true){
            header("location:study.php?msg=messages sent successfully");
        }

    }