<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'mini');
$otp = $_POST['otp'];
$email = $_SESSION['EMAIL'];
$res = mysqli_query($con, "select * from teacher_reg where emp_email='$email' and otp='$otp'");
$count = mysqli_num_rows($res);
if ($count > 0) {
	mysqli_query($con, "update teacher_reg set otp='' where emp_email='$email'");
	$_SESSION['uname'] = $email;
	echo "yes";
} else {
	echo "not_exist";
}
