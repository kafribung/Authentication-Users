<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Auth PHP</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><img src="img/logo_k.PNG" height="30" width="30" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <?php if (isset($_SESSION['user'])) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="/praktikumWeb/TPWeb9/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/praktikumWeb/TPWeb9/logout.php">Logout</a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="/praktikumWeb/TPWeb9/login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/praktikumWeb/TPWeb9/register.php">Register</a>
            </li>
          <?php } ?>



        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2 " disabled type="search" placeholder="Kafri Bung Dev" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <!-- End Nav -->
  </div>