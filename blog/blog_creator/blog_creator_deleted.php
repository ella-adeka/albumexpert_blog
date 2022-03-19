<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <title>Qurno - Minimal Blog HTML Template</title>

  <meta name="author" content="Platol">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
  <meta name="description" content="Minimal Blog HTML Template">

  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">

  <!-- CSS Plugins -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Crete+Round&family=Work+Sans:wght@500;600&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/tabler-icons/tabler-icons.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="header-height-fix"></div>
<header class="header-nav">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php include('../includes/navbar_for_folders.php'); ?>
      </div>
    </div>
  </div>
</header>

<div class="search-block">
  <?php include('../includes/search_block_for_folders.php'); ?>
</div>

<section class="section-sm pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="text-center">
          <h1 class="page-not-found-title">Account deleted!</h1>
          <p class="mb-4">Your account has been deleted by the admin.</p>
          <a href="../index.php" class="btn btn-primary">Back to home</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- start of footer -->
<footer>
  <div class="container">
    <?php include('../includes/footer_for_folders.php'); ?>
  </div>
</footer>
<!-- end of footer -->

<!-- JS Plugins -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/lightense/lightense.min.js"></script>

<!-- Main Script -->
<script src="assets/js/script.js"></script>

</body></html>