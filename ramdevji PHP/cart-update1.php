<?php
    include 'class/myclass.php';

    if (isset($_POST['id']))
    {
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        $qty = $_POST['quantity'];
        $_SESSION['productcart1'][$id] = $pid;
        $_SESSION['qtycart1'][$id] = $qty;

         header("location:cart-utensil.php");
    }
?>