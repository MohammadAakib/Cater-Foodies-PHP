<?php
    include 'class/myclass.php';
    $cus_id = mysqli_real_escape_string($conn, $_POST['cus_id']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);
    $currentdate = date('Y-m-d');

    $queryordermasterinsert  =mysqli_query($conn,"INSERT INTO `tbl_utensil_booking_master`(`booking_date`, `customer_id`, `status`, `payment_method`, `total`, `time`) VALUES ('{$booking_date}','{$cus_id}','Pending','{$payment_method}','{$total}','{$time}')")or die(mysqli_error($conn));
    if($queryordermasterinsert)
    {
        $order_id = mysqli_insert_id($conn);
        $user_name1 = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_mobile1 = mysqli_real_escape_string($conn, $_POST['user_mobile']);
        $user_address1 = mysqli_real_escape_string($conn, $_POST['user_address']);

        $queryupdate = mysqli_query($conn,"UPDATE `tbl_customer` SET `customer_name`='{$user_name1}',`customer_mobile`='{$user_mobile1}',`customer_address`='{$user_address1}' WHERE `customer_id`='{$cus_id}'")or die(mysqli_error($conn));
        foreach ($_SESSION['productcart1'] as $key => $value)
        {      
            $queryproduct = mysqli_query($conn,"SELECT * FROM `tbl_utensil` where utensil_id='{$value}'")or die(mysqli_error($conn));
            $product_details=  mysqli_fetch_array($queryproduct);

            $query_ut = mysqli_query($conn,"SELECT * FROM `tbl_utensil_master` where utensil_id='{$value}'")or die(mysqli_error($conn));
            $utrow=  mysqli_fetch_array($query_ut);

            $product_id =  $product_details["utensil_id"];
            $product_name =  $product_details["utensil_name"];  
            $product_price =  $utrow["utensil_price"];
            $qty = $_SESSION['qtycart1'][$key];
            $subtotaltemp = $product_price * $qty;
            $queryorderdetails = mysqli_query($conn,"INSERT INTO `tbl_booking_details`(`booking_id`, `utensil_id`, `price`, `qty`,`subtotal`) VALUES ('{$order_id}','{$product_id}','{$product_price}','{$qty}','{$subtotaltemp}')")or die(mysqli_error($conn));
        }

        unset($_SESSION['productcart1']);
        unset($_SESSION['counter1']);
        unset($_SESSION['qtycart1']);
        echo "<script>window.location='utensil-order.php';alert('Thanks For Shopping With us!');</script>";
    }
    else
    {
        echo "<script>window.location='utensil-order.php';alert('Not Order Product');</script>";
    }
?>
