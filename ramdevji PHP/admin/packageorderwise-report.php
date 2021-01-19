<?php
//$conn=new mysqli("localhost","root","","dental_planet");
require 'class/myclass.php';
?>
<html>
    <body>
    <center> <h3>Ramdevji Catres</h3> </center>
    <hr/>
    <center><h4> Package wise Order Report</h4></center>
<?php
   


?>
    <form method="get">
        <?php
        
        
        ?>
        <select name="id" required="">
            <option>-Select Package-</option>
            <?php
            $user_query = mysqli_query($conn,"select *from tbl_package");
            while($row_user = mysqli_fetch_array($user_query))
            {
            ?>
            <option value="<?php echo $row_user["package_id"];?>"><?php echo $row_user["package_name"];?></option>
            <?php }?>
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
            echo "<th> Package Name </th>";
            echo "<th> Customer Name </th>";
            echo "<th> Payment Method </th>";
            echo "<th> Status </th>";
            echo "<th> No of Person </th>";
            echo "<th> Package Amount </th>";
            echo "<th> Grand Total </th>";
            echo "<th> Booking Date </th>";
        
        echo "</tr>";
   
       $query=mysqli_query($conn,"SELECT * FROM `tbl_package_booking` where `package_id`='{$id}'")or die (mysqli_error($conn)); 
    while($row= mysqli_fetch_array($query))
    {  
    $q = mysqli_query($conn, "select * from tbl_customer  where customer_id='{$row['customer_id']}'")or die (mysqli_error($conn));
    $r= mysqli_fetch_array($q);
//    
       $q1 = mysqli_query($conn,"SELECT * FROM  `tbl_package`  WHERE `package_id`='{$row['package_id']}'");
   $r1= mysqli_fetch_array($q1);
    echo "<tr>";
    echo "<td> {$row['package_booking_id']} </td>";
      echo "<td> {$r1['package_name']} </td>";
    echo "<td> {$r['customer_name']} </td>";
         echo "<td> {$row['payment_method']} </td>";
    echo "<td> {$row['status']} </td>"; 
  
  
    echo "<td> {$row['no_of_person']} </td>";
    
      echo "<td> {$row['package_amount']} </td>";
    
      echo "<td> {$row['grand_total']} </td>";
      
      ?>
    <td>
    <?php echo date("d-m-Y",strtotime($row['booking_date']));
    
    ?>
    </td>
    <?php
      
       


    echo "</tr>";       
    }
    }
   ?>
    </table>

 
</body>
</html>




