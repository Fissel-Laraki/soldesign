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
			<article class="card-body p-5">
				<h3 class="title mb-3"><?=strtoupper($product->name)?></h3>
				<p class="price-detail-wrap">
					<span class="price h3">
						<span class="currency">€</span>
						<span class="num"><?=$product->price?></span>
					</span>
					<span>par ...</span>
				</p>
			
				<dl class="param param-feature">
					<dt>
						Dimensions
					</dt>
					<dd>
						<?=$product->format?> cm²
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
						Déstination
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
				<tr>
					<th scope="row">Epaisseur</td>
					<td><?=$product->thickness?> mm</td>
				</tr>
				<tr>
					<th scope="row">Couleur</td>
					<td><?=$product->color?></td>
				</tr>
				<tr>
					<th scope="row">Matiere</td>
					<td><?=$product->matter?></td>
				</tr>
				<tr>
					<th scope="row">Bord</td>
					<td><?=$product->edge?></td>
				</tr>
				<tr>
					<th scope="row">Type de pose</td>
					<td><?=$product->putType?></td>
				</tr>
				<tr>
					<th scope="row">Support</td>
					<td><?=$product->support?></td>
				</tr>
				<tr>
					<th scope="row">Conditionnement</td>
					<td><?=$product->conditioning?> m²/colis</td>
				</tr>
				<tr>
					<th scope="row">Norme</td>
					<td><?=$product->standard?></td>
				</tr>
				<tr>
					<th scope="row">Résistance au gel</td>
					<td><?=$product->frostRes?></td>
				</tr>
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


