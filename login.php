<?php include 'includes/config.php'; 

if (isset($_SESSION['username'])) {
  header('Location: messages.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="includes/images/icon.png" type="image/icon type">
</head>
<body>
  <!-- Navbar -->
  <nav class="nav navbar navbar-expand-lg py-3 sticky-top bg-white navbar-light">
      <div class="container">
        <a href="#" class="navbar-brand fw-bold">SayPat. <i class="fa fa-message" style="color:#df5478"></i></a>

        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navmenu"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a href="index.php" class="nav-link"><i class="fa fa-home" style="font-size: 1.75rem; color: #df5478"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- Login -->
  <section id="login" class="vh-100 d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <div class="card">
              <div class="card-body pt-4">
                <img class="iconbox" src="includes/images/logo.png" class="img-fluid">
                <form action="includes/action.php" method="post" class="row justify-content-center mt-0">
                  <div class="col-md-10 my-2">
                  <?php if (isset($_SESSION['login-failed'])) : ?>
                  <h5 id="alert" class="alert alert-danger fw-bold"><?php echo $_SESSION['login-failed']; ?></h5>
                  <?php
                      unset($_SESSION['login-failed']);
                  endif; ?>
                  </div>
                  <div class="col-md-10 my-2">
                    <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Email or Username">
                  </div>
                  <div class="col-md-10 my-2">
                    <input type="password" name="password" class="form-control" autocomplete="off" placeholder="Password">
                  </div>
                  <div class="col-md-10 my-2">
                    <button type="submit" name="login" class="btn logout text-white">Login</button>
                  </div>
               </form>
             </div>
          </div>
        </div>        
      </div>
    </div>
  </section>
  <!-- Footer -->
  <footer>
    <div class="footer-bottom py-4 text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            @ 2022 Copyright All Rights Reserved
          </div>
          <div class="col-md-6">
            <div class="float-end social-icons">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-telegram"></i></a>
              <a href="#"><i class="fab fa-github"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>