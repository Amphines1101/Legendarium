<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>— Legendarium —</title>
    <script src="https://kit.fontawesome.com/c1d0ab37d6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bestiary.css">
</head>
<body>
<header>
    <nav>
        <a href="/" class="logo"><i class="fas fa-home"></i></a>

            <?php if (isset($_SESSION['user'])): 
                echo $_SESSION['user']['pseudo'];
                ?>
                <a href="/logout">Logout</a>
            <?php else: ?>
                <a href="/login">Login</a>
            <?php endif; ?>
            
    </nav>
</header>

<main>
    <?php echo $content; ?>
</main>

</body>
</html>
<?php
unset($_SESSION['error']);
unset($_SESSION['old']);
