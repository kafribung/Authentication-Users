<?php
require_once('core/init.php');


// if (!isset($_COOKIE['user'])) {
//   setcookie('pesan', 'login terlebih dahulu', time() + (86400 * 30), "/");
//   header('Location: login.php');
// }

if (!isset($_SESSION['user'])) {
  $_SESSION['pesan'] = 'Login terlebih dahulu !';
  header('Location: login.php');
}

// Ambil data user
$result = data_user($_SESSION['user']);


// Data admin
$admin = data_admin($_SESSION['user']);


?>
<?php require_once('views/header.php') ?>
<div class="container">

  <div class="row">

    <div class="col-sm-12 text-center">
      <h1>Selamat dantang di welcome <?= $_SESSION['user'] ?></h1>
      <h4><span class="badge badge-success">Kamu orangnya baik dan sederhana</span></h4>

      <?php while ($data = mysqli_fetch_assoc($result)) { ?>
        <!-- Collapse -->
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Alamat Email Kamu :
                </button>
              </h2>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <span><?= $data['address'] ?>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Asal daerah kamu :
                </button>
              </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <span><?= $data['address'] ?> </span>
              </div>
            </div>
          </div>
        </div>
        <!-- End Collapse -->
      <?php } ?>
    </div>
  </div>


  <div class="row">
    <div class="col-sm-12">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseA" aria-expanded="true" aria-controls="collapseOne">
                Pesan ini hanya bisa diakses oleh admin :
              </button>
            </h2>
          </div>
          <div id="collapseA" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <?php if ($admin['role'] == 1) { ?>
              <div class="card-body">
                <h4>Hi <span class="badge badge-info">Admin</span></h4>
                <p>Kupinang kau dengan bismillah</p>
                <p>#hiyahiyahiya</p>
              <?php } else { ?>
                <p>Kamu bukan admin</p>
              </div>
            <?php } ?>



          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<?php require_once('views/footer.php') ?>