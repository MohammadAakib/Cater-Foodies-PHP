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
                            <h3 class="title1">Salary Form :</h3>
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
                                        <label for="salary_date" class="col-sm-2 control-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control1" name="salary_date" required="" placeholder="Enter salary date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary_amount" class="col-sm-2 control-label">Amount</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="salary_amount" required="" placeholder="Enter salary amount">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary_method" class="col-sm-2 control-label">Method</label>
                                        <div class="col-sm-8">
                                            <select name="salary_method">
                                                <option value="Case">Cash</option>
                                                <option value="Cheque">Cheque</option>
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
                        </div>

                        <?php
                        include 'class\myclass.php';

                        if (isset($_POST['submit'])) 
                            {
                                $empname = $_POST['empname'];
                                $salary_date = $_POST['salary_date'];
                                $salary_amount = $_POST['salary_amount'];
                                $salary_method = $_POST['salary_method'];
                            
                                $q = mysqli_query($conn, "insert into tbl_salary(employee_id,salary_date,salary_amount,salary_method) values('{$empname}','{$salary_date}','{$salary_amount}','{$salary_method}')") or die(mysqli_error($conn));

                            if ($q)
                            {
                                echo "<script>alert('Data Inserted');</script>";
                                
                            }
                        }
                        ?>
                        
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
<script src="js/classie.js"></script>
<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
            showLeftPush = document.getElementById('showLeftPush'),
            body = document.body;

    showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"></script>
   <?php
                include 'class\myclass.php';
                $q= mysqli_query($conn,'select * from tbl_salary')or die(mysqli_error($conn));
                echo "<select>";
                while ($row = mysql_fetch_array($q)) {
                    echo "<option value={$row['salary_id']}>{$row['salary_method']}</option>";
                    
                    }                   
                echo "</select>";
        ?>
</body>
</html>