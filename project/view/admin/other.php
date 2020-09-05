<?php 
    $title_layout = "Articles";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'admin'.DS.'articles.css">';
?>

<?php title("Gestion des accessoires") ?>
<?php
    $page = 1;
    unset($_GET['page']);
?>

<div class="container h-100">
	<div class="row">
		<div class="col-md-12">
            <button type="button" id="addBtn" class="btn btn-dark my-5">Ajouter un article</button>
			<h4>Accessoires</h4>
			<div class="table-responsive">
				<table id="mytable" class="table table-bordred table-striped">
					<thead>
						<th>
							Nom
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
                        <?php foreach ($elements as $element) : ?>
						<tr>
							<td>
								<?=$element->name?>
							</td>
							<td>
                                <?=$element->price?>
							</td>
							<td>
								-<?=$element->promotion?>%
							</td>
							<td>
								<p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <a href="<?= BASE_URL.DS.'admin'.DS.'editArticle'.DS.$element->pid?>"><i class="fa fa-edit"></i></a>
								</p>
							</td>
							<td>
                                <?php if($element->deleted) : ?>
								<p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <a href="<?= BASE_URL.DS.'admin'.DS.'restoreAccessory'.DS.$element->pid.DS.$this->request->page?>" class="undo"><i class="fa fa-undo" aria-hidden="true"></i></a>
                                </p>
                                <?php else : ?>
								<p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <a href="<?= BASE_URL.DS.'admin'.DS.'deleteAccessory'.DS.$element->pid.DS.$this->request->page?>" class="trash"><i class="fa fa-trash"></i></a>
                                </p>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Form to add a product -->


<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'addOther'?>" enctype="multipart/form-data" id="addForm" style="margin-bottom:100px">
  <div class="container w-100 h-100">
    <div class="row" id="row">
        
        <div class="col" >

          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="number" name="price" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Promotion</label>
            <input type="number" name="promotion" class="form-control" >
          </div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>

        


        <div class="col">
          <div class="form-group">
            <label for="file" class="label-file">Ajouter une photo principale </label>
            <input type="file" name="file" id="file" class="form-control input-file" onchange="loadFile(event)" >
            <div id="imageContainer">
            </div>
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
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'admin'.DS.'other.js>'.'</script>';
?>