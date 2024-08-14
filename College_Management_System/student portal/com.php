<?php
session_start();
$con= mysqli_connect("localhost", "root", "", "mini");

$email = $_SESSION["uname2"];
$re = mysqli_query($con, "select * from stu where semail='$email'");
$ro = mysqli_fetch_assoc($re);
$sid = $ro["stu_id"];
 $c_id = $ro["course_id"];
 $sname=$ro["sname"];
 $year=$ro["year"];
