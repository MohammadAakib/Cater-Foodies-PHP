<?php
    include 'class/myclass.php';

    if (isset($_POST['id'])) 
    {
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        $qty = $_POST['quantity'];
        $_SESSION['productcart2'][$id] = $pid;
        $_SESSION['qtycart2'][$id] = $qty;

       header("location:cart-employee.php");
    }
?>