<?php 
    $title_layout="Inscription";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'user'.DS.'login.css">';
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'user'.DS.'signin.css">';
?>

<!-- Connexion Form -->
<div id="login">
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
              
                <div id="login-column" class="col-md-6">
  <?php if(isset($errors)):?>
                    <?php foreach($errors as $error) : ?>
                        <div class="p-3 mb-1 bg-danger text-dark"><?=$error?></div>
                    <?php endforeach;?>
                    
                <?php endif;?>
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" method="post" action="<?php echo BASE_URL.DS.'user'.DS.'signin' ?>">
                            <h3 class="text-center">Inscription</h3>
                            <div class="form-group">
                              <label>Nom</label>
                              <input type="text" name="name" class="form-control"  >
                            </div> 
                            <div class="form-group">
                              <label>Prenom</label>
                              <input type="text" name="firstname" class="form-control"  >
                            </div>
                            <div class="form-group">
                              <label>Adresse mail</label>
                              <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">
                            </div>
                                      
                            <div class="form-group">
                              <label>Mot de passe</label>
                              <input type="password" name="password" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label>Encore votre mot de passe</label>
                              <input type="password" name="password2" class="form-control" >
                            </div>
                         
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-dark btn-md" value="S'inscrire">
                            </div>
                            <div id="login-link" class="text-right">
                                <a href="<?php echo BASE_URL.DS.'user'.DS.'login' ?>">Connectez-vous</a>
                            </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
