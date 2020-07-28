<?php $title_layout="Nos produits";?>
<h1>Nos Produits</h1>
<?php if($this->Session->get('Cart') == null) $this->Session->set('Cart',array()); ?>
<a class="btn btn-danger" href="<?=BASE_URL.DS.'product'.DS.'destroyCart'?>" role="button">Vider le Panier</a>
<h4 style="float:right;"><a href="<?=BASE_URL.DS.'product'.DS.'cart'?>" style="diplay:none;">Panier </a> : <?=count($this->Session->get('Cart'));?></h4>
<ul>
    <?php foreach($products as $product) {
        ?>
        <li>
        <?= $product->name; ?> 
        <a href="<?php echo BASE_URL.DS.'product'.DS.'article'.DS.$product->pid ?>">  Voir l'article &rarr; </a></br> 
        <a href="<?php echo BASE_URL.DS.'product'.DS.'addCart'.DS.$product->pid ?>">  Ajouter au panier &rarr; </a></br>
        <?php if(isset($product->img_url)): ?>
            <img src="<?=SOURCE.DS.'img'.DS.$product->img_url ?>">
        <?php endif;?>
        </li>
    <?php } ?>
</ul>


<!-- Pagination -->
<nav aria-label="...">
  <ul class="pagination ">
        <?php for($i = 1; $i <= $page ; $i++): ?>
            <li><a href="?page=<?= $i ?>"><?=$i?></a></li>
        <?php endfor;?>
  </ul>
</nav>

