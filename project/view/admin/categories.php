
<h1>Categories Management</h1>
<?php require ('main.php');?>


<ul>
    <?php foreach($categories as $category) : ?>
        <li><?= $category->name ?><a href="<?=BASE_URL.DS.'admin'.DS.'deleteCategory'.DS.$category->cid?>"> supprimer &rarr;</a> OR <a href="<?=BASE_URL.DS.'admin'.DS.'editCategory'.DS.$category->cid?>"> edit &rarr;</a></li>
    <?php endforeach;?>

</ul>


<button id="addBtn">Ajouter Une categorie</button>


<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'addCategory'?>"  id="addArticleForm" style="width:30%;margin-right:auto;margin-left:auto;">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="<?= SOURCE.DS.'js'.DS.'articles.js'?>"></script>