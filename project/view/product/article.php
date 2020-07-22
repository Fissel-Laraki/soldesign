<?php $title_layout="Un article"  ?>
<h1><?=$product->name?></h1>

<ul>

    <?php foreach($product as $k=>$v) {
        ?>
        <li><?php echo $k.' : '.$v;  ?></li>
    <?php } ?>
</ul>
