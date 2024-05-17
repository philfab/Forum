<?php
$topics = $result["data"]['topics'];
$category = isset($result["data"]['category']) ? $result["data"]['category'] : null;
?>
<section class="sectionContent">
    <h2>Topics <?= $category ? $category->getDescription() : "List" ?></h2>
    <?php
    if (App\Session::getUser() && $category != null) { ?>
        <form action="index.php?ctrl=forum&action=addTopic" method="post">
            <input type="hidden" name="category_id" value="<?= $category ? $category->getId() : '' ?>">
            <div>
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div>
                <label for="text">First Post:</label>
                <textarea id="text" name="text" required></textarea>
            </div>
            <div>
                <button type="submit">Add Topic</button>
            </div>
        </form>

    <?php } ?>
    <?php foreach ($topics as $topic) { ?>
        <p>
            <a href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
                <?= $topic ?>
            </a> by <?= $topic->getUser() ?>
            (Created date: <?= $topic->getCreationDate() ?>)
            <?php if (App\Session::isAdmin()) { ?>
                <a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>">
                    <?= $topic->getIsLocked() ? 'Unlock' : 'Lock' ?>
                </a>
            <?php } ?>
        </p>
    <?php } ?>
</section>