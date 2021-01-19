<?php
session_start();

if(!isset($_SESSION['adminid']))
{
    header("location:login.php");
}
?>
<?php
require 'class\myclass.php';

$editid=$_GET['editid'];
if (!isset($_GET['editid']) || empty($_GET['editid'])) 
{
    header("location:display-employee.php");    
}

$sq = mysqli_query($conn, "select * from tbl_attendance where attendance_id='{$editid}'") or die(mysqli_error($conn));
$attdata = mysqli_fetch_array($sq);
if (isset($_POST['btnsubmit'])) 
{
    $attendance_id = $_POST['attendance_id'];
    $attendance_date = $_POST['attendance_date'];
    $attendance_shift = $_POST['attendance_shift'];
    $attendance_is_present = $_POST['attendance_is_present'];
    
    $uq= mysqli_query($conn, "update tbl_attendance set attendance_date='{$attendance_date}',attendance_shift='{$attendance_shift}',attendance_is_present='{$attendance_is_present}' where attendance_id='{$attendance_id}' ") or die(mysqli_error($conn));               

    if ($uq) {
        echo "<script>alert('Data Has Been Updated.');window.location='display-attendance.php'</script>";
    }
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
                            <h3 class="title1">Attendance Edit Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                     
                                    <div class="form-group">
                                        <label for="attendance_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" readonly="" class="form-control1" name="attendance_id" required="" value="<?php echo $attdata['attendance_id']; ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="attendance_date" class="col-sm-2 control-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control1" name="attendance_date" required="" value="<?php echo $attdata['attendance_date']; ?>">
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
                                            <button type="submit" name="btnsubmit" class="btn btn-default">Update</button>
                                            <button type="button" name="btncancel" onclick="window.location = 'display-attendance.php';" class="btn btn-default">Cancel</button>
                                        </center> 
                                    </div>
                                </form>
                            </div>


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