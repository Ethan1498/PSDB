<script src="../../assets/homepage/homepage.js"></script>
<?php
//$starttime = microtime(true);
include "settings.php";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$offset = ($page-1) * $no_of_records_per_page;

$sql = "SELECT * FROM $table LIMIT $offset, $no_of_records_per_page";
$res = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($res)){
    $url = "http://local.psdb.co.uk/api/".$tab."/".$row["id"]; 
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);        
    $result = json_decode($response, true);

    if ($result["oldPrice"] > $result["price"]) { 
        echo '<div class="col-3">';
            echo '<div class="game-card">';
                echo '<img class="game-image" src='.$result["image"].'>';
                echo '<div class="row">';
                    echo '<div class="col-12">';
                        echo '<h3 class="game-titles"><a class="title-link" href="/psgame/'.$tab.'/'.$result["id"].'">'.$result["title"].'</a></h3>';
                        echo '<h3 class="game-attr">Game</h3>';
                        echo '<h3 class="game-cons">'.$result["console"].'</h3>';
                        echo '<h2 class="game-price">£<del>'.$result["oldPrice"].'</del>    £'.$result["price"].'</h2>';
                        echo '<span class="favBtn"></span> ';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';  
    }  else {
        echo '<div class="col-3">';
            echo '<div class="game-card">';
                echo '<img class="game-image" src='.$result["image"].'>';
                echo '<div class="row">';
                    echo '<div class="col-12">';
                        echo '<h3 class="game-titles"><a class="title-link" href="/psgame/'.$tab.'/'.$result["id"].'">'.$result["title"].'</a></h3>';
                        echo '<h3 class="game-attr">Game</h3>';
                        echo '<h3 class="game-cons">'.$result["console"].'</h3>';
                        echo '<h2 class="game-price">£'.$result["price"].'</h2>';
                        echo '<span class="favBtn"></span> ';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>'; 
    }                
}



$endtime = microtime(true);
$duration = $endtime - $starttime;

/*if ($duration > 0.10) {
    echo ('<script type="text/javascript"> alert("Loading...")</script>');
}  */
mysqli_close($conn);
?>