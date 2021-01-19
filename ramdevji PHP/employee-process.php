<?php
    include 'class/myclass.php';

    $pid = $_POST['eid'];
    $qty = $_POST['qtye'];

    if(isset($_SESSION['productcart2']))
    {
        $currentNo = $_SESSION['counter2']+1;
        $_SESSION['productcart2'][$currentNo] = $pid;
        $_SESSION['qtycart2'][$currentNo] = $qty;
        $_SESSION['counter2'] = $currentNo;
    }
    else 
    {
        $productcart = array();
        $qtycart = array();

        $_SESSION['productcart2'][0] = $pid;
        $_SESSION['qtycart2'][0] = $qty;
        $_SESSION['counter2'] = 0;
    }

    echo "<script>alert('Your Employee Added Cart');window.location='cart-employee.php';</script>";

?>