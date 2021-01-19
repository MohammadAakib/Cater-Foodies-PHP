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
    header('location:display-utensil.php');
}
$sq = mysqli_query($conn, "select * from tbl_utensil where utensil_id='{$editid}'") or die(mysqli_error($conn));
$edata = mysqli_fetch_array($sq);
if (isset($_POST['btnsubmit'])) {
    $utensil_id = $_POST['utensil_id'];
    $utensil_name = $_POST['utensil_name'];
    $utensil_quantity = $_POST['utensil_quantity'];
   // $utensil_time = $_POST['utensil_time'];
    //$utensil_address = $_POST['utensil_address'];
    

    $uq = mysqli_query($conn, "update tbl_utensil set utensil_name='{$utensil_name}',utensil_quantity='{$utensil_quantity}' where utensil_id='{$utensil_id}'") or die("Error" . mysqli_error($conn));

    if ($uq) {
        echo "<script>alert('Data Has Been Updated.');window.location='display-utensil.php'</script>";
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
                            <h3 class="title1">Utensil-Edit Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="utensil_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" readonly="true" class="form-control1" name="utensil_id" required="" value="<?php echo $edata['utensil_id']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="utensil_name" class="col-sm-2 control-label">Utensil Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="utensil_name" required="" value="<?php echo $edata['utensil_name']; ?>">                                              
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <label for="utensil_quantity" class="col-sm-2 control-label">Quantity</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="utensil_quantity" required="" value="<?php echo $edata['utensil_quantity']; ?>">                                              
                                        </div>
                                    </div>
                                   <!--   <div class="form-group">
                                        <label for="utensil_time" class="col-sm-2 control-label">Utensil Time</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="utensil_time" required="" value="<?php echo $edata['utensil_time']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="utensil_address" class="col-sm-2 control-label">Utensil Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="utensil_address" required="" value="<?php echo $edata['utensil_address']; ?>">                                              
                                        </div>
                                    </div>
                                 -->
                                    <div>
                                        <center>
                                            <button type="submit" name="btnsubmit" class="btn btn-default">Update</button>
                                            <button type="button" name="cancel" class="btn btn-default" value="cancel" onclick="window.location='display-utensil.php';">Cancel</button>
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
    </body>
</html>


