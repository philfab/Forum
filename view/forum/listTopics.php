<?php
$topics = $result["data"]['topics'];
$category = isset($result["data"]['category']) ? $result["data"]['category'] : null;
?>
<section class="sectionContent sectionTop">
    <h2>Topics <span class="description"><?= $category ? $category->getDescription() : "" ?></span>
    </h2>


    <?php if (App\Session::getUser() && $category != null) { ?>
        <div class="register-box post-box">
            <h4>New Topic</h4>
            <form action="index.php?ctrl=forum&action=addTopic" method="post">
                <input type="hidden" name="category_id" value="<?= $category ? $category->getId() : '' ?>">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="text">First Post:</label>
                    <textarea id="text" name="text" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Add Topic</button>
                </div>
            </form>
        </div>
    <?php } ?>

    <?php foreach ($topics as $topic) { ?>
        <div class="container-row card">
            <a class="topic-button" href="index.php?ctrl=forum&action=listPostsByTopic&id=<?= $topic->getId() ?>">
                <?= $topic ?>
            </a>
            Created at: <?= $topic->getCreationDate() ?> <span class="description"> <?= $topic->getUser() ?> </span>

            <?php if (App\Session::isAdmin()) { ?>
                <a href="index.php?ctrl=forum&action=lockTopic&id=<?= $topic->getId() ?>&category=<?= $category ? $category->getId() : '' ?>" class="btn <?= $topic->getIsLocked() ? 'btn-red' : 'btn-green' ?>">
                    <?= $topic->getIsLocked() ? 'Inactif' : 'Actif' ?>
                </a>
            <?php } else { ?>
                <span class="btn btnOff <?= $topic->getIsLocked() ? 'btn-red' : 'btn-green' ?>">
                    <?= $topic->getIsLocked() ? 'Inactif' : 'Actif' ?>
                </span>
            <?php } ?>
        </div>
    <?php } ?>

</section>