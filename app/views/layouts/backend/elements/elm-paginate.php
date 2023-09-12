
<?php
    $paged = isset($_GET['paged']) ? $_GET['paged'] : 1;
    
?>
<div class="tablenav-pages">
    <span class="displaying-num"><?= $totalPages;?> items</span>
    <span class="pagination-links">
        <a class="prev-page button" href="<?= MCAppHelpper::getCurrentUrl();?>&paged=<?= $paged - 1;?>">
            <span aria-hidden="true">‹</span>
        </a>
        <span class="screen-reader-text">Current page</span>
        <span id="table-paging" class="paging-input">
            <span class="tablenav-paging-text"><?= $paged;?> / 
                <span class="total-pages"><?= $totalPages;?></span>
            </span>
        </span>
        <a class="next-page button" href="<?= MCAppHelpper::getCurrentUrl();?>&paged=<?= $paged + 1;?>">
            <span aria-hidden="true">›</span>
        </a>
    </span>
    
</div>