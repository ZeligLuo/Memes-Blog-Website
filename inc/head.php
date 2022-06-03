<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    $_SESSION['logged_in'] = false;
}
include 'func/db.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Meme Midterm 2022</title>
    </head>

<body>

<header>
  <!-- Fixed navbar -->


  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <div class="container">
      <a class="navbar-brand" href="#"><i class="fa fa-bomb mr-2" aria-hidden="true"></i>Meme Magic Midterm</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="memes.php">Memes</a>
          </li>
          <?php if($_SESSION['logged_in'] == true): ?>
                <li>
                <a class="nav-link" href="logout.php">Logout<span class="sr-only">(current)</span></a>
                </li>
            <?php else: ?>
                <li>
                <a class="nav-link" href="login.php"><i class="fa fa-user" aria-hidden="true"></i> Login<span class="sr-only">(current)</span></a>
                </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>