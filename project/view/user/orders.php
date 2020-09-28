<?php 
    $title_layout = "Mes commandes";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'user'.DS.'orders.css">';
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Mes commandes</h1>
     </div>
</section>

<div class="container h-100">
    <div class="row">
        <?php if (empty($orders)){
            $this->Session->setFlash("Vous n'avez encore passez aucune commande");
            echo $this->Session->flash();
        }else{
        ?>
        <div class="col-lg-6 col-sm-10 overflow-auto table-responsive " id="orders">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Status</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($orders as $order) : ?>
                    <tr data-oid=<?=$order->oid?> data-i = <?=$i?> class="classTr">
                        <td><?=$i?></td>
                        <td><?=$order->date?></td>
                        <td><?=$order->total?> €</td>
                        <td><?=$order->status?></td>
                    </tr>
                    <?php $i += 1;?>
                    <?php endforeach ;?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6 col-sm-12 d-none table-responsive" id="tableContainer">
            <h4>Details d'une commande :</h4>
            <button class="btn btn-dark my-3 d-block d-lg-none mx-auto" onclick="toggler()">Retour aux commandes</button>
            <table class="table table-bordered">
                <caption id="caption">Détails de la commande numéro </caption>
                <thead class="table-dark">
                        <th>Image</th>
                        <th>Article</th>
                        <th>Format</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                </thead>
                <tbody id="details">
                    
                </tbody>
            </table>
        </div>
        <?php }?>
    </div>
</div>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'user'.DS.'orders.js>'.'</script>';
?>