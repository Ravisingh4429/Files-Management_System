<?php
include("../com.php");
$conn = mysqli_connect("localhost", "root", "", "mini");
$subid=$_POST["subid"];
$ques=$_POST["ques"];
$st="select empid from teacher_reg where subj_id='$subid'";
 $res = mysqli_query($conn, $st);
 $row=mysqli_fetch_array($res);
 $empid=$row[0];
 $date = date_create(date('y-m-d'));
$date1 = date_format($date, "Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$time= date("h:i:sa");
 $str = "insert into query(que,c_id,empid,year,stuid,subjid,asked_date,asked_time) values('$ques','$c_id','$empid','$year','$sid','$subid','$date1','$time')";
 $re = mysqli_query($conn, $str);
 if ($re == true) {
    header("location:ask.php?msg=Query send successfully");
}
