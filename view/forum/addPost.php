<?php
$topicId = $result["data"]['topicId'];
?>
<section class="sectionContent">
    <form action="index.php?ctrl=forum&action=addPost&id=<?= $topicId ?>" method="post">
        <div>
            <label for="text">Post:</label>
            <textarea id="text" name="text" required></textarea>
        </div>
        <div>
            <button type="submit">Add Post</button>
        </div>
    </form>
</section>