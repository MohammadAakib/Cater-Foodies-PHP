<?php
if(isset($_SESSION['customerid']))
{
    
}
else{
    header("location:home.php");
    
}
?>

<?php

 if(isset($_SESSION["customerid"]))
{

   $userid = $_SESSION["customerid"];
     
   
      $select_user_query = mysqli_query($conn, "select * from tbl_customer where customer_id='{$userid}'") or die(mysqli_error($conn));
$user_login_details = mysqli_fetch_array($select_user_query);
   
                    $user_id  =    $user_login_details["customer_id"];
                    $user_name  =    $user_login_details["customer_name"];
                  
                        $user_email  =    $user_login_details["customer_email"];
                          $user_mobile  =    $user_login_details["customer_mobile"];
                          $user_address  =    $user_login_details["customer_address"];
                          $area_id  =    $user_login_details["customer_password"];
                       
                     
                    
                   
                  
     
}
else{
    header("location:home.php");
}
?>


