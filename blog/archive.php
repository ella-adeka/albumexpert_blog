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
          <span>Archive</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="archive.php"><span>Archive</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-10 mx-auto">
        <div class="archive-block">
            <h2><i class="ti ti-archive"></i>2021</h2>
            <p class="archive-post-item">05 Dec<span>•</span><a href="blog-single.html">The AGI hype train is running out of steam</a></p>
            <p class="archive-post-item">17 Nov<span>•</span><a href="blog-single.html">Creating an object that travels at 1% the speed of light?</a></p>
            <p class="archive-post-item">16 Nov<span>•</span><a href="blog-single.html">Everything you wanted to know about the metaverse</a></p>
            <p class="archive-post-item">15 Nov<span>•</span><a href="blog-single.html">How to hire a developer straight out of bootcamp — without getting burned</a></p>

            <h2><i class="ti ti-archive"></i>2020</h2>
            <p class="archive-post-item">12 Oct<span>•</span><a href="blog-single.html">Why developers are so divided over WordPress</a></p>
            <p class="archive-post-item">14 Sep<span>•</span><a href="blog-single.html">Why everyone is talking about ‘green steel’ at COP26</a></p>
            <p class="archive-post-item">12 Aug<span>•</span><a href="blog-single.html">I work 5 hours a day, and I’ve never been more productive</a></p>

            <h2><i class="ti ti-archive"></i>2019</h2>
            <p class="archive-post-item">09 Feb<span>•</span><a href="blog-single.html">Gig startups want you to believe they can replace your job — don’t fall for it</a></p>
            <p class="archive-post-item">10 Jan<span>•</span><a href="blog-single.html">3 reasons why sodium-ion batteries may dethrone lithium</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

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