<?php         
header("Content-Type:application.json");
if (isset($_GET["id"]) && !empty($_GET["id"])) { 
    include "connect.php";
    $id = $_GET["id"];
    $tab = $_GET["tab"];
    $tables = array(games, ps1games, ps2games, ps3games, ps4games);
    $table = $tables[$tab];             
    $_id = mysqli_real_escape_string($conn, $id);            
    $sql = "SELECT * FROM $table WHERE id=$_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $id = $row["id"];
        $image = $row["image"];
        $title = $row["title"];
        $price = $row["price"];
        $oldPrice = $row["oldPrice"];
        $console = $row["console"];
        response($id,$image,$title,$price,$oldPrice,$console);
        
                        
    } else {
        response("No Record Found", NULL, NULL, NULL, NULL);            
    }
} else {
    response("Invalid Request", NULL, NULL, NULL, NULL);
}

function response($id,$image,$title,$price,$oldPrice,$console){
    
    $arr = array("id"=>$id, "image"=>$image, "title"=>$title, "price"=>$price, "oldPrice"=>$oldPrice, "console"=>$console);
    echo json_encode($arr);
}     
?>
