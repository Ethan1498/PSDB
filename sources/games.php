<section class="main-body-content margin-top-150">
    <div class="row margin-top-50">
        <?php 
            $conn=mysqli_connect($host,$user,$password,$database);
            $sql = "SELECT * FROM games LIMIT $offset, $no_of_records_per_page";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                if(mysqli_num_rows($result) > 0){                    
                    echo "<div class="."col-6".">";
                        echo "<div class="."game-card".">";
                            echo "<img class="."game-image"." src=".$row["image"].">";
                            echo "<div class="."row".">";
                                echo "<div class="."col-12".">";
                                    echo "<h3 class="."game-titles".">"."<a class="."title-link"." href="."/ps4"."?id=".$row["id"].">".$row["title"]."</a>"."</h3>";
                                    echo "<h3 class="."game-attr".">Bundle</h3>";
                                    echo "<h3 class="."game-cons".">PS4</h3>";
                                    echo "<h2 class="."game-price".">"."£".$row["price"]."</h2>";
                                    echo "<span class="."favBtn"."></span> ";
                                echo "</div>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";                    
                }
            }
            mysqli_close($conn);
        ?>
    </div>
</section>