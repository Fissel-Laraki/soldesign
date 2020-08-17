
<?php 
    $otherCss = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'main'.DS.'index.css">';
    $title_layout = "Accueil";
?>


<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      
    </ol>
    <div class="carousel-inner" role="listbox">
      <!-- Slide One - Set the background image for this slide in the line below -->
      <div class="carousel-item active" style="background-image: url('../webroot/img/main/baltimore_detalle_final.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <?php 
          /*
          <h3 class="display-4">First Slide</h3>
          <p class="lead">This is a description for the first slide.</p>
          */
          ?>
        </div>
      </div>
      <!-- Slide Two - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('../webroot/img/main/baltimore_final2.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <?php 
          /*
          <h3 class="display-4">Second Slide</h3>
          <p class="lead">This is a description for the second slide.</p>
          */
          ?>
        </div>
      </div>
      <!-- Slide Three - Set the background image for this slide in the line below -->
      <div class="carousel-item" style="background-image: url('../webroot/img/main/mural_interieur.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <?php 
          /*
          <h3 class="display-4">Third Slide</h3>
          <p class="lead">This is a description for the third slide.</p>
          */
          ?>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>
<!-- Page Content -->
<section class="py-5">
  <div class="container">
    <!-- Header COLLECTION-->
    <header class="bg-light text-center py-3 mb-4 mt-5" id="collection">
      <div class="container">
        <h1 class="font-weight-light text-dark"><u>NOTRE COLLECTION</u></h1>
      </div>
    </header>
    
    <div class="row">
      <?php foreach($categories as $category) : ?>
      <!-- Categories -->
      <div class="col-xl-4 col-md-6 mb-4 mt-5">
        <div class="card border-0 shadow categoryContainer overflow-hidden ">
          <a href="<?=BASE_URL.DS.'product'.DS.'?categories['.$category->cid.']=on'?>"><img src="<?=SOURCE.DS.'img'.DS.'categories'.DS.$category->img_url?>" class="card-img-top" alt="..."></a>
          <div class="card-body text-center">
            <h5 class="card-title mb-0"><?=$category->name?></h5>
            
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
    
    <!-- Header ABOUT-->
    <header class="bg-light text-center py-3 mb-4 mt-5" id="about">
      <div class="container">
        <h1 class="font-weight-light text-dark"><u>A PROPOS</u></h1>
      </div>
    </header>
    
    <section class="about-us py-4 " id="about-us">
      <div class="container mt-5 my-auto">
          <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class='text-dark'>Bienvenue!</h1>
                <h2>Qui sommes-nous ? </h2>
                <hr>
                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore etae magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                

            </div>
          </div>
      </div>
    </section>

    <?php /*
    <!-- Header CONTACT-->
    <header class="bg-dark text-center py-3 mb-4 mt-5" id="contact">
      <div class="container">
        <h1 class="font-weight-light text-white">CONTACTEZ-NOUS</h1>
      </div>
    </header>

    <div class="container contact-form">
  
            <form method="post">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="btnSubmit" class="btn btn-dark">Envoyer</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>
*/
?>


  </div>
</section>

  </main>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'main'.DS.'index.js>'.'</script>';
?>