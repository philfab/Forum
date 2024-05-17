<?php
$categories = $result["data"]['categories'];
?>

<section class="sectionContent">
    <h2>Category List</h2>
    <?php
    foreach ($categories as $category) { ?>
        <p>
            <a href="index.php?ctrl=forum&action=listTopicsByCategory&id=<?= $category->getId() ?>"><?= $category->getDescription() ?></a>
        </p>
    <?php }
    ?>
</section>