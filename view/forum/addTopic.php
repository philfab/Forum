<?php
?>
<section class="sectionContent">
    <form action="index.php?ctrl=forum&action=addTopic" method="post">
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
</section>