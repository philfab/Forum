<?php
$posts = $result["data"]['posts'];
$topic = $result["data"]['topic'];
$topicId = $topic->getId(); // Define or retrieve the topic ID here
?>
<section class="sectionContent sectionTop">
    <h2>Posts <span class="description"><?= $topic->getTitle() ?></span> </h2>

    <?php
    foreach ($posts as $post) { ?>
        <div class="container-row card">
            <?= $post->getText() ?> by <?= $post->getUser() ?>
            (Created at: <?= $post->getPublishDate() ?>)
        </div>
    <?php }
    ?>

    <?php
    if (App\Session::getUser() && !$topic->getIsLocked()) { ?>
        <div class="register-box post-box">
            <h4>New Post</h4>
            <form action="index.php?ctrl=forum&action=addPost&id=<?= $topicId ?>" method="post">
                <div class="form-group">
                    <label for="text">Post:</label>
                    <textarea id="text" name="text" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Add Post</button>
                </div>
            </form>
        <?php } ?>
        </div>
</section>