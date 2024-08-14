<?php
session_start();
$con= mysqli_connect("localhost", "root", "", "mini");

$email = $_SESSION["uname"];
$re = mysqli_query($con, "select * from teacher_reg where emp_email='$email'");
$ro = mysqli_fetch_assoc($re);
$empi = $ro["empid"];
 $c_id = $ro["course_id"];
 $emp_name=$ro["empname"];
$sub=$ro["subj_id"];