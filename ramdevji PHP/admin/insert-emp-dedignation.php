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
                            <h3 class="title1">Employee Designation Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                   
                                    <div class="form-group">
                                        <label for="emp_designation_name" class="col-sm-2 control-label">Designation Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="emp_designation_name" required="" placeholder="Enter Employee Designation">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="price" class="col-sm-2 control-label">Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="price" required="" placeholder="Enter Employee Amount">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="qty" class="col-sm-2 control-label">Quantity</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="qty" required="true" placeholder="Enter Quantity OF Employee">
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

                            if (isset($_POST['submit'])) 
                            {
                                $emp_designation_name = $_POST['emp_designation_name'];
                                $price = $_POST['price'];
                                $qty = $_POST['qty'];

                                $q = mysqli_query($conn, "insert into tbl_emp_designation(emp_designation_name,price,qty) values('{$emp_designation_name}','{$price}','{$qty}')") or die(mysqli_error($conn));

                                if($q)
                                {
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
                $q= mysqli_query($conn,'select * from tbl_employee')or die(mysqli_error($conn));
                echo "<select>";
                while ($row = mysql_fetch_array($q)) {
                    echo "<option value={$row['employee_id']}>{$row['employee_designation']}</option>";
                    echo "<option value={$row['employee_id']}>{$row['employee_designation']}</option>";
                    
                    }                   
                echo "</select>";
        ?>
    </body>
</html>