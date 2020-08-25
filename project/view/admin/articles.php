<?php 
    $title_layout = "Articles";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'admin'.DS.'articles.css">';
?>

<?php title("Gestion des articles") ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
      <button type="button" id="addBtn" class="btn btn-dark my-5">Ajouter un article</button>
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
								<p data-placement="top" data-toggle="tooltip" title="Edit">
                  <a href="<?= BASE_URL.DS.'admin'.DS.'editArticle'.DS.$product->pid?>"><i class="fa fa-edit"></i></a>
								</p>
							</td>
							<td>
								<p data-placement="top" data-toggle="tooltip" title="Delete">
                  <a href="<?= BASE_URL.DS.'admin'.DS.'deleteArticle'.DS.$product->pid?>" class="trash"><i class="fa fa-trash"></i></a>
                </p>
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
  <div class="container w-100">
    <div class="row">
        <div class="col">

          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
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
            <label for="exampleFormControlSelect1">Serie</label>
            <select name="serie" class="form-control">
              <?php foreach($series as $serie) :?>
                <option value="<?=$serie->sid?>"><?=$serie->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <div class="col">

          <div class="form-group">
            <label for="thickness">Epaisseur</label>
            <input type="text" name="thickness" class="form-control" >
          </div>

          <div class="form-group">
            <label for="conditioning">Conditionnement</label>
            <input type="text" name="conditioning" class="form-control" >
          </div>

          <div class="form-group">
            <label for="matter">Matière</label>
            <input type="text" name="matter" class="form-control" >
          </div>

          <div class="form-group">
            <label for="color">Couleur</label>
            <input type="text" name="color" class="form-control" >
          </div>

          <div class="form-group">
            <label for="edge">Bord</label>
            <input type="text" name="edge" class="form-control" >
          </div>

        </div>

        <div class="col">

          <div class="form-group">
            <label for="putType">Type de pose</label>
            <input type="text" name="putType" class="form-control" >
          </div>

          <div class="form-group">
            <label for="support">Support</label>
            <input type="text" name="support" class="form-control" >
          </div>

          <div class="form-group">
            <label for="standard">Norme</label>
            <input type="text" name="standard" class="form-control" >
          </div>

          <div class="form-group">
            <label for="frostRes">Résistance au gél</label>
            <input type="text" name="frostRes" class="form-control" >
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select name="category" class="form-control" >
              <?php foreach($categories as $category) :?>
                <option value="<?=$category->cid?>"><?=$category->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        
        </div>
        <div class="col">

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