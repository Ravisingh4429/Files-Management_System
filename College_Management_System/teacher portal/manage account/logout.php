<?php
session_start();
if ($_SESSION["uname"] != "") {
    session_destroy();
    header("location:login.php");
}
