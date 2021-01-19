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
    header('location:display-food.php');
}
$sq = mysqli_query($conn, "select * from tbl_food where food_id='{$editid}'") or die(mysqli_error($conn));
$edata = mysqli_fetch_array($sq);
if (isset($_POST['btnsubmit'])) {
    $food_id = $_POST['food_id'];
    $food_name= $_POST['food_name'];
   // $image = $_POST['food_image'];  food_image='{$image}',
    $food_price = $_POST['food_price'];

    $uq = mysqli_query($conn, "update tbl_food set food_name='{$food_name}',food_price='{$food_price}' where food_id='{$food_id}'") or die("Error" . mysqli_error($conn));

    if ($uq) {
        echo "<script>alert('Data Has Been Updated.');window.location='display-food.php'</script>";
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
                            <h3 class="title1">food Edit Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="food_id" class="col-sm-2 control-label">Id</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="food_id" required="" value="<?php echo $edata['food_id']; ?>">                                              
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="food_name" class="col-sm-2 control-label">Food Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="food_name" required="" value="<?php echo $edata['food_name']; ?>">                                              
                                        </div>
                                    </div>

                                 <!--   <div class="form-group">
                                        <label for="food_image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="food_image" required="" value="<?php echo $edata['image']; ?>">                                                
                                        </div>
                                    </div   !-->
                                 
                                 <div class="form-group">
                                        <label for="food_price" class="col-sm-2 control-label">Food Price</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="food_price" required="" value="<?php echo $edata['food_price']; ?>">                                              
                                        </div>
                                    </div>

                                    <div>
                                        <center>
                                            <button type="submit" name="btnsubmit" class="btn btn-default">Update</button>
                                            <button type="button" name="cancel" class="btn btn-default" value="cancel" onclick="window.location='display-food.php'">Cancel</button>
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



?>