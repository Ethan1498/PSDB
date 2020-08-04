<?php 
//Open PHP once if using throughout the page, no need to open/close repeatedly
include "scripts/connect.php";
include "sources/head.php";
include "sources/nav.php";


//TODO: check to see if $_GET["id"] exists and is not empty
//Currently this potentially allows for attacks against your database via SQL injection
$id = $_GET["id"];
$url = "http://local.psdb.co.uk/api/".$id;

$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);
$result = json_decode($response, true);

//echo once, rather than three times, marginally faster, content can be concatinated together using .
echo($result["title"]."<br>£".$result["price"]." ");

include "sources/footer.php";
?>
