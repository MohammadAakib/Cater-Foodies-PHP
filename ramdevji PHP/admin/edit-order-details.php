<?php
include './class/myclass.php';

$editid = $_GET['editid'];
if(!isset($_GET['editid']) || empty($_GET['editid']))
{
    header('location:display-order-details.php');
}
$sq = mysqli_query($conn, "select * from tbl_order_details where order_details_id='{$editid}'") or die(mysqli_error($conn));
$edata = mysqli_fetch_array($sq);
if (isset($_POST['btnsubmit'])) {
    $order_details_id = $_POST['order_details_id'];
    $system_date = $_POST['system_date'];
    $order_date = $_POST['order_date'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $no_of_person = $_POST['no_of_person'];
    $total_amount = $_POST['total_amount'];
    $grand_total = $_POST['grand_total'];
    $payment_method = $_POST['payment_method'];
    $status = $_POST['status'];
    //$ = $_POST[''];

    $uq = mysqli_query($conn, "update tbl_order_details set order_id='{$order_id}',system_date='{$system_date}',order_date='{$order_date}',price='{$price}',qty='{$qty}',no_of_person='{$no_of_person}',total_amount='{$total_amount}',grand_total='{$grand_total}',payment_method='{$payment_method}',status='{$status}', where order_details_id='{$order_details_id}'") or die("Error" . mysqli_error($conn));

    if ($uq) {
        echo "<script>alert('Data Has Been Updated.');window.location='display-order-details.php'</script>";
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
                                        <label for="order_details_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="order_details_id" required="" value="<?php echo $edata['order_details_id']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="system_date" class="col-sm-2 control-label">Booking Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control1" name="system_date" required="" value="<?php echo $edata['system_date']; ?>">                                              
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="order_date" class="col-sm-2 control-label">Order Date</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="order_date" required="" value="<?php echo $edata['order_date']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="col-sm-2 control-label">Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="price" required="" value="<?php echo $edata['price']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="qty" class="col-sm-2 control-label">Quantity</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="qty" required="" value="<?php echo $edata['qty']; ?>">                                              
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="no_of_person" class="col-sm-2 control-label">Number of Person</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="no_of_person" required="" value="<?php echo $edata['no_of_person']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="total_amount" class="col-sm-2 control-label">Total Amount</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="total_amount" required="" value="<?php echo $edata['total_amount']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="grand_total" class="col-sm-2 control-label">Grand Total</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="grand_total" required="" value="<?php echo $edata['grand_total']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_method" class="col-sm-2 control-label">Payment Method</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="payment_method" required="" value="<?php echo $edata['payment_method']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status" class="col-sm-2 control-label">Status</label>
                                        <div class="col-sm-8">
                                             <select name="status">
                                                <option>Pendding</option>
                                                <option>Cancel</option>
                                                <option>Conform</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="status" required="" value="<?php echo $edata['status']; ?>">                                              
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


