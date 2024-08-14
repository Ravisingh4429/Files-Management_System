<?php
if (isset($_REQUEST["del"])) {
    $del = $_REQUEST["del"];
}
$conn = mysqli_connect("localhost", "root", "", "mini");
$str = "delete from study_mat where smid ='$del'";
$res = mysqli_query($conn, $str);
if ($res == true) {
    header("location:manage_study.php?msg=Data delete successfully");
}
