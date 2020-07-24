
<?php include "scripts/pagination.php";?>
<?php include "sources/head.php"; ?>
<!-- <link rel='stylesheet' href="/assets/homepage/background.css"> -->
<?php include "sources/nav.php";?>
<?php include "sources/games.php";?>
<div class="row">
    <div class="col-12 text-center">
        <ul class="pagination">
            <!-- hidden class to be updated once a db is created -->
            <li class="pagenum <?php if($pageno <= 1 ){ echo 'hidden'; }?>"><a class="page" href="?pageno=1">First</a></li>
            <li class="pagenum <?php if($pageno <= 1 ){ echo "hidden"; }?>"><a class="page" href="<?php  echo "?pageno=".($pageno - 1); ?>"><?php echo $pageno-1?></a></li>
            <li class="pagenum disabled"><a class="page" href="#"><?php echo $pageno ?></a></li>
            <li class="pagenum <?php if($pageno >= $total_pages ){ echo 'hidden'; }?>"><a class="page" href="<?php echo "?pageno=".($pageno + 1); ?>"><?php echo $pageno+1 ?></a></li>
            <li class="pagenum <?php if($pageno >= $total_pages ){ echo 'hidden'; }?>"><a class="page" href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
    </div>
</div>
<?php include "sources/footer.php";?>