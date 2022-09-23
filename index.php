<?php include 'includes/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SayOut</title>
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
              <a href="#" class="nav-link"><i class="fa fa-home" style="font-size: 1.75rem; color: #df5478"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- SayOut -->
  <section id="sayout" class="vh-100 d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <div class="card">
              <div class="card-body">
                <img class="img" src="includes/images/ub.jpg" class="img-fluid mt-2">
                <h4 class="mb-4 mt-2 fw-bold">Pat Bandola</h4>
                <form action="includes/action.php" method="post" id="myForm" class="row justify-content-center mt-2">
                  <div class="col-md-10">
                  <?php if (isset($_SESSION['send-message-success'])) : ?>
                    <h5 id="alert" class="alert alert-success fw-bold"><?php echo $_SESSION['send-message-success']; ?></h5>
                  <?php
                      unset($_SESSION['send-message-success']);
                  endif; ?>
                  <?php if (isset($_SESSION['send-message-failed'])) : ?>
                    <h5 id="alert" class="alert alert-danger fw-bold"><?php echo $_SESSION['send-message-failed']; ?></h5>
                  <?php
                      unset($_SESSION['send-message-failed']);
                  endif; ?>
                  <?php if (isset($_SESSION['required'])) : ?>
                    <h5 id="alert" class="alert alert-warning fw-bold"><?php echo $_SESSION['required']; ?></h5>
                  <?php
                      unset($_SESSION['required']);
                  endif; ?>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control pt-3" placeholder="Leave A Message Anonymously, Your Name Will Be Hidden :) " ></textarea>
                    <p id="count" class="mb-1 mt-4"></p>
                    <button type="submit" name="send" class="btn logout text-white"><i class="fab fa-telegram-plane"></i> Send</button>
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
<script src="js/app.js"></script>
<script>
  let alert = document.querySelector('#alert');
  setTimeout(() => alert.remove(), 3000);
</script>
</html>