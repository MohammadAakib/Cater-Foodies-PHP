<?php
    include 'class/myclass.php';
    if (isset($_POST['id']))
    {
        $id = $_POST['id'];
        unset($_SESSION['productcart2'][$id]);
        unset($_SESSION['qtycart2'][$id]);
    }


    header("location:cart-employee.php");
?>