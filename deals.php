<?php
include "scripts/connect.php";
include "sources/head.php";
include "sources/nav.php";
?>
<section class="main-body-content margin-top-150">
    <div class="row margin-top-50" >
    
<?php
$starttime = microtime(true);
$sql = "SELECT * FROM games WHERE oldPrice > price";
$res = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($res)){    
    $url = "http://local.psdb.co.uk/api/".$row["id"];
    
    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);
    $result = json_decode($response, true);


    echo '<div class="col-3">';
        echo '<div class="game-card">';
            echo '<img class="game-image" src='.$result["image"].'>';
            echo '<div class="row">';
                echo '<div class="col-12">';
                    echo '<h3 class="game-titles"><a class="title-link" href="/ps4/'.$result["id"].'">'.$result["title"].'</a></h3>';
                    echo '<h3 class="game-attr">Bundle</h3>';
                    echo '<h3 class="game-cons">PS4</h3>';
                    echo '<h2 class="game-price">£<del>'.$result["oldPrice"].'</del>    £'.$result["price"].'</h2>';
                    echo '<span class="favBtn"></span> ';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    echo '</div>';                    
}

$endtime = microtime(true);
$duration = $endtime - $starttime;

if ($duration > 0.05) {
    echo ('<script type="text/javascript"> alert("Loading...")</script>');
}

?>

    </div>   
</section>
<?php
include "sources/footer.php";
?>