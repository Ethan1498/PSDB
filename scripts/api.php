<?php         
header("Content-Type:application.json");
if (isset($_GET["l"]) && !empty($_GET["l"])) { 
    include "connect.php";
    $limit = $_GET["l"];
    $_limit = mysqli_real_escape_string($conn, $limit); 
    $page = $_GET["p"];
    $_page = mysqli_real_escape_string($conn, $page);
    $console = $_GET["c"];
    $_console = mysqli_real_escape_string($conn, $console);

    $offset = $_limit * ($_page-1);
    

    $tables = array(games, ps1games, ps2games, ps3games, ps4games);
    $table = $tables[$_console];             
               
    $sql = "SELECT * FROM $table LIMIT $offset, $_limit";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
        $res_arr=array();
        $res_arr["Results"]=array();
        
        while($row = mysqli_fetch_array($result)){
            $id = $row["id"];
            $image = $row["image"];
            $title = $row["title"];
            $price = $row["price"];
            $oldPrice = $row["oldPrice"];
            $console = $row["console"];

            $res_item = array(
                "id"=>$id, 
                "image"=>$image, 
                "title"=>$title, 
                "price"=>$price, 
                "oldPrice"=>$oldPrice, 
                "console"=>$console
            );
            array_push($res_arr["Results"], $res_item); 
        }
        echo json_encode($res_arr);
                        
    } else {
        response("No Record Found", NULL, NULL, NULL, NULL, NULL);            
    }
} else {
    response("Invalid Request", NULL, NULL, NULL, NULL, NULL);
}

     
?>
