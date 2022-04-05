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
          <span>Contact</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.html"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="contact.html"><span>Contact</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row gy-5 justify-content-center">
      
      <div class="col-lg-5 col-md-10 ms-lg-auto me-lg-0 me-auto">
        <div class="mb-5">
          <h2 class="h3 mb-3">Contact Qurno</h2>
          <p class="mb-0">I&rsquo;m here to help and answer any question you might have. I look forward to hearing from you</p>
        </div>
        <div>
          <h2 class="h4 mb-3">Hate forms? <br> Write an email or make a call</h2>
          <p class="mb-2 content">
            <i class="ti ti-mail-forward me-2 d-inline-block mb-0" style="transform:translateY(2px)"></i> <a href="mailto:contact@qurno.com">contact@qurno.com</a></p>
          <p class="mb-0 content"><i class="ti ti-phone me-2"></i> +98 02 296 4902</p>
        </div>
      </div>
      
      <div class="col-lg-5 me-lg-auto ms-lg-0 ms-auto">
        <h2 class="h3 mb-4">Contact form</h2>

        <form class="row g-4" action="#!" method="post">
          <div class="col-md-12">
            <textarea class="form-control" placeholder="Ask question or just say Hi" rows="4" name="message" required></textarea>
          </div>
          <div class="col-md-12">
            <input type="email" class="form-control" placeholder="Email address" name="email" required>
          </div>
          <div class="col-md-12">
            <input type="text" class="form-control" placeholder="Your name here" name="name" required>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary" aria-label="Send Message">Send <i class="ti ti-brand-telegram ms-1"></i></button>
          </div>
        </form>
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