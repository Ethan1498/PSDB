<?php
include "scripts/connect.php";
include "sources/head.php";
include "sources/nav.php";

$starttime = microtime(true);
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $url = "http://local.psdb.co.uk/api/".$id;

    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);
    $result = json_decode($response, true);

    echo('<img class="game-image" src="'.$result["image"].'"></img><br>'.$result["title"]."<br>£".$result["price"]);
}else{
    echo 'No results found';
}
$endtime = microtime(true);
$duration = $endtime - $starttime;

if ($duration > 0.01) {
    echo ('<script type="text/javascript"> alert("Loading...")</script>');
}

include "sources/footer.php";
?>
