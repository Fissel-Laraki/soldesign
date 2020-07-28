<?php 
    $logged = $this->Session->isLogged();
    $admin = $this->Session->isAdmin();     
?>

<html>
    <head>
        <title><?= $title_layout ?></title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=SOURCE.DS.'css'.DS.'layout'.DS.'default.css'?>">
        <?=$otherCss?>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    </head>
    
    <body>
        <?php if ($logged) :
            echo 'Bonjour monsieur '.$this->Session->get('User')->name;
        endif;
        ?>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
                
                <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapse_target">

                    <a class="navbar-brand" href="<?=BASE_URL.DS.'main'.DS?>">SOL DESIGN</a>
                    <li class="divider"></li>
                    <li class="divider"></li>
                    <li class="divider"></li>
                    <ul class="navbar-nav" id="navbar">
                        <?php if(!$admin) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL.DS.'main'.DS.'index' ?>">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL.DS.'product'.DS.'index'?>">Nos Produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL.DS.'main'.DS.'about' ?>">A Propos</a>
                            </li>
                        <?php endif;?>
                        <?php if($logged) : ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Paramètres
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mes commandes</a>
                                    <a class="dropdown-item" href="<?php echo BASE_URL.DS.'user'.DS.'account' ?>">Mon compte</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= BASE_URL.DS.'user'.DS.'logout'?>">Deconnexion</a>
                                </div>
                            </li>
                        <?php endif;?>
                            
                            
                        <?php if (!$logged) :?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE_URL.DS.'user'.DS.'login'?>">Connexion</a>
                            </li>
                        <?php endif; ?>

                    </ul>
                </div>
            </nav>

        <?= $layoutContent?>


    </body>
</html>