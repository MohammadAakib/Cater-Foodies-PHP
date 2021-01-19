<?php
    include 'class/myclass.php';
    $cus_id = mysqli_real_escape_string($conn, $_POST['cus_id']);
    $no_of_person = mysqli_real_escape_string($conn, $_POST['no_of_person']);
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);
    $currentdate = date('Y-m-d');
    $no_of_person_total = $no_of_person *$total;
    $grand_total = $no_of_person_total;

    $queryordermasterinsert  =mysqli_query($conn,"INSERT INTO `tbl_order_master`( `order_date`, `customer_id`, `status`, `total_amount`, `no_of_person`, `grand_total`, `payment_method`)  VALUES ('{$currentdate}','{$cus_id}','Pending','{$total}','{$no_of_person}','{$grand_total}','{$payment_method}')")or die(mysqli_error($conn));
    if($queryordermasterinsert)
    {
        $order_id = mysqli_insert_id($conn);
        $user_name1 = mysqli_real_escape_string($conn, $_POST['user_name']);
        $user_mobile1 = mysqli_real_escape_string($conn, $_POST['user_mobile']);
        $user_address1 = mysqli_real_escape_string($conn, $_POST['user_address']);
        $queryupdate = mysqli_query($conn,"UPDATE `tbl_customer` SET `customer_name`='{$user_name1}',`customer_mobile`='{$user_mobile1}',`customer_address`='{$user_address1}' WHERE `customer_id`='{$cus_id}'")or die(mysqli_error($conn));
        foreach ($_SESSION['productcart'] as $key => $value)
        {      
            $queryproduct = mysqli_query($conn,"SELECT * FROM `tbl_food` where food_id='{$value}'")or die(mysqli_error($conn));
            $product_details=  mysqli_fetch_array($queryproduct);

            $product_id =  $product_details["food_id"];
            $product_name =  $product_details["food_name"];
            $product_price =  $product_details["food_price"];
            $product_img =  $product_details["food_image"];
            $qty = $_SESSION['qtycart'][$key];
            $subtotaltemp = $product_price * $qty;
            $queryorderdetails = mysqli_query($conn,"INSERT INTO `tbl_order_details`(`order_id`, `food_id`, `price`, `qty`)  VALUES ('{$order_id}','{$product_id}','{$product_price}','{$qty}')")or die(mysqli_error($conn));
        }

        unset($_SESSION['productcart']);
        unset($_SESSION['counter']);
        unset($_SESSION['qtycart']);

        echo "<script>window.location='order.php';alert('Thanks For Shopping With us!');</script>";
    }
    else
    {
        echo "<script>window.location='order.php';alert('Not Order Product');</script>";
    }
?>
