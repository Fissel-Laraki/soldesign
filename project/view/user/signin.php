<?php 
    $title_layout="Inscription";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'user'.DS.'login.css">';
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'user'.DS.'signin.css">';
    
?>

<!-- Connexion Form -->
<div id="login" class="my-1 h-100">
        <div class="container-flex my-5 mx-5">
            <div id="login-row" class="row align-items-center justify-content-center ">

              <div class="col-6 h-100">
                <img src="<?=SOURCE.DS.'img'.DS.'logos'.DS.'logonoir.png'?>" class="w-100 h-100">
              </div>

              <!-- col-->
              <div class="col-4 h-100">
              
                <?php if(isset($errors)):?>
                    <?php foreach($errors as $error) : ?>
                        <div class="p-3 mb-1 bg-danger text-dark my-0"><?=$error?></div>
                    <?php endforeach;?>
                    
                <?php endif;?>
                        <form id="login-form" class="form border px-3" method="post" action="<?php echo BASE_URL.DS.'user'.DS.'signin' ?>">
                            <h3 class="text-center">Inscription</h3>
                            <div class="form-group">
                              <div class="row">
                                <div class="col">
                                    <label>Nom</label>
                                    <input type="text" name="name" value="<?=$data->name?>" class="form-control" required >
                                </div>
                                <div class="col">
                                    <label>Prenom</label>
                                    <input type="text" name="firstname" value="<?=$data->firstname?>" class="form-control" required >
                                </div>
                              </div>
                            </div> 
                            <div class="form-group">
                              <label>Adresse mail</label>
                              <input type="email" name="email" class="form-control" value="<?=$data->email?>"  aria-describedby="emailHelp" required>
                            </div>
                                      
                            <div class="form-group">
                              <div class="row">
                                <div class="col">
                                    <label>Mot de passe</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="col">
                                    <label>Confirmation</label>
                                    <input type="password" name="password2" class="form-control" required>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label>Numéro de téléphone</label>
                              <input type="number" name="phone" value="<?=$data->phone?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <label>Adresse Postale (livraison) </label>
                              <input type="text" name="street" value="<?=$data->street?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col">
                                    <label>Ville</label>
                                    <input type="text" name="city" value="<?=$data->city?>" class="form-control"  required>
                                </div>
                                <div class="col">
                                    <label>Code Postal</label>
                                    <input type="number" name="code" value="<?=$data->code?>" class="form-control" required>
                                </div>
                              </div>
                            </div>

                            
                         
                            <div class="form-group">
                              <label>Pays</label>
                              <input type="text" name="country" value="<?=$data->country?>" class="form-control"  required>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-outline-dark btn-md" value="S'inscrire">
                            </div>
                            <div id="login-link" class="text-right">
                                <a href="<?=BASE_URL.DS.'user'.DS.'login' ?>">Connectez-vous</a>
                            </div>
                          
                        </form>
              </div>
            </div>
            <!--row -->
        </div>
    </div>
