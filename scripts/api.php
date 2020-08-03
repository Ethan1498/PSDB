<?php 
    header("Content-Type:application.json");
    if (isset($_GET["id"]) && $_GET["id"]!="") {
        include "connect.php"; 
        $id = $_GET["id"];
        $sql = "SELECT * FROM games WHERE id=$id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)>0){
            $row = mysqli_fetch_array($result);
            $id = $row["id"];
            $image = $row["image"];
            $title = $row["title"];
            $price = $row["price"];
            response($id,$image,$title,$price);
            mysqli_close($conn);
        } else {
            response("No Record Found", NULL, NULL, NULL);
            mysqli_close($conn);
        }
    }else{
        response("Invalid Request", NULL, NULL, NULL);
    }

    function response($id,$image,$title,$price){
        $response["id"] = $id;
        $response["image"] = $image;
        $response["title"] = $title;
        $response["price"] = $price;
        

        $json_response = json_encode($response);
        echo $json_response;
    }
?>