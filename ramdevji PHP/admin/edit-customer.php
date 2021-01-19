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
    header('location:display-category.php');
}
$sq = mysqli_query($conn, "select * from tbl_customer where customer_id='{$editid}'") or die(mysqli_error($conn));
$edata = mysqli_fetch_array($sq);
if (isset($_POST['btnsubmit'])) {
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $customer_email= $_POST['customer_email'];
    $customer_mobile= $_POST['customer_mobile'];
    $customer_address= $_POST['customer_address'];
    

    $uq = mysqli_query($conn, "update tbl_customer set customer_name='{$customer_name}',customer_email='{$customer_email}',customer_mobile='{$customer_mobile}',customer_address='{$customer_address}' where customer_id='{$customer_id}'") or die("Error" . mysqli_error($conn));

    if ($uq) {
        echo "<script>alert('Data Has Been Updated.');window.location='display-customer.php'</script>";
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
                            <h3 class="title1">Customer-Edit Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="customer_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="customer_id" required="" value="<?php echo $edata['customer_id']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="customer_name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="customer_name" required="" value="<?php echo $edata['customer_name']; ?>">                                              
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label for="customer_name" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="customer_email" required="" value="<?php echo $edata['customer_email']; ?>">                                              
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label for="customer_mobile" class="col-sm-2 control-label">Mobile</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="customer_mobile" required="" value="<?php echo $edata['customer_mobile']; ?>">                                              
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <label for="customer_name" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="customer_address" required="" value="<?php echo $edata['customer_address']; ?>">                                              
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


