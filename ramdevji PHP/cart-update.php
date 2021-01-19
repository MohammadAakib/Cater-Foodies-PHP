<?php
    include 'class/myclass.php';
    if (isset($_POST['id']))
    {
        $id = $_POST['id'];
        $pid = $_POST['pid'];
        $qty = $_POST['quantity'];
        $_SESSION['productcart'][$id] = $pid;
        $_SESSION['qtycart'][$id] = $qty;

         header("location:cart.php");
    }
?>