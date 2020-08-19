<?php
include "homepage-settings.php"; 
?>

<div class="row">               
    <ul class="pagination" id="pagination">
        <li class="pagef" id="0"><a href="javascript:void(0);" id="first" class="page-first">First</a></li>
        <?php 
        if(!empty($total_pages)){
            for($i=1; $i<=$total_pages; $i++){
                if($i == 1) {
                    echo '<li class="pagenum" id='.$i.'><a href="JavaScript:Void(0);" data-id='.$i.' class="page">'.$i.'</a></li>';                 
                }else if ($i == 2){
                    echo '<li class="pagenum" id='.$i.'><a href="JavaScript:Void(0);" data-id='.$i.' class="page">'.$i.'</a></li>'; 
                }else if ($i == 3){                        
                    echo '<li class="pagenum" id='.$i.'><a href="JavaScript:Void(0);" data-id='.$i.' class="page">'.$i.'</a></li>';                  
                }else {
                    echo '<li class="pagenum hidden" id='.$i.'><a href="JavaScript:Void(0);" data-id='.$i.' class="page">'.$i.'</a></li>';
                }
            }
        }
        mysqli_close($conn);
        ?>
        <li class="pagel" id="<?php echo $total_pages + 1?>"><a id="last" href="javascript:void(0);" class="page-last">Last</a></li>
    </ul>
</div>