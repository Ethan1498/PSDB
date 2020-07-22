
<//?php include "scripts/pagination.php";?>
<?php include "sources/head.php"; ?>
<?php include "sources/nav.php";?>
<?php include "sources/games.php";?>
<div class="row">
    <div class="col-12 text-center">
        <ul class="pagination">
            <li><a href="?pageno=1">First</a></li>
            <li><a href="#"><?php echo $pageno-1 ?></a></li>
            <li class="disabled"><a href="#"><?php echo $pageno ?></a></li>
            <li><a href="#"><?php echo $pageno+1 ?></a></li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul>
    </div>
</div>
<?php include "sources/footer.php";?>