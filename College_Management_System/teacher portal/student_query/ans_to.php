<?php
include("../com.php");
$conn = mysqli_connect("localhost", "root", "", "mini");
$qid=$_POST["qid"];
$ans=$_POST["ans"];

 $date = date_create(date('y-m-d'));
$date1 = date_format($date, "Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$time= date("h:i:sa");
 $str = "update query set ans='$ans' , ans_date='$date1',ans_time='$time' where qid='$qid'";
 $re = mysqli_query($conn, $str);
 if ($re == true) {
    header("location:fetch_query.php?msg=Query resolve successfully");
}
