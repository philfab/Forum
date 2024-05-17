<?php
$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];
$topicId = $topic->getId(); // Define or retrieve the topic ID here
?>
<section class="sectionContent">
    <h2>Posts List</h2>

    <?php
    if (App\Session::getUser() && !$topic->getIsLocked()) { ?>
        <form action="index.php?ctrl=forum&action=addPost&id=<?= $topicId ?>" method="post">
            <div>
                <label for="text">Post:</label>
                <textarea id="text" name="text" required></textarea>
            </div>
            <div>
                <button type="submit">Add Post</button>
            </div>
        </form>
    <?php } ?>

    <?php
    foreach ($posts as $post) { ?>
        <p>
            <?= $post->getText() ?> by <?= $post->getUser() ?>
            (Created date: <?= $post->getPublishDate() ?>)
        </p>
    <?php }
    ?>
</section>