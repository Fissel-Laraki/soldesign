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


<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'addArticle'?>" enctype="multipart/form-data" id="addForm" style="width:30%;margin-right:auto;margin-left:auto;margin-bottom:100px">
  <div class="container">
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
        <option value="<?=$format->fid?>"><?=$format->name?></option>
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
    <label for="exampleFormControlSelect1">Category</label>
    <select name="category" class="form-control" >
      <?php foreach($categories as $category) :?>
        <option value="<?=$category->cid?>"><?=$category->name ?></option>
      <?php endforeach; ?>
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

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'admin'.DS.'articles.js>'.'</script>';
?>