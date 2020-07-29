<?php 
    header("Content-Type:application.json");
    if (isset($_GET["id"]) && $_GET["id"]!="") {
        include "connect.php"; 
        $id = $_GET["id"];
        $sql = "SELECT * FROM games WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            $title = $row["title"];
            $price = $row["price"];
            response($title,$price);
            mysqli_close($conn);
        } else {
            response("No Record Found", NULL);
            mysqli_close($conn);
        }
    }else{
        response("Invalid Request", NULL);
    }

    function response($title,$price){
        $response["title"] = $title;
        $response["price"] = $price;

        $json_response = json_encode($response);
        echo $json_response;
    }
?>