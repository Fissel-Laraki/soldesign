<?php 
    $title_layout = "Articles";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'admin'.DS.'articles.css">';
?>

<?php title("Gestion des articles") ?>
<?php
    unset($_GET['page']);
?>
<div class="container h-100">
	<div class="row">
		<div class="col-md-12">
      <button type="button" id="addBtn" class="btn btn-dark my-5">Ajouter</button>
			<h4>Articles</h4>
			<div class="table-responsive">
				<table id="mytable" class="table table-bordred table-striped">
					<thead>

						<th>
							Nom
						</th>
						<th>
							Format
						</th>
						<th>
							Prix
						</th>
						<th>
							Promotion
						</th>
						<th>
              Type
						</th>

						<th>
						
						</th>
						<th>
							
						</th>
					</thead>
					<tbody>
            <?php foreach ($products as $product) : ?>
						<tr>

							<td>
								<?=$product->name?>
							</td>
							<td>
								<?=$product->format?>
							</td>
							<td>
                <?=$product->price?>
							</td>
							<td>
								-<?=$product->promotion?>%
							</td>
              <td>
                <?=$typeRef[$product->tid]?>
              </td>
							<td>
								<p data-placement="top" data-toggle="tooltip" title="Edit">
                  <a href="<?= BASE_URL.DS.'admin'.DS.'editArticle'.DS.$product->pid?>"><i class="fa fa-edit"></i></a>
								</p>
							</td>
							<td>
              <?php if($product->deleted) : ?>
								<p data-placement="top" data-toggle="tooltip" title="Delete">
                  <a href="<?= BASE_URL.DS.'admin'.DS.'restoreArticle'.DS.$product->pid.DS.$this->request->page?>" class="undo"><i class="fa fa-undo" aria-hidden="true"></i></a>
                </p>
              <?php else : ?>
								<p data-placement="top" data-toggle="tooltip" title="Delete">
                  <a href="<?= BASE_URL.DS.'admin'.DS.'deleteArticle'.DS.$product->pid.DS.$this->request->page?>" class="trash"><i class="fa fa-trash"></i></a>
                </p>
              <?php endif; ?>
              
              </td>
            </tr>
            <?php endforeach;?>
						
					</tbody>
				</table>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>








<!-- Form to add a product -->


<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'addArticle'?>" enctype="multipart/form-data" id="addForm" style="margin-bottom:100px">
  <div class="container w-100 h-100">
    <div class="row" id="row">
        <div class="col">

          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group types" data-tid="3">
            <label >format</label>
            <select name="format" class="form-control" >
              <?php foreach($formats as $format) :?>
                <option value="<?=$format->name?>"><?=$format->name?></option>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" name="price" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Promotion</label>
            <input type="number" name="promotion" class="form-control" >
          </div>

          <div class="form-group">
                <label>Type de produit</label>
                <select name="tid" class="form-control" id="selectType">
                  <?php foreach($types as $type) : ?>
                    <option value="<?=$type->tid?>" <?php if($type->tid==3) echo "selected" ?>><?=$type->name?></option>
                  <?php endforeach;?>
                </select>
          </div>
          <button type="submit" class="btn btn-outline-success">Confirmer</button>
        </div>

        <div class="col">
          
          <div class="form-group">
            <label>Quantité</label>
            <input type="number" name="quantity" class="form-control">
          </div>
          <div class="form-group types" data-tid="3">
            <label for="exampleFormControlSelect1">Serie</label>
            <select name="sid" class="form-control">
              <option disabled selected value> -- select an option -- </option>
              <?php foreach($series as $serie) :?>
                <option value="<?=$serie->sid?>"><?=$serie->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="form-group types" data-tid="3">
            <label for="exampleFormControlSelect1">Category</label>
            <select name="cid" class="form-control" >
              <option disabled selected value> -- select an option -- </option>
              <?php foreach($categories as $category) :?>
                <option value="<?=$category->cid?>"><?=$category->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group types d-none" data-tid="1">
            <label for="exampleFormControlSelect1">Type d'accessoires</label>
            <select name="acid" class="form-control" >
            <option disabled selected value> -- select an option -- </option>
              <?php foreach($accessories as $accessory) :?>
                <option value="<?=$accessory->acid?>"><?=$accessory->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group types d-none" data-tid="2">
            <label for="exampleFormControlSelect1">Type de consommables</label>
            <select name="coid" class="form-control" >
            <option disabled selected value> -- select an option -- </option>
              <?php foreach($consumables as $consumable) :?>
                <option value="<?=$consumable->coid?>"><?=$consumable->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <label for="addCarac">Ajouter une caractéristique</label>
            <button type="button" id="addCharac" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></button>
          </div>
          <div class="form-group">
            <select id="selection">
                <?php foreach ($characteristics as $characteristic) : ?>
                    <option value="<?=$characteristic->chid?>"><?=$characteristic->name?></option>
                <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label for="file" class="label-file">Ajouter une photo principale </label>
            <input type="file" name="file" id="file" class="form-control input-file" onchange="loadFile(event)" >
            <div id="imageContainer">

            </div>
          </div>
          <div class="form-group">
            <label for="files" class="label-file">Ajouter des images secondaires</label>
            <input type="file" name="files[]" class="form-control input-file" id="files" onchange="loadFiles(event)" multiple>
            <div id="imagesContainer" class="row">

            </div>
          </div>
        
        </div>

    </div>

  </div>
</form>
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
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'admin'.DS.'articles.js>'.'</script>';
?>