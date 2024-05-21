<?php
$categories = $result["data"]['categories'];
?>

<section class="sectionContent sectionTop">
    <h2>Categories</h2>
    <div class="container-row container-category">
        <?php
        foreach ($categories as $category) { ?>
            <div class="category-tile" onclick="window.location.href='index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>'">
                <span><?= $category->getDescription() ?></span>
            </div>
        <?php }
        ?>
    </div>
</section>