<script src="../../assets/homepage/homepage.js"></script>
<?php
$starttime = microtime(true);
include "settings.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$url = 'http://local.psdb.co.uk/scripts/api.php?l='.$limit.'&p='.$page.'&c='.$console;  
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);        
$results = json_decode($response, true);
foreach ($results as $result){
    if ($result["oldPrice"] > $result["price"]) { 
        echo '<div class="col-3">
            <div class="game-card">
                <img class="game-image" src='.$result["image"].'>
                <div class="row">
                    <div class="col-12">
                        <h3 class="game-titles"><a class="title-link" href="/psgame/'.$console.'/'.$result["id"].'">'.$result["title"].'</a></h3>
                        <h3 class="game-attr">Game</h3>
                        <h3 class="game-cons">'.$result["console"].'</h3>
                        <h2 class="game-price">£<del>'.$result["oldPrice"].'</del>    £'.$result["price"].'</h2>
                        <span class="favBtn"></span> 
                    </div>
                </div>
            </div>
        </div>';  
    }else{
        echo '<div class="col-3">
            <div class="game-card">
                <img class="game-image" src='.$result["image"].'>
                <div class="row">
                    <div class="col-12">
                        <h3 class="game-titles"><a class="title-link" href="/psgame/'.$console.'/'.$result["id"].'">'.$result["title"].'</a></h3>
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
$endtime = microtime(true);
$duration = $endtime - $starttime;
echo ('<script type ="text/javascript"> console.log('.$duration.')</script>');
mysqli_close($conn);
?>