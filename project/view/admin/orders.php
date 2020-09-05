<?php 
    $title_layout = "Commandes à traiter";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'admin'.DS.'orders.css">';
?>
<?php title("Commandes") ?>
<div class="container">
	<div class="row">
        <div class="col-10 overflow-auto ">
            <h4>Commandes non traitées</h4>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total</th>
                    <th scope="col">Confirmer la commande</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($orders as $order) : ?>
                    <tr data-oid=<?=$order->oid?> data-i = <?=$i?> class="classTr">
                        <th scope="row"><?=$i?></th>
                        <td><?=$order->email?></td>
                        <td><?=$order->date?></td>
                        <td><?=$order->total?>€</td>
                        <td><button class="btn btn-dark confirm-btn" data-oid=<?=$order->oid?>><i class="fa fa-check" aria-hidden="true"></i></button></td>
                    </tr>
                    <?php $i += 1;?>
                    <?php endforeach ;?>
                    
                </tbody>
            </table>
        </div>
        <div class="col-2 d-none" id="tableContainer">
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
    </div>
</div>
<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'admin'.DS.'orders.js>'.'</script>';
?>