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

  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/tabler-icons/tabler-icons.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="header-height-fix"></div>
<header class="header-nav">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php include('includes/navbar.php'); ?>
      </div>
    </div>
  </div>
</header>

<div class="search-block">
  <?php include('includes/search_block.php'); ?>
</div>

<section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="section-title h2 mb-3">
          <span>Tags</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="tags.php"><span>Tags</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row g-4 justify-content-center text-center">
    <div class="col-lg-4 col-sm-6">
      <a class="p-4 rounded bg-white d-block is-hoverable" href="tag-single.html">
        <span class="h3"><i class="ti ti-tags mb-2"></i></span>
        <span class="h4 mt-2 mb-3 d-block"> Life</span>
        Total 2 posts
      </a>
    </div>
    
    <div class="col-lg-4 col-sm-6">
      <a class="p-4 rounded bg-white d-block is-hoverable" href="tag-single.html">
        <span class="h3"><i class="ti ti-tags mb-2"></i></span>
        <span class="h4 mt-2 mb-3 d-block"> Lifestyle</span>
        Total 5 posts
      </a>
    </div>
    
    <div class="col-lg-4 col-sm-6">
      <a class="p-4 rounded bg-white d-block is-hoverable" href="tag-single.html">
        <span class="h3"><i class="ti ti-tags mb-2"></i></span>
        <span class="h4 mt-2 mb-3 d-block"> Lighting</span>
        Total 1 posts
      </a>
    </div>
    
    <div class="col-lg-4 col-sm-6">
      <a class="p-4 rounded bg-white d-block is-hoverable" href="tag-single.html">
        <span class="h3"><i class="ti ti-tags mb-2"></i></span>
        <span class="h4 mt-2 mb-3 d-block"> Machine</span>
        Total 2 posts
      </a>
    </div>
    
    <div class="col-lg-4 col-sm-6">
      <a class="p-4 rounded bg-white d-block is-hoverable" href="tag-single.html">
        <span class="h3"><i class="ti ti-tags mb-2"></i></span>
        <span class="h4 mt-2 mb-3 d-block"> Startups</span>
        Total 2 posts
      </a>
    </div>
    
    <div class="col-lg-4 col-sm-6">
      <a class="p-4 rounded bg-white d-block is-hoverable" href="tag-single.html">
        <span class="h3"><i class="ti ti-tags mb-2"></i></span>
        <span class="h4 mt-2 mb-3 d-block"> Work</span>
        Total 2 posts
      </a>
    </div>
  </div>
</div>

<!-- start of footer -->
<footer>
  <div class="container">
    <?php include('includes/footer.php'); ?>
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