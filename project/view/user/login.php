<?php 
    $title_layout="Connexion";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'user'.DS.'login.css">';
?>

<!-- Connexion Form -->
<div id="login">
        <div class="container my-5">
            <div id="login-row" class="row justify-content-center align-items-center">

              <div class="col-6 w-100 h-100 my-2">
                <img src="<?=SOURCE.DS.'img'.DS.'logos'.DS.'LOGOnoir.jpg'?>" class="w-100 h-100">
              </div>
                
              <div id="login-column" class="col-6 border">
                    <?php
                        
                        echo '</br>'.$this->Session->flash() 
                    ?>
                    <?php if(isset($errors)):?>
                        <?php foreach($errors as $error) : ?>
                            <div class="p-3 mb-1 bg-danger text-dark"><?=$error?></div>
                        <?php endforeach;?>
                    <?php endif;?>
                    <form id="login-form" class="form" method="post" action="<?php echo BASE_URL.DS.'user'.DS.'login' ?>">
                        <h3 class="text-center">Connexion</h3>
                        <div class="form-group">
                            <label>Adresse mail</label>
                            <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">
                        </div>
                                    
                        <div class="form-group">
                            <label>Mot de passe</label>
                            <input type="password" name="password" class="form-control" >
                        </div>
                        
                        <div class="form-group">
                            <label for="remember-me"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                            <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="<?php echo BASE_URL.DS.'user'.DS.'signin' ?>">Inscrivez-vous</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
