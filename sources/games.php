<section class="main-body-content margin-top-150">
    <div class="row margin-top-50">

        <?php 
            $conn=mysqli_connect($host,$user,$password,$database);
            $sql = "SELECT * FROM games LIMIT $offset, $no_of_records_per_page";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                        echo "<div class="."col-6".">";
                            echo "<div class="."game-card".">";
                                echo "<img class="."game-image"." src="."/assets/images/ratchet.jpeg".">";
                                echo "<div class="."row".">";
                                    echo "<div class="."col-12".">";
                                        echo "<h3 class="."game-titles".">".$row["title"]."</h3>";
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
            }
            mysqli_close($conn);
        ?>
        
        <div class="row">
            <div class="col-6">
                <div class="game-card">
                    <img class="game-image" src="/assets/images/ratchet.jpeg">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="game-titles">Ratchet and Clank™: Tools of Destruction</h3>
                            <h3 class="game-attr">Bundle</h3>
                            <h3 class="game-cons">PS4</h3>
                            <h2 class="game-price">£54.99</h2>
                            <span class="favBtn"></span> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="game-card">
                    <img class="game-image" src="/assets/images/last.jpeg">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="game-titles">The Last of Us™ Remastered</h3>
                            <h3 class="game-attr">Bundle</h3>
                            <h3 class="game-cons">PS4</h3>
                            <h2 class="game-price">£54.99</h2>
                            <span class="favBtn"></span>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>