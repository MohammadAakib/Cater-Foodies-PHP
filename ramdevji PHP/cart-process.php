<?php
    include 'class/myclass.php';
    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    if(isset($_SESSION['productcart']))
    {   
        $currentNo = $_SESSION['counter']+1;
        $_SESSION['productcart'][$currentNo] = $pid;
        $_SESSION['qtycart'][$currentNo] = $qty;
        $_SESSION['counter'] = $currentNo;
    }
    else 
    {
        $productcart = array();
        $qtycart = array();
        $_SESSION['productcart'][0] = $pid;
        $_SESSION['qtycart'][0] = $qty;
        $_SESSION['counter'] = 0;
    }

    echo "<script>alert('Your Product Added Cart');window.location='cart.php';</script>";

?>