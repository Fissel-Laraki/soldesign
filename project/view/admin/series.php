
<?php 
    $title_layout="Series";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'admin'.DS.'articles.css">';
 ?>
<?php title("Gestion des series");?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h4>Séries</h4>
			<div class="table-responsive">
				<table id="mytable" class="table table-bordred table-striped">
					<thead>

						<th>
							Nom
						</th>
						
						<th>
						
						</th>
						<th>
							
						</th>
					</thead>
					<tbody>
            <?php foreach ($series as $serie) : ?>
						<tr>

							<td>
								<?=$serie->name?>
							</td>
							
							<td>
								<p data-placement="top" data-toggle="tooltip" title="Edit">
                  <a href="<?=BASE_URL.DS.'admin'.DS.'editSerie'.DS.$serie->sid?>"><i class="fa fa-edit"></i></a>
								</p>
							</td>
							<td>
								<p data-placement="top" data-toggle="tooltip" title="Delete">
                  <a href="<?=BASE_URL.DS.'admin'.DS.'deleteSerie'.DS.$serie->sid?>" class="trash"><i class="fa fa-trash"></i></a>
                </p>
              </td>
        </tr>
            <?php endforeach;?>
						
					</tbody>
				</table>
				<div class="clearfix"></div>
        <button id="addBtn" class="btn btn-primary">Ajouter Une serie</button>
				
			</div>
		</div>
	</div>
</div>




<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'addSerie'?>"  id="addForm" style="width:30%;margin-right:auto;margin-left:auto;">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'admin'.DS.'articles.js>'.'</script>';
?>