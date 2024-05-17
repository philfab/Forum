<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $meta_description ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= PUBLIC_DIR ?>/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <title>FORUM</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <nav>
                <h1>FORUM</h1>
                <div id="nav-left">
                    <a href="/">Home</a>
                    <a href="index.php?ctrl=security&action=login">Login</a>
                    <a href="index.php?ctrl=security&action=register">Register</a>
                    <a href="index.php?ctrl=forum&action=topics">Topics List</a>
                    <a href="index.php?ctrl=forum&action=index">Category List</a>
                </div>
                <div id="nav-right">
                    <?php
                    // si l'utilisateur est connecté 
                    if (App\Session::getUser()) {
                    ?>
                        <a href="index.php?ctrl=security&action=profile"><span class="fas fa-user"></span>&nbsp;<?= App\Session::getUser() ?></a>
                        <a href="index.php?ctrl=security&action=logout">Logout</a>
                    <?php
                    }
                    ?>
                </div>
            </nav>
        </header>
        <main id="forum">
            <?= $page ?>
        </main>
        <footer>
            <p>&copy; <?= date_create("now")->format("Y") ?> - <a href="#">Forum Rules</a> - <a href="#">Legal Information</a></p>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $(".message").each(function() {
                if ($(this).text().length > 0) {
                    $(this).slideDown(500, function() {
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function() {
                return confirm("Are you sure you want to delete?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })
    </script>
    <script src="<?= PUBLIC_DIR ?>/js/script.js"></script>
</body>

</html>