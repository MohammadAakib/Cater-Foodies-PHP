<?php
include './class/myclass.php';

$editid = $_GET['editid'];
if(!isset($_GET['editid']) || empty($_GET['editid']))
{
    header('location:display-booking-details.php');
}
$sq = mysqli_query($conn, "select * from tbl_booking_details where booking_details_id='{$editid}'") or die(mysqli_error($conn));
$edata = mysqli_fetch_array($sq);
if (isset($_POST['btnsubmit'])) {
    $booking_details_id = $_POST['booking_details_id'];
    $booking_id = $_POST['booking_id'];
    $utensil_id= $_POST['utensil_id'];
    $price= $_POST['price'];
    
    

    $uq = mysqli_query($conn, "update tbl_booking_details set booking_id='{$booking_id}',utensil_id='{$utensil_id}',price='{$price}' where booking_details_id='{$booking_details_id}'") or die("Error" . mysqli_error($conn));

    if ($uq) {
        echo "<script>alert('Data Has Been Updated.');window.location='display-booking-details.php'</script>";
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
                            <h3 class="title1">Book Details Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="booking_details_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="booking_details_id" required="" value="<?php echo $edata['booking_details_id']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="booking_id" class="col-sm-2 control-label">Booking Id</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="booking_id" required="" value="<?php echo $edata['booking_id']; ?>">                                              
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label for="utensil_id" class="col-sm-2 control-label">Utensil Id</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="utensil_id" required="" value="<?php echo $edata['utensil_id']; ?>">                                              
                                        </div>
                                    </div>
                                    
                                        <div class="form-group">
                                        <label for="price" class="col-sm-2 control-label">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="price" required="" value="<?php echo $edata['price']; ?>">                                              
                                        </div>
                                    </div>

                                    <div>
                                        <center>
                                            <button type="submit" name="btnsubmit" class="btn btn-default">Submit</button>
                                            <button type="button" name="reset" class="btn btn-default" value="reset" onclick="window.location='display-customer.php';">Reset</button>
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


