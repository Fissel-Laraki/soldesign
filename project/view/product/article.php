<?php $title_layout="Un article"  ?>
<h1><?=$product->name?></h1>


<ul>
    <?php foreach($product as $k=>$v) {
        ?>
        <li><?php echo $k.' : '.$v;  ?></li>
    <?php } ?>
</ul>

<h3>Image principale:</h3>
<img src="<?=SOURCE.DS.'img'.DS.$product->img_url;?>">
</br>
<h3>Images secondaires:</h3>
<?php foreach ($images as $image) : ?>
    <img src="<?=SOURCE.DS.'img'.DS.$image->url;?>">
<?php endforeach;?>
