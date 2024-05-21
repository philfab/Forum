<section class="sectionContent sectionTop sectionHome">
    <h2>Welcome to the Forum</h2>
    <?php
    if (!App\Session::getUser()) {
    ?>
        <div class="container-row container-category">
            <a href="index.php?ctrl=security&action=login">Login</a>
            <a href="index.php?ctrl=security&action=register">Register</a>
        </div>
    <?php
    }
    ?>
</section>