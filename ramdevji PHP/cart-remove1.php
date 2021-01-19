<?php
    include 'class/myclass.php';
    if (isset($_POST['id'])) 
    {
        $id = $_POST['id'];
        unset($_SESSION['productcart1'][$id]);
        unset($_SESSION['qtycart1'][$id]);
    }

    header("location:cart-utensil.php");

?>