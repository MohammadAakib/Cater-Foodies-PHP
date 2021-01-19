<?php

require 'class\myclass.php';
if (isset($_GET['deleteid'])) {
    $delete = $_GET['deleteid'];
    mysqli_query($conn, "delete from tbl_salary where salary_id='{$delete}'") or die(mysqli_error($conn));
    header("location:display-salary.php");
}
?> 