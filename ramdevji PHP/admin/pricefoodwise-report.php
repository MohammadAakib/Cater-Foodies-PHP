<?php
//$conn=new mysqli("localhost","root","","dental_planet");
require 'class/myclass.php';
?>
<html>
    <body>
        <center> <h3>Ramdevji Catres</h3> </center>
        <hr/>
        <center><h4> Price wise Food Report</h4></center>
        
        <form method="get">
            <input type="text" placeholder="Enter Start Price" name="sprice" value="" required="">
            <input type="text" placeholder="Enter End Price" name="eprice" value="" required="">
            <input type="submit" value="Search">
        </form>
        <a href ="#" onclick="window.print();"> Print </a>
        <?php
            if(isset($_GET['sprice']))
            {
                $se=$_GET['sprice'];
                $ep=$_GET['eprice'];
                echo "<table border='1' align='Center'>";
                    echo "<tr>";
                        echo "<th> Id </th>";
                        echo "<th> Category Name </th>";
                        echo "<th> Food </th>";
                        echo "<th> Price </th>";
                    echo "</tr>";
   
                    $query=mysqli_query($conn,"SELECT * FROM `tbl_food` where `food_price` between $se and $ep")or die (mysqli_error($conn)); 
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

