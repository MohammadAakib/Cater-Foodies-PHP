<?php
include 'class/myclass.php';
if (isset($_GET['deleteid'])) {
    $delete = $_GET['deleteid'];
    mysqli_query($conn, "delete from  tbl_utensil_booking_master where booking_id='{$delete}'") or die(mysqli_error($conn));
    header("location:display-customer.php");
}
?>