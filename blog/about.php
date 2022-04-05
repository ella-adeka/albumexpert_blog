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
          <span>About</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="about.php"><span>About</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 text-center">
        <h2 class="text-dark mb-0">We are the Qurno, <br> Team of content writers and designers.</h2>
      </div>
    </div>
    
    <div class="py-5 my-3">
      <div class="row g-4 justify-content-center text-center">
        <div class="col-lg-6 image-grid-1">
          <img class="w-100 h-auto rounded" src="assets/images/about/01.jpg" alt="" width="620" height="346">
        </div>
        
        <div class="col-lg-3 col-6 image-grid-2">
          <img class="img-fluid rounded" src="assets/images/about/00.jpg" alt="" width="460" height="515">
        </div>
        
        <div class="col-lg-3 col-6 image-grid-3">
          <img class="img-fluid rounded" src="assets/images/about/02.jpg" alt="" width="460" height="444">
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-10 text-center">
        <div class="content">
          <p>If ever a place existed where you could just go crazy creatively, it is definitely your about page. It’s your chance to show your readers who you really are. Pictures, quotes, inspirational graphics, whatever it is that drives you.. Display it here in a way that only you can.</p>
          <p>I’ve included a plugin in the setup of this theme that will make adding columns to your pages and posts a piece of cake. Let creativity take control, and forget about the technical end of things, I’ve got your six.</p>
        </div>
      </div>
    </div>
    
    <div class="section-sm pb-0">
      <div class="row justify-content-center">
        <div class="col-lg-10 text-center">
          <h2 class="section-title">
            <span>Our writers</span>
          </h2>
  
          <div class="row gx-4 gy-5 gx-md-5 justify-content-center text-center">
            
            <div class="col-md-4 col-sm-6">
              <a class="d-inline-block is-hoverable" href="author-single.html">
                <img class="img-fluid rounded" src="assets/images/author/chris-impey.jpg" alt="Chris Impey" width="150" height="150">
                <h4 class="text-dark mt-4 mb-1">Chris Impey</h4>
                <p class="mb-0"><span class="fw-bold text-black">04</span> Published posts</p>
              </a>
            </div>
            
            <div class="col-md-4 col-sm-6">
              <a class="d-inline-block is-hoverable" href="author-single.html">
                <img class="img-fluid rounded" src="assets/images/author/emma-hazel.jpg" alt="Emma Hazel" width="150" height="150">
                <h4 class="text-dark mt-4 mb-1">Emma Hazel</h4>
                <p class="mb-0"><span class="fw-bold text-black">02</span> Published posts</p>
              </a>
            </div>
            
            <div class="col-md-4 col-sm-6">
              <a class="d-inline-block is-hoverable" href="author-single.html">
                <img class="img-fluid rounded" src="assets/images/author/thomas-macaulay.jpg" alt="Thomas Macaulay" width="150" height="150">
                <h4 class="text-dark mt-4 mb-1">Thomas Macaulay</h4>
                <p class="mb-0"><span class="fw-bold text-black">03</span> Published posts</p>
              </a>
            </div>
          </div>
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