<?php 
    $title_layout="Nos produits";
    $otherCss = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'product'.DS.'index.css">';
	$showCart = true;
?>
<?php if($this->Session->get('Cart') == null) $this->Session->set('Cart',array()); ?>
<?php
    unset($_GET['page']);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-3 myBorder" id="filter">
            <form action="<?=BASE_URL.DS.'product'?>" method="get" id="form">
            
                <!-- filter -->
                <!--Categories -->
                <label for="categories" class="font-weight-bold">Categories</label>
                <?php foreach($categories as $category): ?>
                    <div class="checkbox">
                        <label><input type="checkbox" name="categories[<?=$category->cid?>]" class="categoryCheck" <?php if(isset($category->checked)) echo "checked"?>> <?=$category->name?></label>
                    </div>
                <?php endforeach?>

                <!--Series -->
                <hr/>
                <label for="categories" class="font-weight-bold">Series</label>
                <?php foreach($series as $serie): ?>
                    <div class="checkbox">
                        <label><input type="checkbox" name="series[<?=$serie->sid?>]"  class="serieCheck" <?php if(isset($serie->checked)) echo "checked"?>> <?=$serie->name?></label>
                    </div>
                <?php endforeach?>
            
                <!-- Formats -->
                <hr/>
                <label for="format" class="font-weight-bold">Dimensions</label>
                <?php foreach($formats as $format): ?>
                    <div class="checkbox">
                        <label><input type="checkbox" name="formats[<?=$format->name?>]" class="icheck" <?php if(isset($format->checked)) echo "checked"?> > <?=$format->name?></label>
                    </div>
                <?php endforeach?>

                <!-- Sale -->
                <hr/>
                <div class="checkbox">
                    <label><input type="checkbox" name="sale" class="icheck" <?php if(isset($saleChecked)) echo "checked"?> > En promotion</label>
                </div>
                

                <!-- Min Max price
                <div data-role="rangeslider">
                    <label for="price-min">Price:</label>
                    <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
                    <label for="price-max">Price:</label>
                    <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
                </div> -->

            </form>
            
        
        </div>
        <!-- products -->
        <div class="col-8">
            <div class="row">
                <?php foreach($products as $product): ?>
                <div class="col-3 col-md-3 col-sm-12 product" data-filter-category="<?=$product->cid?>" data-filter-serie="<?=$product->sid?>">
                    <div class="product-grid3">
                        <div class="product-image3">
                            <a href="<?=BASE_URL.DS.'product'.DS.'article'.DS.$product->pid?>">
                                <img class="pic-1" src="<?=SOURCE.DS.'img'.DS.$product->img_url ?>">
                            </a>
                            <ul class="social">
                                <li><button class="addCartBtn" onclick="addCart(<?=$product->pid?>)"><i class="fa fa-shopping-cart"></i></button></li>
                                
                            </ul>
                            <?php if($product->promotion > 0 ) : ?>
                            <span class="product-discount-label"><?=$product->promotion?>%  </span>
                            <?php endif; ?>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#"><?=$product->name?> <?=$product->format?></a></h3>
                            <div class="price">
                                <?php if($product->promotion > 0) :?>
                                €<?=$product->price * (1.0-($product->promotion/100))?>
                                <span>€<?=$product->price?></span>
                                <?php else : ?>
                                <?=$product->price?>
                                <?php endif; ?>
                            </div>
                        
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>

<?php if ($page > 1) :?>
<!-- Pagination -->

<div class="container">

  <ul class="pagination justify-content-center" >
        <li class="page-item <?php if($this->request->page == 1 ) echo "disabled" ?>"><a class="page-link" href="<?='?'.http_build_query($_GET).'&page='.($this->request->page - 1)?>">Page Précedente</a></li>
        <?php for($i = 1; $i <= $page ; $i++): ?>
            <li class="page-item <?php if($this->request->page == $i) echo "active";?>"><a class="page-link"   href="<?='?'.http_build_query($_GET).'&page='.$i ?>"><?=$i?></a></li>
        <?php endfor;?>
        <li class="page-item <?php if($this->request->page == $page ) echo "disabled" ?>"><a class="page-link"  href="<?='?'.http_build_query($_GET).'&page='.($this->request->page + 1)?>">Page Suivante</a></li>
  </ul>

</div>

<?php endif ?>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'product'.DS.'index.js>'.'</script>';
?>
