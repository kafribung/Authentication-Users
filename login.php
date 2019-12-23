<?php
require_once('core/init.php');
// Redirect to index
cek_session_user();


$error = '';
if (isset($_POST['submit'])) {
  $name      = $_POST['username'];
  $pass    = $_POST['password'];


  if (!empty(trim($name)) && !empty(trim($pass))) {
    // cek nama apakah di db ada atau tidak
    if (cek_nama($name) != 0) {
      if (cek_password($name, $pass)) redirect_index($name);
      else $error = 'Username dan Password salah !';
    } else $error = 'Register terlebih dahulu!';
  }
}
?>

<?php require_once('views/header.php') ?>
<div class="container">
  <div class="row text-center">
    <div class="col-sm-12 ">
      <h1>Login <span class="badge badge-info">Bro</span></h1>
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

  <!-- Pesan anda harus login  -->
  <?php if (isset($_SESSION['pesan'])) { ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-danger">
          <p>
            <?php flash_message() ?>
          </p>
        </div>
      </div>
    </div>
  <?php } ?>


  <div class=" row justify-content-center">
    <div class="col-sm-8">
      <form action="" method="POST">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="username" class="form-control" id="name" placeholder="input name">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="input password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary float-right">Login</button>
      </form>
    </div>
  </div>
</div>
<?php require_once('views/footer.php') ?>