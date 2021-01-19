<?php
session_start();

if(!isset($_SESSION['adminid']))
{
    header("location:login.php");
}
?>
<?php
include './class/myclass.php';

$editid = $_GET['editid'];
if(!isset($_GET['editid']) || empty($_GET['editid']))
{
    header('location:display-package.php');
}
$sq = mysqli_query($conn, "select * from tbl_package where package_id='{$editid}'") or die(mysqli_error($conn));
$edata = mysqli_fetch_array($sq);
if (isset($_POST['btnsubmit'])) {
    $package_id = $_POST['package_id'];
    $package_name = $_POST['package_name'];
    $package_details = $_POST['package_details'];

    $uq = mysqli_query($conn, "update tbl_package set package_name='{$package_name}',package_details='{$package_details}' where package_id='{$package_id}'") or die("Error" . mysqli_error($conn));

    if ($uq) {
        echo "<script>alert('Data Has Been Updated.');window.location='display-package-master.php'</script>";
        //header("location:display-employee.php");
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
                            <h3 class="title1">Package edit Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="pkm_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="package_id" required="" value="<?php echo $edata['package_id']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pkm_name" class="col-sm-2 control-label">Package Name</label>
                                        <div class="col-sm-8">
                                             <select name="pkm_name">
                                                <option>South Indian Dish</option>
                                                <option>Punjabi Dish</option>
                                                <option>Gujarati Dish</option>
                                                <option>Fast Food</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="package_details" class="col-sm-2 control-label">Package Details</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="package_details" required="" value="<?php echo $edata['package_details']; ?>">                                                
                                        </div>
                                    </div>

                                    <div>
                                        <center>
                                            <button type="submit" name="btnsubmit" class="btn btn-default">Update</button>
                                            <button type="button" name="cancel" class="btn btn-default" value="cancel" onclick="window.location='display-package.php';">Cancel</button>
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
                $q= mysqli_query($conn,'select * from tbl_package_master')or die(mysqli_error($conn));
                echo "<select>";
                while ($row = mysql_fetch_array($q)) {
                    echo "<option value={$row['package_id']}>{$row['package_name']}</option>";
                    
                    }                   
                echo "</select>";
        ?>
    </body>
</html>


