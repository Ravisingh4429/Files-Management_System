<?php
include("../com.php");
$date = date_create(date('y-m-d'));
$date1 = date_format($date, "Y-m-d");
date_default_timezone_set("Asia/Calcutta");
$time= date("h:i:sa");
$filename =  time() . '.jpg';
$filepath = 'images/';
if (!is_dir($filepath))
	mkdir($filepath);
if (isset($_FILES['webcam'])) {
	move_uploaded_file($_FILES['webcam']['tmp_name'], $filepath . $filename);
	$conn = mysqli_connect("localhost", "root", "", "mini");
	$str = "insert into teacher_att(empid,att_date,status,img) values('$empi','$date1','P','$filename')";
	$res = mysqli_query($conn, $str);
	echo $filepath . $filename;
}
