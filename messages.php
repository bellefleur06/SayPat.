<?php include 'includes/config.php';

if (!isset($_SESSION['username'])) {
  header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Messages</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="icon" href="includes/images/icon.png" type="image/icon type">
</head>
<body>
  <!-- Navbar -->
  <nav class="nav navbar navbar-expand-lg py-3 sticky-top bg-white navbar-light">
      <div class="container">
        <a href="#" class="navbar-brand fw-bold">SayOut. <i class="fa fa-message" style="color:#df5478"></i></a>

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
              <a href="#" class="nav-link"><span style="font-size: 1.25rem"><?= $_SESSION['username']; ?></span></a>
            </li>
          </ul>
          <a href="logout.php" onclick="return confirm('Are you sure you want to log out?');" class="btn logout ms-auto mx-lg-3 text-white"><i class="fa fa-sign-out"></i></a>
        </div>
      </div>
    </nav>
  <!-- Messages -->
  <section id="hottest" class="h-100 min-vh-100 align-items-center">
    <div class="container">
      <div class="row py-2">
        <div class="col-md-8 mx-auto text-center text-white">
          <h1><i class="fa fa-message"></i> Messages</h1>
          <h6 class="pt-2 pb-3"><i>You have (2) New Messages</i></h6>
          <?php if (isset($_SESSION['delete-message-success'])) : ?>
          <h5 id="alert" class="alert alert-success fw-bold"><?php echo $_SESSION['delete-message-success']; ?></h5>
          <?php
              unset($_SESSION['delete-message-success']);
          endif; ?>
          <?php if (isset($_SESSION['delete-message-failed'])) : ?>
            <h5 id="alert" class="alert alert-danger fw-bold"><?php echo $_SESSION['delete-message-failed']; ?></h5>
          <?php
              unset($_SESSION['delete-message-failed']);
          endif; ?>
        </div>
      </div>
      <div class="row g-4 py-2">
      <?php

        $query = "SELECT * FROM messages ORDER BY id DESC";
        $statement = $conn->prepare($query);
        $statement->execute();

        $statement->setFetchMode(PDO::FETCH_OBJ);
        $result = $statement->fetchAll();

        //if you were to use PDO::FETCH_ASSOC, the proper way to call your data in the database is $row['creation_date'];

        if ($result) {

            foreach ($result as $row) {
      ?>
        <div class="col-md-4 col-sm-6">
          <div class="card h-100">
              <div class="card-body text-center fw-bold">
              <p><?=$row->message; ?></p>
              </div>
              <div class="card-footer p-0">
               <p class="float-start ps-3 pt-3 fw-bold text-secondary"><?=date("Y, M d", strtotime($row->date_posted));?></p>
               <a href="includes/action.php?delete_message=<?=$row->id; ?>" class="float-end pe-3 pt-3"><i class="fa fa-trash" style="color:#df5478;"></i></a>
              </div>
           </div>
         </div>
      <?php
            }
        } else { 
      ?>
        <div class="col-md-6 mx-auto">
          <div class="card h-100">
            <div class="card-body text-center fw-bold">
              <h3 class="fw-bold">No New Messages</h3>
            </div>
          </div>
        </div>
      <?php
        }
      ?>
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
<script>
  let alert = document.querySelector('#alert');
  setTimeout(() => alert.remove(), 3000);
</script>
</html>