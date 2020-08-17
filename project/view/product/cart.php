<?php 
    $title_layout="Panier";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'product'.DS.'cart.css">';
?>
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">PANIER</h1>
     </div>
</section>
<?php if ($this->Session->getTotal() ==  0) {
        $this->Session->setFlash("Votre panier est vide, veuillez ajouter au moins un article");
        echo '</br>'.$this->Session->flash();
    }else{
    
?>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col"> </th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col"> </th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <?php 
                        $items = $this->Session->get('Cart');
                        if($items == null) $items = array();
                        $total = 0;
                    ?>
                    <tbody id="tbody">
                        <?php foreach($items as $item) : ?>
                        <?php $encodedItem = json_encode($item['product']); ?>
                        <tr>
                            <td><img src="<?=SOURCE.DS.'img'.DS.$item['product']->img_url?>" /> </td>
                            <td><?=$item['product']->name?> (<?=$item['product']->format?>)</td>
                            <td class="text-right"><button  class="btn btn-dark" onclick="changeMinus(<?=$item['product']->pid?>,<?=$item['product']->price?>)"><i class="fa fa-minus" aria-hidden="true"></i>
</button></td>
                            <td class="text-center" id="item<?=$item['product']->pid?>"><?=$item['quantity']?></td>
                            <td><button class="btn btn-dark" onclick="changePlus(<?=$item['product']->pid?>,<?=$item['product']->price?>)"><i class="fa fa-plus" aria-hidden="true"></i>
</button></td>
                            <td class="text-right"><?=$item['product']->price?></td>
                            <td class="text-right"><a class="btn btn-sm btn-danger" href="<?=BASE_URL.DS.'product'.DS.'deleteCart'.DS.$item['product']->pid?>"><i class="fa fa-trash"></i> </a> </td>
                        </tr>
                        <?php $total = round($total + round($item['product']->price*$item['quantity'],2),2);?>
                        <?php endforeach;?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong id="total"><?=$total?></strong></td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-danger btn-lg" id="emptyCartBtn"  role="button">Vider le panier</button>
                    <a class="btn btn-block btn-light " href="<?=BASE_URL.DS.'product'?>" role="button">Continuez vos achats</a>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <a class="btn btn-lg btn-block btn-success text-uppercase" href="<?=BASE_URL.DS.'product'.DS.'payment'?>">Passer au paiement</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php }?>
<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'product'.DS.'cart.js>'.'</script>';
?>