<?php 
    $title_layout= $product->name;
	$otherCss = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'product'.DS.'article.css">';
	$showCart = true;
?>

<div class=" centered">
	<div class="row">
		<aside class="col-sm-5 border-right">
			<article class="gallery-wrap">
				<div class="img-big-wrap">
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img class="d-block w-100"  src="<?=SOURCE.DS.'img'.DS.$product->img_url;?>" alt="First slide">
							</div>
							<?php foreach($images as $image) : ?>
							<div class="carousel-item ">
								<img class="d-block w-100" src="<?=SOURCE.DS.'img'.DS.$image->url;?>" alt="Second slide">
							</div>
							<?php endforeach;?>
							
						</div>
						<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<!-- slider-product.// -->
				
				
				<!-- slider-nav.// -->
			</article>
			<!-- gallery-wrap .end// -->
		</aside>
		<aside class="col-sm-7">
			<article class="card-body p-5">
				<h3 class="title mb-3"><?=strtoupper($product->name)?></h3>
				<p class="price-detail-wrap">
					<span class="price h3 text-warning">
						<span class="currency">€</span>
						<span class="num"><?=$product->price?></span>
					</span>
					<span>par ...</span>
				</p>
				<!-- price-detail-wrap .// -->
				<!--<dl class="item-property">
					<dt>
						Description
					</dt>
					<dd>
						<p>
							Here goes description consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco 
						</p>
					</dd>
				</dl>-->
				<dl class="param param-feature">
					<dt>
						Format
					</dt>
					<dd>
						<?=$product->format?>
					</dd>
				</dl>
				<!-- item-property-hor .// -->
				<dl class="param param-feature">
					<dt>
                        Serie
					</dt>
					<dd>
						<?=$product->serie?>
					</dd>
				</dl>
				<!-- item-property-hor .// -->
				<dl class="param param-feature">
					<dt>
						Catégorie
					</dt>
					<dd>
						<?=$product->category?>
					</dd>
				</dl>
				<!-- item-property-hor .// -->
				<hr>
				<!-- row.// -->
				<button class="btn btn-lg btn-outline-dark text-uppercase" id="addCartBtn" onclick="addCart(<?=$product->pid?>)" ><i class="fa fa-shopping-cart"></i> Ajouter au panier </button>
			</article>
			<!-- card-body.// -->
		</aside>
		<!-- col.// -->
	</div>
	<!-- row.// -->
</div>
<!-- card.// -->
</div>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'product'.DS.'article.js>'.'</script>';
?>


