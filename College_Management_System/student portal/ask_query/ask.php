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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
                    <li><a href="../notification/fetch.php"><i class="fa-solid fa-bell"></i></a></li>

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
                    <li><a href="../attendance/attfetch.php"><i class="fa-regular fa-square-check fa-xl" style="color: #000000;"></i>Student Attendance</a></li>
                    <li><a href="../time_table/fetch.php"><i class="fa-regular fa-clock fa-xl" style="color: #000000"></i>Time Table</a></li>
                    <li><a href="./ask.php"> <i class="fa-solid fa-clipboard-question fa-xl" style="color: #030303;"></i> Ask's query</a>
                        <ul id="tec">
                            <li><a href="./asked_query.php"> Asked query</a>

                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php
                if (isset($_REQUEST["msg"])) {
                ?>

                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: "<?php echo $_REQUEST["msg"]; ?>",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>
                <?php
                }
                ?>
                <div class="row justify-content-between py-3">
                    <div class="col-md-3">
                        <form action="./ask_to.php" onsubmit="return vali()" method="post">
                            Select Subject
                            <?php
                            $conn = mysqli_connect("localhost", "root", "", "mini");
                            // $str = "select * from subject where course_id='$c_id' and year='$year'";
                            $str = "select s.sub_name,t.subj_id from subject as s, teacher_reg as t where s.subj_id=t.subj_id and s.course_id='$c_id' and s.year='$year'";
                            $res = mysqli_query($conn, $str);
                            $opt = "";
                            while ($row = mysqli_fetch_array($res)) {
                                $opt = $opt . "<option value=$row[subj_id]>$row[sub_name]</option>";
                            }
                            ?>
                            <select name="subject" id="scourse" class="form-control">
                                <option value="">select</option>
                                <?php echo $opt ?>

                            </select>
                            <p id="errm" class="err"></p>

                    </div>

                    <div class="col-md-4">
                        <input type="submit" value="Next" class="form-control btn btn-success" name="sub">

                    </div>
                    </form>
                </div>

            </div>
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