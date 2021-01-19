<?php

include 'class/myclass.php';
if (isset($_GET['deleteid'])) {
    $delete = $_GET['deleteid'];
    mysqli_query($conn, "delete from tbl_package_master where package_id='{$delete}'") or die(mysqli_error($conn));
    header("location:display-package-master.php");
}
?>