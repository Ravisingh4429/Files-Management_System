<?php
// session_start();
include("../sweat_alert/sw.php");
include("../com.php");
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../bootstrap.css" />
    <link rel="stylesheet" href="../dashboard/home.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .cpas {
            background-color: #ff4d4d;
            border: none;
            color: white;
            border-radius: 15px 5px 15px 5px;


        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row first">
            <div class="col-md-2 top2">
                <a href="../dashboard/home.php">
                    <h5><i class="fa-brands fa-slack fa-xl"></i> ABC COLLAGE Student Portal</h5>
                </a>
            </div>
            <div class="col-md-10 topbar">

                <ul>
                    <li><a href="../manage account/logout.php"><i class="fa-solid fa-right-from-bracket fa-xl" style="color: #ffffff;"></i></a></li>
                    <li><a href="../notification/fetch.php"><i class="fa-solid fa-bell"></i></a>

                        <!-- <li><a href="./fetch.php"><i class="fa-solid fa-clock-rotate-left"></i></a></li> -->

                    </li>
                    <li><a href="../personal fetch/pfetch.php">
                            <?php
                            if ($_SESSION["uname2"] != "") {
                                echo $_SESSION["uname2"];
                            } else {
                                header("location:../manage account/login.php");
                            }
                            ?>
                        </a></li>
                </ul>
            </div>
        </div>
        <div class="row sidemain">
            <div class="col-md-2 side">
                <ul>
                    <li><a href="../dashboard/home.php"> <i class="fa-solid fa-house fa-xl" style="color: #000000;"></i>Dashboard</a></li>
                    <li><a href="../class notification/fetch.php"> <i class="fa-solid fa-briefcase fa-xl" style="color: #000000;"></i>Class Notification</a></li>
                    <li><a href="../study_material/study_mat.php"><i class="fa-solid fa-book fa-xl" style="color: #000000;"></i>Study Material</a>
                    <li><a href="./attfetch.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000;"></i>Student Attendance</a></li>
                    <li><a href="../time_table/fetch.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a></li>
                    <li><a href="../ask_query/ask.php"> <i class="fa-solid fa-clipboard-question fa-xl" style="color: #030303;"></i> Ask's query</a></li>

                </ul>
            </div>

            <div class="col-md-10">

                <div class="row justify-content-between py-3">
                    <div class="col-md-3">
                        <form action="<?php $_SERVER["PHP_SELF"] ?>" onsubmit="return vali()" method="post">
                            Select Month
                            <?php
                            $opt = "";
                            for ($i = 1; $i <= 12; $i++) {
                                $date = date_create(date("y-$i-d"));

                                $date1 = date_format($date, "M-Y");
                                $opt = $opt . "<option value=$date1>$date1</option>";
                            }
                            ?>
                            <select name="mon" id="scourse" class="form-control">
                                <option value="">select</option>
                                <?php echo $opt ?>

                            </select>
                            <p id="errm" class="err"></p>
                    </div>

                    <div class="col-md-4">
                        <input type="submit" value="Search" class="form-control btn btn-success" name="sub">

                    </div>
                    </form>
                </div>
                <div class="table-responsive py-1">

                    <?php
                    if (isset($_POST["sub"])) {
                        $mon = $_POST["mon"];
                    ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <th>Date</th>
                                <th>Status</th>

                            </thead>
                            <tbody>
                                <?php
                                $conn = mysqli_connect("localhost", "root", "", "mini");
                                $str = "select * from bba_stuatt where stu_id='$sid' and month='$mon'";
                                $res = mysqli_query($conn, $str);
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row["date"] ?></td>
                                        <td><?php echo $row["status"] ?></td>


                                    </tr>
                            </tbody>
                    <?php
                                }
                            }
                    ?>
                        </table>
                </div>
            </div>
        </div>
        <script>
        var mon = document.getElementById("scourse");
        // var month = document.getElementById("month");
     
        
       
        var no = 1;

        function vali() {
            if (mon.value == "") {
                document.getElementById("errm").innerHTML = "select one";
                no = 0;
            }else {
                document.getElementById("errm").innerHTML = "";
                no = 1;

            }
            
           
           
            if (no) {

                return true;
            } else {
                return false;

            }
        }
    </script>
</body>

</html>