<?php
include "connect.php";
$no_of_records_per_page = 4;    
$tables = array(games, ps1games, ps2games, ps3games, ps4games);
$tab = 0;
$table = $tables[$tab];
$sql = "SELECT COUNT(*) FROM $table";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $no_of_records_per_page); 
?>