<?php
session_start();
if ($_SESSION["uname2"] != "") {
    session_destroy();
    header("location:login.php");
}
