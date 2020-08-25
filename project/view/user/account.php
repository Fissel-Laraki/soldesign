<?php 
    $title_layout="Mon compte";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'user'.DS.'account.css">';
?>
<?php title("Mon compte");?>
<div class="container border mb-5 px-5 py-5">
    <div class="row" id="container">
        
        <div class="col-4 mb-3">
            <div>
                <img src="#">
            </div>
        </div>
        <div class="col-7">
            <div class="mt-3">
                <p class="my-2"><strong>Nom </strong>: <?=$user->name?> </p>
                <p class="my-2"><strong>Prenom </strong>: <?=$user->firstname?></p>
                <p class="my-2"><strong>email </strong>: <?=$user->email?></p>
               
            </div>
            <div>
                <p class="my-2"><strong>Numéro de téléphone : </strong><?=$user->phone;?></p>
                
            </div>
            <div>
                <p class="my-2"><strong>Adresse de livraison : </strong><?=$adress->street?> <?=$adress->code?>, <?=$adress->city?> <?=$adress->country?></p>
                
            </div>

            <button class="btn btn-dark" id="edit"> Modifier </button>
        </div>
    
    </div>



    <div class="row  w-100 h-80 d-none" id="editContainer">
        <div class="col-3  px-0 h-100">

            <h5>Modifier données</h5>
            <ul class="d-flex flex-column  list-group px-0 dropdown">
                <li class="p-2  list-group-item mx-0 px-3 activee " data-div ="n" >Numéro de tél</li>
                <li class="p-2  list-group-item mx-0 px-3 " data-div ="p">Mot de passe</li>
                <li class="p-2  list-group-item mx-0 px-3 " data-div ="a">Adresse de livraison</li>
            </ul>
            <button class="btn btn-success my-1 w-100" id="btn">Confirmer les changements</button>
            <button class="btn btn-warning my-1 w-100" id="back">Retour</button>
        </div>

        <div class="col-9 mt-4 h-100">

            <div class="divs w-100 h-100 mx-3" id="div-n">
                <div>
                    <strong> Votre numéro actuel : <?=$user->phone?></strong>
                </div>
                <div class="my-2">
                    <input type="text" value="<?=$user->phone?>" name="phone" placeholder="+XX XXXXXXXX">
                </div>
            </div>                        
            <div class="divs w-100 h-100 mx-3 d-none" id="div-p">
                <div>
                    <input type="password" class="my-1" name="currentpass" placeholder="mot de passe actuel"><br/>
                    <input type="password" class="my-1"  name="newpass" placeholder="Nouveau mot de passe"><br/>
                    <input type="password" class="my-1"  name="newpass2" placeholder="Confirmez">
                </div>
            </div>                        
            <div class="divs w-100 h-100 mx-3 d-none" id="div-a">
                <div>
                    <strong> Votre adresse actuelle : <?=$adress->street?> <?=$adress->code?>, <?=$adress->city?> <?=$adress->country?></strong>
                </div>
                <div class="form-group">
                    <label>Rue</label><br/>
                    <input type="text" value="<?=$adress->street?>" name="street" >
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Ville</label>
                            <input type="text" value="<?=$adress->city?>"  name="city"  >
                        </div>
                        <div class="col">
                            <label>Code Postal</label>
                            <input type="number" value="<?=$adress->code?>"  name="code">
                        </div>
                        <div class="col">
                            <label>Pays</label>
                            <input type="text" value="<?=$adress->country?>"  name="country" >
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
       
    </div>
</div>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'user'.DS.'account.js>'.'</script>';
?>