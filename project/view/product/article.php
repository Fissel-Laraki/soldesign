<?php 
    $title_layout= $product->name;
	$otherCss = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'product'.DS.'article.css">';
	$showCart = true;
?>

<div class="centered mx-auto ">
	<div class="row">
		<aside class="col-sm-7 border-right">
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
		<aside class="col-sm-5">
			<article class="card-body p-2">
				<h3 class="title mb-3"><?=strtoupper($product->name)?></h3>
				<p class="price-detail-wrap">
					<span class="price h3">
						<?php if ($product->promotion > 0):?>
							<span style="text-decoration:line-through; font-size : smaller; color: red"><?=$product->price?></span>
							<span class="currency">€</span>
							<span class="num" id="price"><?=$product->price*(1-($product->promotion/100))?></span>
						<?php else:?>
							<span class="currency">€</span>
							<span class="num" id="price"><?=$product->price?></span>
						<?php endif;?>
					</span>
					<span>par m²</span>
				</p>
			
				<?php if ($product->format != "") :?>
				<dl class="param param-feature">
					<dt>
						Dimensions
					</dt>
					<dd>
						<?=$product->format?> cm²
					</dd>
				</dl>
				<?php endif;?>
				<!-- item-property-hor .// -->
				<?php foreach($productDetails as $detail) :?>
					<dl class="param param-feature">
						<dt>
							<?=$detail->key?>
						</dt>
						<dd>
							<?=$detail->value?>
						</dd>
					</dl>
				<?php endforeach;?>
				<!-- item-property-hor .// -->
				<hr>
				<!-- row.// -->
				<input type="number" class="border-1  px-2 my-2 py-2" id="quantity" placeholder="Quantité"><br/>
				<div class="my-2 w-100 h5">Total prévisionnel : <span id="total"></span></div>
				<button class="btn btn-lg btn-outline-dark text-uppercase" id="addCartBtn" onclick="addCart(<?=$product->pid?>)" ><i class="fa fa-shopping-cart"></i> Ajouter au panier </button>
			</article>
			<!-- card-body.// -->
		</aside>
		
		<!-- col.// -->
	</div>
	<!-- row.// -->
	<div class="row">
		<h4>Caracteristiques</h4>
		<table class="table table-striped">
			<thead>
				<tr>
				<th scope="col"></th>
				<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($characteristics as $characteristic) :?>
					<tr>
						<th scope="row"><?=$characteristic->name?></th>
						<td><?=$characteristic->value."   ".$characteristic->unit?></td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
    </div>
	<!-- row.// -->
</div>
<!-- card.// -->
</div>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'product'.DS.'article.js>'.'</script>';
?>


