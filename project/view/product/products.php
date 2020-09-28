<?php 
    $title_layout="Accessoires et consommables";
    $otherCss = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'product'.DS.'index.css">';
    $showCart = true;
    $name = isset($name)? $name : "";
    $type = isset($type)? $type : "All";
?>

<?php if($this->Session->get('Cart') == null) $this->Session->set('Cart',array()); ?>
<?php
    unset($_GET['page']);
?>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-3 myBorder d-none d-lg-block col-sm-12  px-5 py-2" id="filter">
                <button class="btn btn-dark my-3 d-block d-lg-none mx-auto" onclick="toggler()">FILTRER</button>
                <form action="<?=BASE_URL.DS.'product'.DS.'products'?>" method="get" id="form">
                
                    <!-- filter -->
                    <div>
                        <input type="text" name="name" class="" value="<?=$name?>"  id="search" placeholder="Cherchez un article..." style="height:50px;font-size:20px">
                    </div>
                    <hr/>
                    
                    <!-- type -->

                    <?php 
                    
                    $types[] = (object)array(
                        "tid" => 0,
                        "name" => "All"
                    );
                    ?>

                    <select class="form-control" name="type">
                        <?php foreach($types as $t):?>
                            
                            <option value="<?=$t->tid?>" <?php if($type==$t->name) echo "selected";?>><?=$t->name?></option>
                        <?php endforeach;?>
                    </select>

                    <!--Consumable and Accessories -->
                    <hr/>
                    <label for="accessories" class="font-weight-bold" >ACCESSORIES</label>
                    <?php foreach($accessories as $accessory): ?>
                        <div class="checkbox">
                            <label><input type="checkbox" name="accessories[<?=$accessory->acid?>]"  class="serieCheck" <?php if(isset($accessory->checked)) echo "checked"?>> <span class="cr"><i class="cr-icon fa fa-check" aria-hidden="true"></i></span><?=$accessory->name?></label>
                        </div>
                    <?php endforeach?>

                    <hr/>
                    <label for="consumables" class="font-weight-bold" >CONSOMMABLES</label>
                    <?php foreach($consumables as $consumable): ?>
                        <div class="checkbox">
                            <label><input type="checkbox" name="consumables[<?=$consumable->coid?>]"  class="serieCheck" <?php if(isset($consumable->checked)) echo "checked"?>> <span class="cr"><i class="cr-icon fa fa-check" aria-hidden="true"></i></span><?=$consumable->name?></label>
                        </div>
                    <?php endforeach?>

                    <!-- Sale -->
                    <hr/>
                    <div class="checkbox">
                        <label><input type="checkbox" name="sale" class="icheck" <?php if(isset($saleChecked)) echo "checked"?> ><span class="cr"><i class="cr-icon fa fa-check" aria-hidden="true"></i></span>Promotion</label>
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
            <div class="col-8  mx-auto " id="products">
            <button class="btn btn-dark my-3 d-block d-lg-none mx-auto" onclick="toggler()">show filters</button>
                <div class="row">
                    <?php foreach($products as $product): ?>
                    <div class=" col-md-3 col-lg-3 col-sm-12 product justify-content-sm-center " data-filter-category="<?=$product->cid?>" data-filter-serie="<?=$product->sid?>">
                        <div class="product-grid3">
                            <div class="product-image3 overflow-hidden">
                                <a href="<?=BASE_URL.DS.'product'.DS.'article'.DS.$product->pid?>">
                                    <img class="pic-1 pictures" src="<?=SOURCE.DS.'img'.DS.$product->img_url ?>">
                                </a>
                                <ul class="social d-none d-lg-block">
                                    <li><button class="addCartBtn" onclick="addCart(<?=$product->pid?>)"><i class="fa fa-shopping-cart"></i></button></li>
                                    
                                </ul>
                                <?php if($product->promotion > 0 ) : ?>
                                <span class="product-discount-label"><i class="fa fa-star fa-1x" aria-hidden="true"></i> <?=$product->promotion?>%</span>
                                <?php endif; ?>
                            </div>
                            <div class="product-content">
                                <h3 class="title"><a href="#"><strong><?=strtoupper($product->name)?></strong></a></h3>
                                <div class="price">
                                    <?php if($product->promotion > 0) :?>
                                    <?=$product->price * (1.0-($product->promotion/100))?>€
                                    <span><?=$product->price?>€</span>
                                    <?php else : ?>
                                    <?=$product->price?>€
                                    <?php endif; ?>
                                    <div >
                                        <button class="btn btn-dark d-block d-lg-none" style="background-color:black;" onclick="addCart(<?=$product->pid?>)" > <strong> Ajouter au panier </strong></button>
                                    </div>
                                </div>
                            
                            
                            </div>
                        </div>
                    <hr/>
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
    <?php endif;?>




<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'product'.DS.'index.js>'.'</script>';
?>
