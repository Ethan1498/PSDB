<?php
include "scripts/connect.php"; 
$no_of_records_per_page = 2;
$sql = "SELECT COUNT(*) FROM games";  
$result = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($result);  
$total_records = $row[0];  
$total_pages = ceil($total_records / $no_of_records_per_page); 
?>

<div class="row">               
    <ul class="pagination">
        <li class="pagenum" id="1"><a href="javascript:void(0);" id="first" class="page">First</a></li>
        <?php 
        if(!empty($total_pages)){
            for($i=1; $i<=$total_pages; $i++){
                if($i == 1){
                    echo "<li class="."pagenum active"." id=".$i."><a href="."JavaScript:Void(0); data-id=".$i." class="."page".">".$i."</a></li>";                 
                }else{                        
                    echo "<li class="."pagenum"." id=".$i."><a href="."JavaScript:Void(0);"." class="."page"." data-id=".$i.">".$i."</a></li>";                 
                }
            }
        }
        mysqli_close($conn);
        ?>
        <li class="pagenum" id="<?php echo $total_pages?>"><a id="last" href="javascript:void(0);" class="page">Last</a></li>
    </ul>
</div>
