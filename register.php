<?php
require_once('core/init.php');

$error = '';
if (isset($_POST['submit'])) {
  $name      = $_POST['name'];
  $pass    = $_POST['password'];
  $email     = $_POST['email'];
  $address   = $_POST['address'];

  if (!empty(trim($name)) && !empty(trim($pass)) && !empty(trim($address))) {
    // cek nama apakah di db ada atau tidak
    if (cek_nama($name) == 0) {
      if (register_user($name, $pass, $email, $address)) redirect_login($name);
      else $error = 'data gagal ditambahkan !';
    } else $error = 'username sudah ada!';
  }
}
?>

<?php require_once('views/header.php') ?>
<div class="container">
  <div class="row text-center">
    <div class="col-sm-12 ">
      <h1>Form <span class="badge badge-info">Register</span></h1>
      <hr>
    </div>
  </div>

  <!-- Pesan error -->
  <?php if (!empty($error)) { ?>
    <div class="row text-center">
      <div class="col-sm-12 ">
        <div class="alert alert-danger" role="alert">
          <p><?= $error ?></p>
        </div>
      </div>
    </div>
  <?php } ?>


  <div class=" row justify-content-center">
    <div class="col-sm-8">


      <form action="" method="POST">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="input name">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="input password">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email </label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="input email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea name="address" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary float-right">Register</button>
      </form>
    </div>
  </div>
</div>
<?php require_once('views/footer.php') ?>