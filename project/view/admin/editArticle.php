<?php 
    $title_layout = "Mofifier un article";
    $otherCss[] = '<link rel="stylesheet" href="'.SOURCE.DS.'css'.DS.'admin'.DS.'editArticle.css">';
?>
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
          <div class="form-group">
                <label for="available">Disponibilité</label>
                <input type="checkbox" name="available" id="available" <?php if($product->available) echo "checked"?>>
          </div>
          <button type="submit" class="btn btn-primary">Modifier</button>
        </div>


        <?php 
          $nbCharacteristics = count($characteristics);
          $i = 0;
        ?>
        <div class="col">
        <?php $closed =false;?>
        <?php foreach ($characteristics as $characteristic) :?>
    
          <?php if( $i%5 == 0 && $i != 0):?>
            </div>
            <div class="col">
            <?php $closed = false;?>
          <?php endif;?>
          <div class="form-group">
                <label><?=$characteristic->name;?></label>
                <input type="text" name="<?=$characteristic->chid?>" value="<?=$characteristic->value?>" class="form-control">
          </div>
          <?php $i +=1 ;?>
        <?php endforeach;?>
        

        
        <?php if (!$closed) : ?>
          </div>
        <?php endif;?>

        


        <div class="col">
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
          <div class="form-group">
            <label for="file" class="label-file" >Modifier l'image Principale </label>
            <input type="file" name="file" class="form-control input-file" id="file" onchange="loadFile(event)" >
            <div id="imageContainer">
              <img src="<?=SOURCE.DS.'img'.DS.$product->img_url?>" >
            </div>
          </div>

          <div class="form-group">
            <label for="files" class="label-file">Modifier les images Secondaires</label>
            <input type="file" name="files[]" class="form-control input-file" id="files" onchange="loadFiles(event)" multiple>
            <div id="imagesContainer" class="row">
              <?php foreach($images as $image): ?>
                <div class="my-2">
                  <img src="<?=SOURCE.DS.'img'.DS.$image->url?>" style='display:inline-block;width:100px;height:100px;margin:15px'></br>
                  <button type="button" class="btn btn-danger w-50 mx-4 my-1 deleteMedia"  data-mid="<?=$image->mid?>" ><i class="fa fa-trash"></i></button>
                </div>
              <?php endforeach;?>

            </div>
          </div>
        
        </div>

    </div>

  </div>
</form>

<?php 
    $otherScript = '<script src='.SOURCE.DS.'js'.DS.'admin'.DS.'editArticle.js>'.'</script>';
?>