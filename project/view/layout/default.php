<html>
    <head>
        <title><?= $title_layout ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>

        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo BASE_URL.DS.'main'.DS.'index' ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL.DS.'product'.DS.'index'?>">Nos Produits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo BASE_URL.DS.'main'.DS.'about' ?>">A propos</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-dark" href="<?= BASE_URL.DS.'user'.DS.'login'?>" role="button">Connexion</a>
            </li>
            
        </ul>
        <?= $layoutContent?>
    </body>
</html>