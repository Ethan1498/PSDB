<?php include "scripts/connect.php";?>
<?php include "sources/head.php"; ?>
<?php include "sources/nav.php";?>

<?php 
    $id = $_GET["id"];
    $url = "http://local.psdb.co.uk/api/".$id;

    $client = curl_init($url);
    curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec($client);

    $result = json_decode($response, true);

    echo $result["title"];
    echo "<br>";
    echo "£".$result["price"]." "; 
?>



<?php include "sources/footer.php";?>