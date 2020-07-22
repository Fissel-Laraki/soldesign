<?php $title_layout="Nos produits"  ?>
<h1>Nos Produits</h1>

<ul>
    <?php foreach($products as $product) {
        ?>
        <li><?= $product->name; ?> <a href="<?php echo BASE_URL.DS.'product'.DS.'article'.DS.$product->pid ?>">  Voir l'article &rarr;</a></li>
    <?php } ?>
</ul>


<!-- Pagination -->
<nav aria-label="...">
  <ul class="pagination ">
        <?php for($i = 1; $i <= $page ; $i++): ?>
            <li><a href="?page=<?= $i ?>"><?=$i?></a></li>
        <?php endfor?>
  </ul>
</nav>

