<?php
include "../../scripts/connect.php";
$limit = 4;    
$tables = array(games, ps1games, ps2games, ps3games, ps4games);
$console = 2;
$table = $tables[$console];
$sql = "SELECT COUNT(*) FROM $table";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit); 
?>