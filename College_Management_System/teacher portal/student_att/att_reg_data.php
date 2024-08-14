<?php
include("../com.php");
$conn = mysqli_connect("localhost", "root", "", "mini");
$atten = "P";
// $date = date_create(date('y-m-d'));
// $date1 = date_format($date, "Y-m-d");
$att = $_POST["att"];
$date = date_create(date('y-m-d'));
$date1 = date_format($date, "Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$time= date("h:i:sa");
$year=$_POST["year"];
// $date = date_create(date("y-m-d"));               
$mon = date_format($date, "M-Y");
if (isset($_POST["att"])) {


    foreach ($att as  $i) {
        $str = "insert into bba_stuatt (date,time,emp_id,stu_id,status,year,course_id,month) values ('$date1','$time','$empi','$i','$atten','$year','$c_id','$mon')";
        $res = mysqli_query($conn, $str);
    }
}
$st1 = "select stu_id from bba_stuatt where status = 'P'";
$w = "select s.stu_id from stu as s where s.year='$year' and s.course_id='$c_id' and s.stu_id not in ($st1)";
$re1 = mysqli_query($conn, $w);
$att1 = "A";



while ($row = mysqli_fetch_assoc($re1)) {
     $ro1=$row["stu_id"];

    $str1 = "insert into bba_stuatt (date,time,emp_id,stu_id,status,year,course_id,month) values ('$date1','$time','$empi','$ro1','$att1','$year','$c_id','$mon')";
        $res1 = mysqli_query($conn, $str1);
    
}
if ($res1 == true ||$res == true ) {
    header("location:year.php?msg=done");
}