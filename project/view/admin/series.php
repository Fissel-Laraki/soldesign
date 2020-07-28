
<h1>Series Management</h1>
<?php require ('main.php');?>


<ul>
    <?php foreach($series as $serie) : ?>
        <li><?= $serie->name ?><a href="<?=BASE_URL.DS.'admin'.DS.'deleteSerie'.DS.$serie->sid?>"> supprimer &rarr;</a> OR <a href="<?=BASE_URL.DS.'admin'.DS.'editSerie'.DS.$serie->sid?>"> edit &rarr;</a></li>
    <?php endforeach;?>

</ul>


<button id="addBtn">Ajouter Une serie</button>


<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'addSerie'?>"  id="addArticleForm" style="width:30%;margin-right:auto;margin-left:auto;">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="<?= SOURCE.DS.'js'.DS.'articles.js'?>"></script>