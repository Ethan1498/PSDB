<?php
$starttime = microtime(true);
include "scripts/connect.php";
include "sources/head.php";
include "sources/nav.php";


if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];
    $console = $_GET["c"];
    $url = 'http://local.psdb.co.uk/scripts/api.php?l=1&c='.$console;

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
echo ('<script type ="text/javascript"> console.log('.$duration.')</script>');
include "sources/footer.php";
?>
