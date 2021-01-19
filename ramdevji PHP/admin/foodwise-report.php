<?php
//$conn=new mysqli("localhost","root","","dental_planet");
require 'class/myclass.php';
?>
<html>
    <body>
        <center> <h3>Ramdevji Catres</h3> </center>
        <hr/>
        <center><h4> Category wise Food Report</h4></center>
        
        <form method="get">
            <select name="id" required="">
                <option>-Select Category-</option>
                   <?php
                        $user_query = mysqli_query($conn,"select *from tbl_category");
                        while($row_user = mysqli_fetch_array($user_query))
                        {
                   ?>
                            <option value="<?php echo $row_user["category_id"];?>"><?php echo $row_user["category_name"];?></option>
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
                echo "<th> Category Name </th>";
                echo "<th> Food </th>";
                echo "<th> Price </th>";
            echo "</tr>";
            $query=mysqli_query($conn,"SELECT * FROM `tbl_food` where `food_id`='{$id}'")or die (mysqli_error($conn)); 
            while($row= mysqli_fetch_array($query))
            {  
                $q = mysqli_query($conn, "select * from tbl_category  where category_id='{$row['category_id']}'")or die (mysqli_error($conn));
                $r= mysqli_fetch_array($q);
                echo "<tr>";
                    echo "<td> {$row['food_id']} </td>";
                    echo "<td> {$r['category_name']} </td>";
                    echo "<td> {$row['food_name']} </td>"; 
                    echo "<td> {$row['food_price']} </td>";
                echo "</tr>";       
            }
        echo "</table>";
    }
   ?>
    </body>
</html>




