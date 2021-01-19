<?php
    include 'class/myclass.php';
    $pid = $_POST['uid'];
    $qty = $_POST['qtyu'];
    if(isset($_SESSION['productcart1']))
    {
        $currentNo = $_SESSION['counter1']+1;
        $_SESSION['productcart1'][$currentNo] = $pid;
        $_SESSION['qtycart1'][$currentNo] = $qty;
        $_SESSION['counter1'] = $currentNo;
    }
    else 
    {
        $productcart = array();
        $qtycart = array();
        $_SESSION['productcart1'][0] = $pid;
        $_SESSION['qtycart1'][0] = $qty;
        $_SESSION['counter1'] = 0;
    }
    echo "<script>alert('Your Uetnsil Added Cart');window.location='cart-utensil.php';</script>";
?>