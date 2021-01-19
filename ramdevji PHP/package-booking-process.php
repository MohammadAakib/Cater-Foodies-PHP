<?php
    include 'class/myclass.php';
    $cus_id = mysqli_real_escape_string($conn, $_POST['cus_id']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $package_amount = mysqli_real_escape_string($conn, $_POST['package_amount']);
    $qty = mysqli_real_escape_string($conn, $_POST['qty']);
    $booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
    $package_id = mysqli_real_escape_string($conn, $_POST['package_id']);
    $currentdate = date('Y-m-d');
    $grand_total = $qty *$package_amount;
    
    $queryordermasterinsert  =mysqli_query($conn,"INSERT INTO `tbl_package_booking`( `package_id`, `customer_id`, `payment_method`, `status`, `no_of_person`, `package_amount`, `grand_total`, `booking_date`) VALUES ('{$package_id}','{$cus_id}','{$payment_method}','Pending','{$qty}','{$package_amount}','{$grand_total}','{$booking_date}')")or die(mysqli_error($conn));
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
