<?php
include 'class/myclass.php';
if (isset($_GET['deleteid'])) {
    $delete = $_GET['deleteid'];
    mysqli_query($conn, "delete from  tbl_booking_details where booking_details_id='{$delete}'") or die(mysqli_error($conn));
    header("location:display-booking-details.php");
}
?>