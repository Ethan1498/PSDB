<?php 
//Open PHP once if using throughout the page, no need to open/close repeatedly
include "scripts/connect.php";
include "sources/head.php";
include "sources/nav.php";


if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $url = "http://local.psdb.co.uk/api/".$id;

    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);
    $result = json_decode($response, true);

    //echo once, rather than three times, marginally faster, content can be concatinated together using .
    echo('<img class="game-image" src="'.$result["image"].'"></img><br>'.$result["title"]."<br>£".$result["price"]." ");
}else{
    echo 'No results found';
}


include "sources/footer.php";
?>
