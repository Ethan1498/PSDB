<?php
    include "connect.php";
    $no_of_records_per_page = 2;

    $sql = "SELECT COUNT(*) FROM games";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_row($result);  
    $total_records = $row[0];  
    $total_pages = ceil($total_records / $no_of_records_per_page); 

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $offset = ($page-1) * $no_of_records_per_page;
    
    $sql = "SELECT * FROM games LIMIT $offset, $no_of_records_per_page";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)){                                  
        echo "<div class="."col-3".">";
            echo "<div class="."game-card".">";
                echo "<img class="."game-image"." src=".$row["image"].">";
                echo "<div class="."row".">";
                    echo "<div class="."col-12".">";
                        echo "<h3 class="."game-titles".">"."<a class="."title-link"." href="."/ps4"."/".$row["id"].">".$row["title"]."</a>"."</h3>";
                        echo "<h3 class="."game-attr".">Bundle</h3>";
                        echo "<h3 class="."game-cons".">PS4</h3>";
                        echo "<h2 class="."game-price".">"."£".$row["price"]."</h2>";
                        echo "<span class="."favBtn"."></span> ";
                    echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";                    
    }
mysqli_close($conn);
?>