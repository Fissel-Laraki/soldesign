<?php 
    $title_layout="Caracteristiques";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'admin'.DS.'articles.css">';
 ?>
<?php title("Gestion des Caractéristiques");?>


<div class="container h-100">
	<div class="row">
		<div class="col-md-12">
			<h4>Types de consommables disponibles</h4>
            <button id="addBtn" class="btn btn-dark my-5">Ajouter</button>
			<div class="table-responsive">
				<table id="mytable" class="table table-bordred table-striped">
					<thead>

						<th>
							Nom
						</th>
						
						<th>
							Unité
						</th>

						<th>
						
						</th>
						<th>
							
						</th>
					</thead>
					<tbody>
                        <?php foreach ($characteristics as $characteristic) : ?>
						<tr>

							<td>
								<?=$characteristic->name?>
							</td>
							<td>
								<?=$characteristic->unit?>
							</td>
							
							<td>
								<p data-placement="top" data-toggle="tooltip" title="Edit">
                                    <a href="<?=BASE_URL.DS.'admin'.DS.'editCharacteristic'.DS.$characteristic->chid?>"><i class="fa fa-edit"></i></a>
								</p>
							</td>
							<td>
								<p data-placement="top" data-toggle="tooltip" title="Delete">
                                    <a href="<?=BASE_URL.DS.'admin'.DS.'deleteCharacteristic'.DS.$characteristic->chid?>" class="trash"><i class="fa fa-trash"></i></a>
                                </p>
                            </td>
                        </tr>
                        <?php endforeach;?>
                            
					</tbody>
				</table>
				<div class="clearfix"></div>
				
			</div>
            <form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'addCharacteristic'?>"  id="addForm" style="width:30%;margin-right:auto;margin-left:auto;">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Unité</label>
                <input type="text" name="unit" class="form-control" id="exampleInputEmail1">
            </div>
            <button type="submit" class="btn btn-outline-success">Confirmer</button>
            </form>
        </div>
	</div>
</div>





<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'admin'.DS.'articles.js>'.'</script>';
?>