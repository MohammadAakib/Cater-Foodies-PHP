<?php
session_start();
$conn= mysqli_connect("localhost","root","","ramdevji_db");
if(!$conn)
{
    echo "Database Is Not Connected";
}