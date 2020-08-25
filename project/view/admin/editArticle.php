<?php title(" ");?>
<form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'editArticle'.DS.$product->pid?>" class="mt-5" enctype="multipart/form-data" id="addForm" style="margin-bottom:100px">
  <div class="container w-100">
    <div class="row">
        <div class="col">

          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" value="<?=$product->name?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="form-group">
            <label >format</label>
            <select name="format" class="form-control" >
              <?php foreach($formats as $format) :?>
                <?php if ($format->name  == $product->format) : ?>
                  <option value="<?=$format->name?>" selected><?=$format->name?></option>
                <?php else:?>
                  <option value="<?=$format->name?>" ><?=$format->name?></option>
                <?php endif;?>
              <?php endforeach;?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Prix</label>
            <input type="number" name="price" value="<?=$product->price?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Promotion</label>
            <input type="number" name="promotion" value="<?=$product->promotion?>" class="form-control" >
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Serie</label>
            <select name="serie" class="form-control">
              <?php foreach($series as $serie) :?>
              <?php if($serie->name==$current_serie) :?>
                <option value="<?=$serie->sid?>" selected><?=$serie->name ?></option>
              <?php else:?>
                <option value="<?=$serie->sid?>"><?=$serie->name ?></option>
              <?php endif;?>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
        </div>
        <div class="col">

          <div class="form-group">
            <label for="thickness">Epaisseur</label>
            <input type="text" value="<?=$product->thickness?>" name="thickness" class="form-control" >
          </div>

          <div class="form-group">
            <label for="conditioning">Conditionnement</label>
            <input type="text"value="<?=$product->conditioning?>" name="conditioning" class="form-control" >
          </div>

          <div class="form-group">
            <label for="matter">Matière</label>
            <input type="text" value="<?=$product->matter?>" name="matter" class="form-control" >
          </div>

          <div class="form-group">
            <label for="color">Couleur</label>
            <input type="text" value="<?=$product->color?>" name="color" class="form-control" >
          </div>

          <div class="form-group">
            <label for="edge">Bord</label>
            <input type="text" value="<?=$product->edge?>" name="edge" class="form-control" >
          </div>

        </div>

        <div class="col">

          <div class="form-group">
            <label for="putType">Type de pose</label>
            <input type="text" value="<?=$product->putType?>" name="putType" class="form-control" >
          </div>

          <div class="form-group">
            <label for="support">Support</label>
            <input type="text" value="<?=$product->support?>" name="support" class="form-control" >
          </div>

          <div class="form-group">
            <label for="standard">Norme</label>
            <input type="text" value="<?=$product->standard?>" name="standard" class="form-control" >
          </div>

          <div class="form-group">
            <label for="frostRes">Résistance au gél</label>
            <input type="text" value="<?=$product->frostRes?>" name="frostRes" class="form-control" >
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Category</label>
            <select name="category" class="form-control" >
              <?php foreach($categories as $category) :?>  
              <?php if($category->name==$current_category) :?>
                <option value="<?=$category->cid?>" selected><?=$category->name ?></option>
              <?php else: ?>
                <option value="<?=$category->cid?>" ><?=$category->name ?></option>
              <?php endif;?>
              <?php endforeach; ?>
            </select>
          </div>
        
        </div>
        <div class="col">

          
          <div class="form-group">
            <label >Image Principale </label>
            <div id="imageContainer">
              <img src="<?=SOURCE.DS.'img'.DS.$product->img_url?>" >
            </div>
            <input type="file" name="file" class="form-control"  onchange="loadFile(event)" >
          </div>

          <div class="form-group">
            <label >Images Secondaires</label></br>
            <?php foreach($images as $image): ?>
              <div class="my-2">
                <img src="<?=SOURCE.DS.'img'.DS.$image->url?>"></br>
                <button type="button" class="btn btn-dark w-100 my-1" id="deleteMedia" data-mid="<?=$image->mid?>" >delete</button>
              </div>
              
            <?php endforeach;?>
            <input type="file" name="files[]" class="form-control" onchange="loadFiles(event)" multiple>
          </div>
        
        </div>

    </div>

  </div>
</form>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'admin'.DS.'editArticle.js>'.'</script>';
?>