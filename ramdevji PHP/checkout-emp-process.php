<?php
include 'class/myclass.php';

$cus_id = mysqli_real_escape_string($conn, $_POST['cus_id']);
$booking_date = mysqli_real_escape_string($conn, $_POST['booking_date']);
$payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
$total = mysqli_real_escape_string($conn, $_POST['total']);
$currentdate = date('Y-m-d');
 
$queryordermasterinsert  =mysqli_query($conn,"INSERT INTO `tbl_employee_booking`(`status`, `payment_method`, `booking_date`, `total`, `customer_id`) values ('Pending','{$payment_method}','{$booking_date}','{$total}','{$cus_id}')")or die(mysqli_error($conn));

if($queryordermasterinsert)
{
    $order_id = mysqli_insert_id($conn);
    $user_name1 = mysqli_real_escape_string($conn, $_POST['user_name']);
    $user_mobile1 = mysqli_real_escape_string($conn, $_POST['user_mobile']);
    $user_address1 = mysqli_real_escape_string($conn, $_POST['user_address']);
    
    $queryupdate = mysqli_query($conn,"UPDATE `tbl_customer` SET `customer_name`='{$user_name1}',`customer_mobile`='{$user_mobile1}',`customer_address`='{$user_address1}' WHERE `customer_id`='{$cus_id}'")or die(mysqli_error($conn));
    foreach ($_SESSION['productcart2'] as $key => $value)
    {      
        $queryproduct = mysqli_query($conn,"SELECT * FROM `tbl_emp_designation` where emp_designation_id='{$value}'")or die(mysqli_error($conn));
        $product_details=  mysqli_fetch_array($queryproduct);
        $product_id =  $product_details["emp_designation_id"];
        $product_name = $product_details["emp_designation_name"];
        $product_price = $product_details["price"];
        $qty = $_SESSION['qtycart2'][$key];
        $subtotaltemp = $product_price * $qty;
        
        $queryorderdetails = mysqli_query($conn,"INSERT INTO `tbl_emp_booking_detail`(`employee_booking_id`, `emp_designation_id`, `price`, `qty`, `subtotal`) VALUES ('{$order_id}','{$product_id}','{$product_price}','{$qty}','{$subtotaltemp}')")or die(mysqli_error($conn));
    
        
    }
 
   unset($_SESSION['productcart2']);
   unset($_SESSION['counter2']);
   unset($_SESSION['qtycart2']);
   
   echo "<script>window.location='employee-order.php';alert('Thanks For Shopping With us!');</script>";
}
else
{
    echo "<script>window.location='employee-order.php';alert('Not Order Product');</script>";
}
?>
