<?php
include 'class/myclass.php';
if (isset($_GET['deleteid'])) {
    $delete = $_GET['deleteid'];
    mysqli_query($conn, "delete from   tbl_order_details where order_details_id='{$delete}'") or die(mysqli_error($conn));
    header("location:display-order-details.php");
}
?>