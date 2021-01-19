<?php
    include 'class/myclass.php';
    $cus_id = mysqli_real_escape_string($conn, $_POST['cus_id']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $utensil_price = mysqli_real_escape_string($conn, $_POST['utensil_price']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
    $utensil_id = mysqli_real_escape_string($conn, $_POST['utensil_id']);
    $currentdate = date('Y-m-d');
    $grand_total = $qty *$utensil_price;

    $queryordermasterinsert  =mysqli_query($conn,"INSERT INTO `tbl_utensil_booking_master`(`booking_date`, `customer_id`, `status`, `utensil_id`, `price`, `payment_method`, `qty`, `total`, `time`) VALUES ('{$booking_date}','{$cus_id}','Pending','{$utensil_id}','{$utensil_price}','{$payment_method}','{$qty}','{$grand_total}','{$time}')  ")or die(mysqli_error($conn));
    if($queryordermasterinsert)
    {
        $user_name1 = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_mobile1 = mysqli_real_escape_string($conn, $_POST['user_mobile']);
        $user_address1 = mysqli_real_escape_string($conn, $_POST['user_address']);
        $queryupdate = mysqli_query($conn,"UPDATE `tbl_customer` SET `customer_name`='{$user_name1}',`customer_mobile`='{$user_mobile1}',`customer_address`='{$user_address1}' WHERE `customer_id`='{$cus_id}'")or die(mysqli_error($conn));
        echo "<script>window.location='home.php';alert('Thanks For Shopping With us!');</script>";
    }
    else
    {
        echo "<script>window.location='home.php';alert('Not Order Product');</script>";
    }
?>
