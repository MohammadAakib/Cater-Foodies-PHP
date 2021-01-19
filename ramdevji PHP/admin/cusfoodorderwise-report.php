<?php
//$conn=new mysqli("localhost","root","","dental_planet");
require 'class/myclass.php';
?>
<html>
    <body>
        <center> <h3>Ramdevji Catres</h3> </center>
        <hr/>
        <center><h4> Customer wise Food Order Report</h4></center>

        <form method="get">
            <select name="id" required="">
                <option>-Select Customer-</option>
                <?php
                    $user_query = mysqli_query($conn,"select *from tbl_customer");
                    while($row_user = mysqli_fetch_array($user_query))
                    {
                ?>
                        <option value="<?php echo $row_user["customer_id"];?>"><?php echo $row_user["customer_name"];?></option>
               <?php } ?>
            </select>
            <input type="submit" value="Search">
        </form>
        <a href ="#" onclick="window.print();"> Print </a>
       <?php
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            echo "<table border='1' align='Center'>";
                echo "<tr>";
                    echo "<th> Id </th>";
                    echo "<th> Customer Name </th>";
                    echo "<th> Order Date </th>";
                    echo "<th> Status </th>";
                    echo "<th> Total Amount </th>";
                    echo "<th> No of Person </th>";
                    echo "<th> Grand Total </th>";
                    echo "<th> Payment Method </th>";
                echo "</tr>";
   
                $query=mysqli_query($conn,"SELECT * FROM `tbl_order_master` where `customer_id`='{$id}'")or die (mysqli_error($conn)); 
                while($row= mysqli_fetch_array($query))
                {  
                    $q = mysqli_query($conn, "select * from tbl_customer  where customer_id='{$row['customer_id']}'")or die (mysqli_error($conn));
                    $r= mysqli_fetch_array($q);
                    echo "<tr>";
                        echo "<td> {$row['order_id']} </td>";
                        echo "<td> {$r['customer_name']} </td>";
                        echo "<td> {$row['order_date']} </td>"; 
                        echo "<td> {$row['status']} </td>";
                        echo "<td> {$row['total_amount']} </td>";
                        echo "<td> {$row['no_of_person']} </td>";
                        echo "<td> {$row['grand_total']} </td>";
                        echo "<td> {$row['payment_method']} </td>";
                    echo "</tr>";       
                }
            echo "</table>";
        }
       ?>
    </body>
</html>




