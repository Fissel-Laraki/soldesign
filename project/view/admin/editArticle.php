<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'editArticle'.DS.$product->pid?>" enctype="multipart/form-data" id="addArticleForm" style="width:30%;margin-right:auto;margin-left:auto;">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$product->name?>">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">format</label>
    <input type="text" name="format" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$product->format?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="number" name="price" class="form-control" value="<?=$product->price?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Promotion</label>
    <input type="number" name="promotion" class="form-control" value="<?=$product->promotion?>" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Serie</label>
    <select name="serie" class="form-control">
      <?php foreach($series as $serie) :?>
        <?php if($serie->name==$current_serie) :?>
            <option selected ><?=$serie->name?></option>
        <?php else: ?>
            <option><?=$serie->name?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Category</label>
    <select name="category" class="form-control" >
      <?php foreach($categories as $category) :?>
        <?php if($category->name==$current_category) :?>
            <option selected><?=$category->name?></option>
        <?php else: ?>
            <option><?=$category->name ?></option>
        <?php endif; ?>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label >Image Principale </label>
    <img src="<?=SOURCE.DS.'img'.DS.$product->img_url?>" >
    <input type="file" name="file" class="form-control"  >
  </div>
  <div class="form-group">
    <label >Images Secondaires</label></br>
    <?php foreach($images as $image): ?>
      <img src="<?=SOURCE.DS.'img'.DS.$image->url?>"></br>
      <a class="btn btn-dark" href="<?=BASE_URL.DS.'admin'.DS.'deleteMedia'.DS.$image->mid?>" role="button">delete</a></br>
    <?php endforeach;?>
    <input type="file" name="files[]" class="form-control"  multiple>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>