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
                            <h3 class="title1">Food-Detail Form :</h3>
                            <div class="form-three widget-shadow">
                                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                        <label for="category_id" class="col-sm-2 control-label">Category Id</label>
                                        <?php
                                                require 'class\myclass.php';
                                                $sq= mysqli_query($conn,"select * from tbl_category") or die(mysqli_error($conn));
                                                echo "<select name='category_id'>";
                                                while ($row1 = mysqli_fetch_array($sq)) {
                                                    echo "<option value='{$row1['category_id']}'>{$row1['category_name']}</option>";
                                                }                            
                                                echo "</select>";
                                            ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="food_detail" class="col-sm-2 control-label">Food name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control1" name="food_name" required="" placeholder="Enter Food Detail">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="food_image" class="col-sm-2 control-label">Image</label>
                                        <div class="col-sm-8">
                                            <input type="file" id="exampleInputFile" name="food_image">                    
                                        </div>
                                    </div> 

                                    <div class="form-group">
                                        <label for="food_price" class="col-sm-2 control-label">Food Price</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control1" name="food_price" required="" placeholder="Enter food price">
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

                            if (isset($_POST['submit'])) {
                                $category_id=$_POST['category_id'];
                                $food_name= $_POST['food_name'];
                                $source= $_FILES['food_image'] ['tmp_name'];
                                $destination="upload/".$_FILES['food_image'] ['name'];
                                $food_price= $_POST['food_price'];
                                
                                $q = mysqli_query($conn, "insert into tbl_food(category_id,food_name,food_image,food_price) values('{$category_id}','{$food_name}','{$destination}','{$food_price}')") or die(mysqli_error($conn));                                            
                                if($q)
                                {
                                     if($_FILES['food_image']['type']=="image/png"  || $_FILES['food_image']['type']=="image/jpeg")
                                     {
                                        move_uploaded_file($source,$destination);  
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
    </body>
</html>