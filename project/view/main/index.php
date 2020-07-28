
<?php $otherCss = 
        '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'main'.DS.'index.css">';
?>

<div id="slider">
    <img class="bottom" src="<?=SOURCE.DS.'img'.DS.'main'.DS.'baltimore_final2.jpg'?>" />
</div>

<div id="container">
    <div id="header">
        <h3>Notre Collection</h3>
    </div>
    <div id="body">
        <?php foreach($categories as $category): ?>
            <div class="cart">
                <div class="img">
                    <img class="bottom" src="<?=SOURCE.DS.'img'.DS.'main'.DS.'baltimore_final2.jpg'?>" />
                </div>
                <div class="title">
                    <h5><?=$category->name?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>