<?php include "scripts/pagination.php";?>
<?php include "sources/head.php"; ?>
<?php include "sources/nav.php";?>

<?php 
    $id = $_GET["id"];
    $conn = mysqli_connect($host,$user,$password,$database);
    $sql = "SELECT * FROM games WHERE id = $id";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
        echo $row["title"]; 
        echo "<br>";
        echo "£".$row["price"]." ";   
    }
?>



<?php include "sources/footer.php";?>