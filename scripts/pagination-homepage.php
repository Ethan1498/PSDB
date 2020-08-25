<script src="../assets/homepage/homepage.js"></script>
<?php
$starttime = microtime(true);
include "homepage-settings.php";
include "memcached.php";
// Getting offsets/etc should be done in the api based on url content, increment a query string to increase page count.
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page-1) * $no_of_records_per_page;

$data_for_front_page = retieve_from_cache("data_for_front_page");
if(!$data_for_front_page){

    $sql = "SELECT * FROM $table LIMIT $offset, $no_of_records_per_page";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($res)){
        $url = "http://local.psdb.co.uk/api/".$tab."/".$row["id"]; 
        $client = curl_init($url);
        curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
        $response = curl_exec($client);        
        $result = json_decode($response, true);

        if ($result["oldPrice"] > $result["price"]) { 
            echo '<div class="col-3">
                <div class="game-card">
                    <img class="game-image" src='.$result["image"].'>
                    <div class="row">
                        <div class="col-12">
                            <h3 class="game-titles"><a class="title-link" href="/psgame/'.$tab.'/'.$result["id"].'">'.$result["title"].'</a></h3>
                            <h3 class="game-attr">Game</h3>
                            <h3 class="game-cons">'.$result["console"].'</h3>
                            <h2 class="game-price">£<del>'.$result["oldPrice"].'</del>    £'.$result["price"].'</h2>
                            <span class="favBtn"></span> 
                        </div>
                    </div>
                </div>
            </div>';  
        }  else {
            echo '<div class="col-3">
                <div class="game-card">
                    <img class="game-image" src='.$result["image"].'>
                    <div class="row">
                        <div class="col-12">
                            <h3 class="game-titles"><a class="title-link" href="/psgame/'.$tab.'/'.$result["id"].'">'.$result["title"].'</a></h3>
                            <h3 class="game-attr">Game</h3>
                            <h3 class="game-cons">'.$result["console"].'</h3>
                            <h2 class="game-price">£'.$result["price"].'</h2>
                            <span class="favBtn"></span> 
                        </div>
                    </div>
                </div>
            </div>'; 
        }                
    }
} else {
    store_in_cache("data_for_front_page", $data_for_front_page, 600);
}



$endtime = microtime(true);
$duration = $endtime - $starttime;

if ($duration > 0.10) {
    echo ('<script type="text/javascript"> console.log('.$duration.')</script>');
}  
mysqli_close($conn);
?>