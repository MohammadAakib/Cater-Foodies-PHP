<?php
    include 'class/myclass.php';
    if (isset($_POST['id'])) 
    {
        $id = $_POST['id'];
        unset($_SESSION['productcart'][$id]);
        unset($_SESSION['qtycart'][$id]);
    }

    header("location:cart.php");

?>