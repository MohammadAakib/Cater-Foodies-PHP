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
    header('location:display-salary.php');
}
$sq = mysqli_query($conn, "select * from tbl_salary where salary_id='{$editid}'") or die(mysqli_error($conn));
$edata = mysqli_fetch_array($sq);
if (isset($_POST['btnsubmit'])) {
    $salary_id = $_POST['salary_id'];
    $salary_date = $_POST['salary_date'];
    $salary_amount= $_POST['salary_amount'];
    $salary_method= $_POST['salary_method'];
    

    $uq = mysqli_query($conn, "update tbl_salary set salary_date='{$salary_date}',salary_amount='{$salary_amount}',salary_method='{$salary_method}' where salary_id='{$salary_id}'") or die("Error" . mysqli_error($conn));

    if ($uq) {
        echo "<script>alert('Data Has Been Updated.');window.location='display-salary.php'</script>";
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
                            <h3 class="title1">Employee-Edit Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="salary_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="salary_id" required="" value="<?php echo $edata['salary_id']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="salary_date" class="col-sm-2 control-label">Date</label>
                                        <div class="col-sm-8">
                                            <input type="date" class="form-control1" name="salary_date" required="" value="<?php echo $edata['salary_date']; ?>">                                              
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary_amount" class="col-sm-2 control-label">Amount</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="salary_amount" required="" value="<?php echo $edata['salary_amount']; ?>">                                                
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="salary_method" class="col-sm-2 control-label">Salary Method</label>
                                        <div class="col-sm-8">
                                            <select name="salary_method">
                                                <option value="Case">Case</option>
                                                <option value="Cheque">Cheque</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <center>
                                            <button type="submit" name="btnsubmit" class="btn btn-default">Update</button>
                                            <button type="button" name="cancel" class="btn btn-default" onclick="window.location='display-salary.php';">Cancel</button>
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
                $q= mysqli_query($conn,'select * from tbl_salary')or die(mysqli_error($conn));
                echo "<select>";
                while ($row = mysql_fetch_array($q)) {
                    echo "<option value={$row['salary_id']}>{$row['salary_method']}</option>";
                    
                    }                   
                echo "</select>";
        ?>
    </body>
</html>


