<?php
session_start();

if(!isset($_SESSION['adminid']))
{
    header("location:login.php");
}
?>
<?php
require 'class\myclass.php';

if (isset($_GET['editid'])) {
    $editid = $_GET['editid'];
    $sq = mysqli_query($conn, "select * from tbl_employee where employee_id='{$editid}'") or die(mysqli_error($conn));
    $empdata = mysqli_fetch_array($sq);
} else {
    header("location:display-employee.php");
}
if (isset($_POST['btnsubmit'])) {
    $employee_id = $_POST['employee_id'];
    $employee_name = $_POST['employee_name'];
    //$employee_designation = $_POST['employee_designation'];   employee_designation='{$employee_designation}',
    $employee_mobile = $_POST['employee_mobile'];
    $employee_address = $_POST['employee_address'];
    //$employee_salary = $_POST['employee_salary'];   employee_salary='{$employee_salary}',
    //$destination ="images/" . $_FILES['employee_photo'] ['name'];  ,employee_photo='{$destination}'
    $uq = mysqli_query($conn, "update tbl_employee set employee_name='{$employee_name}',employee_mobile='{$employee_mobile}',employee_address='{$employee_address}' where employee_id='{$employee_id}'") or die("Error" . mysqli_error($conn));

    if ($uq) 
    {
        //if ($_FILES['employee_photo'] ['type'] == "image/png" || $_FILES['employee_photo'] ['type'] == "image/jpeg") {
          //  $uf = move_uploaded_file($_FILES['employee_photo'] ['tmp_name'], $destination);
       //}
        echo "<script>alert('Data Has Been Updated.');";
        echo "window.location.replace('display-employee.php'); ";
        echo "</script>";
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
                            <h3 class="title1">Employee-Edit Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="employee_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="employee_id" required="" value="<?php echo $empdata['employee_id']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="employee_name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="employee_name" required="" value="<?php echo $empdata['employee_name']; ?>">                                              
                                        </div>
                                    </div>

                                    <!--  <div class="form-group">
                                        <label for="employee_designation" class="col-sm-2 control-label">Designation</label>
                                        <div class="col-sm-8">
                                            <select name="employee_designation">
                                                <option value="1">chef</option>
                                                <option value="2">Manager</option>
                                                <option value="3">Worker</option>
                                                <option value="4">Waiter</option>

                                            </select>
                                        </div>
                                    </div> !-->

                                    <div class="form-group">
                                        <label for="employee_mobile" class="col-sm-2 control-label">Mobile Number</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="employee_mobile" required="" value="<?php echo $empdata['employee_mobile']; ?>">                                 
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="txtarea1" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-8"><textarea name="employee_address" cols="50" required rows="4" class="form-control1"><?php echo $empdata['employee_address']; ?></textarea></div>
                                    </div>

<!--                                    <div class="form-group">
                                        <label for="employee_salary" class="col-sm-2 control-label">Salary</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="employee_salary" required="" value="<?php echo $empdata['employee_salary']; ?>">                            
                                        </div>
                                    
                                   <div class="form-group">
                                        <label for="employee_photo" class="col-sm-2 control-label">Photo</label>
                                        <div class="col-sm-8">
                                            <input type="file" id="exampleInputFile" name="employee_photo" value="<?php echo $empdata['employee_photo']; ?>">                    
                                        </div>
                                    </div>

                                   
                                    <div class="form-group">
                                        <label for="employee_designation" class="col-sm-2 control-label">Signature</label>
                                        <div class="col-sm-8">
                                            <input type="file" id="exampleInputFile">
                                            <input type="text" class="form-control1" id="employee_designation" placeholder="Enter Employee Designation">
                                        </div>
                                    </div>
                                    !-->   
                                    <!-- <div class="form-group">
                                        
                                            <input type="submit"  name="submit">
                                        </div>
                                    </div> !-->
                                    <div>
                                        <center>
                                            <button type="submit" name="btnsubmit" class="btn btn-default">Update</button>
                                            <button type="button" name="btncancel" onclick="window.location = 'display-employee.php';" class="btn btn-default">Cancel</button>
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
        $q = mysqli_query($conn, 'select * from tbl_employee')or die(mysqli_error($conn));
        echo "<select>";
        while ($row = mysql_fetch_array($q)) {
            echo "<option value={$row['employee_id']}>{$row['employee_designation']}</option>";
        }
        echo "</select>";
        ?>
    </body>
</html>


