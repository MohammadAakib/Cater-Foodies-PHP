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
                            <h3 class="title1">Employee Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                    
                                    
                                    <div class="form-group">
                                        <label for="employee_name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="employee_name" required="" placeholder="Enter Employee Name">
                                        </div>
                                    </div>

                                   <!-- <div class="form-group">
                                        <label for="employee_designation" class="col-sm-2 control-label">Designation</label>
                                        <div class="col-sm-8">
                                            <select name="employee_designation">
                                                <option value="1">chef</option>
                                                <option value="2">Manager</option>
                                                <option value="3">Worker</option>
                                                <option value="4">Waiter</option>
                                              
                                            </select>
                                        </div>
                                    </div>   !-->
                                    <div class="form-group">
                                        <label for="emp_designation_id" class="col-sm-2 control-label">Designation </label>
                                        <?php
                                                require 'class\myclass.php';
                                                $sq= mysqli_query($conn,"select * from  tbl_emp_designation") or die(mysqli_error($conn));
                                                echo "<select name='emp_designation_id'>";
                                                while ($row1 = mysqli_fetch_array($sq)) {
                                                    echo "<option value='{$row1['emp_designation_id']}'>{$row1['emp_designation_name']}</option>";
                                                }                            
                                                echo "</select>";
                                            ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="employee_mobile" class="col-sm-2 control-label">Mobile Number</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="employee_mobile" required="" placeholder="Enter Employee Mobile Number">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtarea1" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-8"><textarea name="employee_address" cols="50"required="" placeholder="Enter Employee Address" rows="4" class="form-control1"></textarea></div>
                                    </div>
                                   
                                    
                                    <div class="form-group">
                                        <label for="employee_designation" class="col-sm-2 control-label">Photo</label>
                                        <div class="col-sm-8">
                                            <input type="file" id="exampleInputFile" name="employee_photo">                    
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="employee_designation" class="col-sm-2 control-label">Signature</label>
                                        <div class="col-sm-8">
                                            <input type="file" id="exampleInputFile">
                                            <input type="text" class="form-control1" id="employee_designation" placeholder="Enter Employee Designation">
                                        </div>
                                    </div>
                                    !-->   
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
                               // $orderadd = $_POST['orderadd'];
                                $employee_name = $_POST['employee_name'];
                                $employee_designation = $_POST['emp_designation_id'];
                                $employee_mobile = $_POST['employee_mobile'];
                                $employee_address = $_POST['employee_address'];
                               // $employee_salary = $_POST['employee_salary'];
                                $destination ="upload/" . $_FILES['employee_photo'] ['name'];

                                $q = mysqli_query($conn, "insert into tbl_employee(employee_name,emp_designation_id,employee_mobile,employee_address,employee_photo) values('{$employee_name}','{$employee_designation}','{$employee_mobile}','{$employee_address}','{$destination}')") or die(mysqli_error($conn));

                                if($q)
                                {
                                     if($_FILES['employee_photo'] ['type']=="image/png"  || $_FILES['employee_photo'] ['type']=="image/jpeg")
                                     {
                                        $uf= move_uploaded_file($_FILES['employee_photo'] ['tmp_name'], $destination);  
                                     }
                                }echo "<script>alert('Data Inserted');</script>";
                                
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