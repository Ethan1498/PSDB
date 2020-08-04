<?php 
    //Suggestions: I would include the time the query takes to complete, it'll let you investigate slow queries and see if your code can be improved in sections
    header("Content-Type:application.json");
    if (isset($_GET["id"]) && !empty($_GET["id"])) { //!empty = not empty, rather than checking directly for ""
        include "connect.php"; 
        $id = $_GET["id"];
        
        //TODO: investigate mysql_real_escape_string() on anything being passed to the database
        
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
    } else {
        response("Invalid Request", NULL, NULL, NULL);
    }

    function response($id,$image,$title,$price){
        $response["id"] = $id;
        $response["image"] = $image;
        $response["title"] = $title;
        $response["price"] = $price;
        $json_response = json_encode($response); //you can just echo this directly rather than storing in a variable
        echo $json_response;
    }
?>
