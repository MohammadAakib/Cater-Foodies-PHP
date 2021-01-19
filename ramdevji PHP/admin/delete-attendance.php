<?php
                            require 'class\myclass.php';
                            if (isset($_GET['deleteid'])) 
                            {
                                $delete = $_GET['deleteid'];
                                mysqli_query($conn, "delete from tbl_attendance where attendance_id='{$delete}'") or die(mysqli_error($conn));
                                header("location:display-attendance.php");
                            }
?>