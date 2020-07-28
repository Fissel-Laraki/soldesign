<h1>Articles Management</h1>
<?php require ('main.php');?>

<ul>
    <?php foreach($products as $product) :?>
        <li><?= $product->name ?><a href="<?= BASE_URL.DS.'admin'.DS.'deleteArticle'.DS.$product->pid?>"> supprimer &rarr; </a> OR <a href="<?= BASE_URL.DS.'admin'.DS.'editArticle'.DS.$product->pid?>"> edit &rarr; </a></li>
    <?php endforeach; ?>
</ul>



<!-- Form to add a product -->
<button id="addBtn">Ajouter un article</button>


<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'addArticle'?>" enctype="multipart/form-data" id="addArticleForm" style="width:30%;margin-right:auto;margin-left:auto;">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">format</label>
    <input type="text" name="format" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
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
        <option><?=$serie->name ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select name="category" class="form-control" >
      <?php foreach($categories as $category) :?>
        <option><?=$category->name ?></option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label >Image Principale </label>
    <input type="file" name="file" class="form-control"  >
  </div>
  <div class="form-group">
    <label >Images</label>
    <input type="file" name="files[]" class="form-control"  multiple>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<script src="<?= SOURCE.DS.'js'.DS.'articles.js'?>"></script>