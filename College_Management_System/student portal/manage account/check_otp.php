<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'mini');
$otp = $_POST['otp'];
$email = $_SESSION['EMAIL'];
$res = mysqli_query($con, "select * from stu where semail='$email' and otp='$otp'");
$count = mysqli_num_rows($res);
if ($count > 0) {
	mysqli_query($con, "update stu set otp='' where semail='$email'");
	// $_SESSION['IS_LOGIN'] = $email;
	 $_SESSION["uname2"] = $email;
	echo "yes";
} else {
	echo "not_exist";
}
