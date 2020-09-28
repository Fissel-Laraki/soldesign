<div class="h-100 my-5">
    <form method="POST" action="<?=BASE_URL.DS.'admin'.DS.'editAccessory'.DS.$accessory->acid?>"  id="addArticleForm" style="width:30%;margin-right:auto;margin-left:auto;">
    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?=$accessory->name;?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>