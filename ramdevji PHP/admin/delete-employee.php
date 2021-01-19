<script>
    function ConformDelete()
    {
        var x = Conform("Are You sure you want to delete ? ");
        if(x)
        {
            return true;
        }
        else{
            return false;
        }
    }
</script>

<?php
require 'class\myclass.php';
    if (isset($_GET['deleteid']))
    {
        $delete = $_GET['deleteid'];
        mysqli_query($conn, "delete from tbl_employee where employee_id='{$delete}'") or die(mysqli_error($conn));
        header("location:display-employee.php");
    }
?>