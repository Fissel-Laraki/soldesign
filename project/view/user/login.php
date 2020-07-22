<h1> Login </h1>



<!-- Connexion Form -->

<form method="POST" action="<?php echo BASE_URL.DS.'user'.DS.'login' ?>">
  <div class="form-group">
    <label >Email address</label>
    <input type="email" name="email" class="form-control"  aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" name="password" class="form-control" >
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
