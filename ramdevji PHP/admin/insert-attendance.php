<?php
session_start();

if(!isset($_SESSION['adminid']))
{
    header("location:login.php");
}
?>
<!DOCTYPE HTML>
<html>
    <?php
    include 'head.php';
    ?>
    <body class="cbp-spmenu-push">
        <div class="main-content">
            <!--left-fixed -navigation-->
            <div class=" sidebar" role="navigation">
                <?php
                include 'navbar.php';
                ?>
            </div>
            <!--left-fixed -navigation-->
            <!-- header-starts -->
            <div class="sticky-header header-section ">
                <div class="header-left">
                    <!--toggle button start-->
                    <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                    <!--toggle button end-->
                    <!--logo -->
                    <div class="logo">
                        <a href="home.php">
                            <h1>RAMDEVJI CATRES</h1>
                            <span>AdminPanel</span>
                        </a>
                    </div>
                    <!--//logo-->
                </div>
                <?php
                include 'profile.php';
                ?>
                <div class="clearfix"> </div>	
            </div>
            <!-- //header-ends -->
            <!-- main content start-->
            <div id="page-wrapper">
                <div class="main-page">
                    <div class="forms">
                        <div class="row">
                            <h3 class="title1">Attendance Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                    <label for="order_status" class="col-sm-2 control-label">Employee Name</label>
                                        <div class="col-sm-8">
                                            <?php
                                                require 'class\myclass.php';
                                                $sq= mysqli_query($conn,"select * from tbl_employee") or die(mysqli_error($conn));
                                                echo "<select name='empname'>";
                                                while ($row1 = mysqli_fetch_array($sq)) {
                                                    echo "<option value='{$row1['employee_id']}'>{$row1['employee_name']}</option>";
                                                }                            
                                                echo "</select>";
                                            ?>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label for="attendance_date" class="col-sm-2 control-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control1" name="attendance_date" required="" placeholder="Enter Date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="attendance_shift" class="col-sm-2 control-label">Shift</label>
                                        <div class="col-sm-8">
                                            <select name="attendance_shift">
                                                <option value="Morning">Morning</option>
                                                <option value="Noon">Noon</option>
                                                <option value="Evening">Evening</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="attendance_is_present" class="col-sm-2 control-label">Present</label>
                                        <div class="col-sm-8">
                                            <select name="attendance_is_present">
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <center>
                                            <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                            <button type="reset" name="cancel" class="btn btn-default">Cancel</button>
                                        </center> 
                                    </div>
                                </form>
                            </div>

                            <?php
                            include 'class\myclass.php';

                            if (isset($_POST['submit'])) {
                                $empname = $_POST['empname'];
                                $attendance_date = $_POST['attendance_date'];
                                $attendance_shift = $_POST['attendance_shift'];
                                $attendance_is_present = $_POST['attendance_is_present'];


                                $q = mysqli_query($conn, "insert into tbl_attendance(employee_id,attendance_date,attendance_shift,attendance_is_present) values('{$empname}','{$attendance_date}','{$attendance_shift}','{$attendance_is_present}')") or die(mysqli_error($conn));

                                if ($q) {
                                    echo "<script>alert('Data Inserted');</script>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-->
            <div class="footer">
                <p>&copy; 2019 RAMDEVJI CATRES Admin Panel. All Rights Reserved</p>
            </div>
            <!--//footer-->
        </div>
        <!-- Classie -->
<?php
include 'java-script.php';
?>
        <?php
                include 'class\myclass.php';
                $q= mysqli_query($conn,'select * from tbl_attendance')or die(mysqli_error($conn));
                echo "<select>";
                while ($row = mysql_fetch_array($q)) {
                    echo "<option value={$row['attendance_id']}>{$row['attendance_shift']}</option>";
                    echo "<option value={$row['attendance_id']}>{$row['attendance_is_present']}</option>";
                    
                    }                   
                echo "</select>";
        ?>
    </body>
</html>