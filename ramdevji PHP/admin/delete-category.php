<?php

include 'class/myclass.php';
if (isset($_GET['deleteid'])) {
    $delete = $_GET['deleteid'];
    mysqli_query($conn, "delete from tbl_category where category_id='{$delete}'") or die(mysqli_error($conn));
    header("location:display-category.php");
}
?> 