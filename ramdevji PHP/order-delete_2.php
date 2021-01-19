<?php
    include 'class/myclass.php';
    if (isset($_POST['delete'])) 
    {
        $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
        $queryupdate = mysqli_query($conn, "update tbl_utensil_booking_master set status='Cancelled' where booking_id='{$order_id}'") or die(mysqli_error($conn));
        if ($queryupdate) 
        {
            echo "<script>window.location='utensil-order.php';alert('Your Order Successfully Cancelled');</script>";
        }
        else
        {
            echo "<script>window.location='utensil-order.php';alert('Your Order Not Cancelled');</script>";
        }        
    }
?>