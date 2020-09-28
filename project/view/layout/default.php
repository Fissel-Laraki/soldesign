<?php 
    $logged = $this->Session->isLogged();
    $admin = $this->Session->isAdmin();     
    $title_layout = isset($title_layout) ? $title_layout : 'Page';
    $showCart = isset($showCart)? $showCart : false;
    $this->loadModel('Category');
    $this->loadModel('Accessory');
    $this->loadModel('Consumable');
    $categs = $this->Category->find(array('conditions' => "name != 'Toutes'"));
    $accessories = $this->Accessory->find(array());
    $consumables = $this->Consumable->find(array());
    
    
?>

<html class="h-100">
    <head>
        <title><?=$title_layout?></title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <meta charset="utf-8">
        
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="<?=SOURCE.DS.'lib/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="<?=SOURCE.DS.'lib/font-awesome/css/font-awesome.min.css'?>" rel="stylesheet">
        <link href="<?=SOURCE.DS.'lib/animate/animate.min.css'?>" rel="stylesheet">
        <link href="<?=SOURCE.DS.'lib/ionicons/css/ionicons.min.css'?>" rel="stylesheet">
        <link href="<?=SOURCE.DS.'lib/owlcarousel/assets/owl.carousel.min.css'?>" rel="stylesheet">
        <link href="<?=SOURCE.DS.'lib/lightbox/css/lightbox.min.css'?>" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="<?=SOURCE.DS.'css'.DS.'layout'.DS.'style.css'?>" rel="stylesheet">
        <?php if(isset($otherCss)) : ?>
            <?php if(is_array($otherCss)): ?>
            <?php foreach($otherCss as $o) {
                echo $o;
            }
            ?>
            <?php else: ?>
                <?=$otherCss?>
            <?php endif?>
        <?php endif;?>



    </head>
    
    <body class="d-flex flex-column h-100 bg-light" >
         <!-- Navigation -->
        <nav class="navbar-expand-lg"  id="quick">
            Click & collect 3h, sur les produits en stock - votre commande prêt en magasin à emporter sous 3h
        </nav>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="navbar">
            <div class="container">
                    <a class="navbar-brand" href="<?=BASE_URL.DS.'main'.DS?>">
                        SOLS DESIGN
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav ml-auto">
                            <?php if(!$admin) : ?>

                                <li  class="nav-item <?php activate($title_layout,'Home') ?>">
                                    <a class="nav-link" href="<?=BASE_URL.DS.'main'.DS?>"  role="button">Home</a>
                                </li>
                                <?php /*
                                <li class="nav-item dropdown <?php activate($title_layout,'Home') ?>">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Home
                                    </a>
                                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn bg-dark "  aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item bg-dark text-white" href="<?=BASE_URL.DS.'main'.DS?>">Accueil</a>
                                        <a class="dropdown-item bg-dark text-white" href="<?=BASE_URL.DS.'main'.DS?>#collection" >Notre Collection</a>
                                        <a class="dropdown-item bg-dark text-white" href="<?=BASE_URL.DS.'main'.DS?>#about">A propos</a>
                                
                                    </div>
                                </li>*/
                                ?>
                            
                                <li class="nav-item dropdown <?php activate($title_layout,'Nos produits') ?>">
                                    <a class="nav-link dropdown-toggle" href="#" id="showProducts" id="navbarDropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nos produits</a>
                                    <div class="dropdown-menu dropdown-menu-right animate slideIn"  style="background-color:black" aria-labelledby="navbarDropdown">
                                        <table class="table" id="tableProduits" style="background-color:black">
                                            <thead  class="thead-dark">
                                                <th scope="row" class="tableTitle">Carrelage</th>
                                                <th scope="row" class="tableTitle">Accessoires</th>
                                                <th scope="row" class="tableTitle">Consommables</th>
                                            </thead>

                                            <tbody>
                                                <td>
                                                    <ul>
                                                        <?php foreach($categs as $categ):?>
                                                            <li class="tableLi"><a class="dropdown-item text-white list-item"  style="background-color:black;font-size:20px" href="<?=BASE_URL.DS.'product'.DS.'?categories['.$categ->cid.']=on'?>"><?=$categ->name?></a></li>
                                                        <?php endforeach;?>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <?php foreach($accessories as $accessory):?>
                                                            <li class="tableLi"><a class="dropdown-item text-white list-item"  style="background-color:black;font-size:20px" href="<?=BASE_URL.DS.'product'.DS.'products?type=1&accessories['.$accessory->acid.']=on'?>"><?=ucfirst($accessory->name)?></a></li>
                                                        <?php endforeach;?>
                                                    
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <?php foreach($consumables as $consumable):?>
                                                            <li class="tableLi"><a class="dropdown-item text-white list-item" style="background-color:black;font-size:20px"  href="<?=BASE_URL.DS.'product'.DS.'products?type=2&consumables['.$consumable->coid.']=on'?>"><?=ucfirst($consumable->name)?></a></li>
                                                        <?php endforeach;?>
                                                    
                                                    </ul>
                                                </td>
                                            </tbody>
                                        </table>
                                    </div>
                                </li>
                        
                                <?php if (!$logged) :?>
                                <li  class="nav-item <?php activate($title_layout,'Connexion') ?>">
                                    <a class="nav-link" href="<?= BASE_URL.DS.'user'.DS.'login'?>">Connexion</a>
                                </li>
                                <?php endif;?>

                        
                            

                            <?php else: ?>
                                <li class="nav-item dropdown  <?php activate($title_layout,'Gerer') ?>">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Gerer
                                    </a>
                                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                                    <div class="dropdown-menu dropdown-menu-right animate bg-dark  slideIn" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item bg-dark text-white"  href="<?=BASE_URL.DS.'admin'.DS.'accessories'?>">Type d'accessoires</a>
                                        <a class="dropdown-item bg-dark text-white"  href="<?=BASE_URL.DS.'admin'.DS.'consumables'?>">Type de consommables</a>
                                        <a class="dropdown-item bg-dark text-white"  href="<?=BASE_URL.DS.'admin'.DS.'characteristics'?>">Caractéristiques</a>
                                        <a class="dropdown-item bg-dark text-white"  href="<?=BASE_URL.DS.'admin'.DS.'articles'?>">Articles</a>
                                        <a class="dropdown-item bg-dark text-white"  href="<?=BASE_URL.DS.'admin'.DS.'categories'?>">Catégories</a>
                                        <a class="dropdown-item bg-dark text-white"  href="<?=BASE_URL.DS.'admin'.DS.'series'?>">Series</a>

                                
                                    </div>
                                </li>
                                    <li class="nav-item <?php activate($title_layout,'Commandes') ?>">
                                        <a class="nav-link" href="<?=BASE_URL.DS.'admin'.DS.'orders'?>">Commandes</a>
                                    </li>
                            <?php endif;?>
                            <?php if($logged) : ?>
                                <li class="nav-item dropdown <?php activate($title_layout,'Paramètres') ?>">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Paramètres
                                    </a>
                                    <!-- Here's the magic. Add the .animate and .slide-in classes to your .dropdown-menu and you're all set! -->
                                    <div class="dropdown-menu dropdown-menu-right animate bg-dark  slideIn" aria-labelledby="navbarDropdown">
                                        <?php if (!$admin) : ?>
                                        <a class="dropdown-item bg-dark text-white" href="<?php echo BASE_URL.DS.'user'.DS.'orders'?>">Mes commandes</a>
                                        <? endif;?>
                                        <a class="dropdown-item bg-dark text-white" href="<?php echo BASE_URL.DS.'user'.DS.'account'?>">Mon compte</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item bg-dark text-white" href="<?= BASE_URL.DS.'user'.DS.'logout'?>">Déconnexion</a>
                                    </div>
                                </li>
                            <?php endif;?>
                            <?php if (!$admin) : ?>
                                <li class="nav-item float-right <?php activate($title_layout,'Panier') ?>">
                                    <a class="nav-link btn btn-dark btn-lg text-white mx-5 border-0" style="background-color : black;" href="<?=BASE_URL.DS.'product'.DS.'cart'?>">
                                        <i class="fa fa-shopping-cart" aria-hidden="true" id="totalCart">   <?=$this->Session->getTotal('Cart');?></i>
                                    </a>
                                </li>
                            <?php endif;?>
                        </ul>
                </div>
            </div>
        </nav> 
       



        <?= $layoutContent?>

        <footer class="footer sticky-bottom mt-5 py-3 bg-dark text-white">
            <div class="container text-center">
                <small>Copyright &copy; Your Website</small>
            </div>
        </footer>
        

        
        <!-- JavaScript Libraries -->
        <script src="<?=SOURCE.DS.'lib/jquery/jquery.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/jquery/jquery-migrate.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/easing/easing.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/superfish/hoverIntent.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/superfish/superfish.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/wow/wow.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/waypoints/waypoints.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/counterup/counterup.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/owlcarousel/owl.carousel.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/isotope/isotope.pkgd.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/lightbox/js/lightbox.min.js'?>"></script>
        <script src="<?=SOURCE.DS.'lib/touchSwipe/jquery.touchSwipe.min.js'?>"></script>
        <!-- Contact Form JavaScript File -->
        <script src="<?=SOURCE.DS.'js'.DS.'layout'.'contactform.js'?>"></script>

        <!-- Template Main Javascript File -->
        <script src="<?=SOURCE.DS.'js'.DS.'layout'.DS.'main.js'?>"></script>

        <?= isset($otherScript)? $otherScript:null ?>


    </body>
</html>