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
          <span>Privacy Policy</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="privacy.php"><span>Privacy</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="content">
          <p><strong>Last updated on December 25, 2021</strong></p>
          <p>Below are our dummy <a href="#!">Privacy &amp; Policy</a>, which outline a lot of legal goodies, but the bottom line is it’s our aim to always take care of both you, as a customer, or as a seller on our platform.</p>
          
          <h3 id="licensing-policy">Licensing Policy</h3>
          <p>By visiting and/or taking any action on our template, you confirm that you are in agreement with and bound by the terms outlined below. These terms apply to the website, emails, or any other communication.</p>

          <h4 id="here-are-terms-of-our-standard-license">Here are terms of our Standard License:</h4>
          <ul>
            <li>The Standard License grants you a non-exclusive right to make use of template you have purchased.</li>
            <li>You are licensed to use the Item to create one End Product for yourself or for one client (a “single application”), and the End Product can be distributed for Free.</li>
          </ul>

          <h4 id="if-you-opt-for-an-extended-license">If you opt for an Extended License:</h4>
          <ul>
            <li>You are licensed to use the Item to create one End Product for yourself or for one client (a “single application”), and the End Product maybe sold or distributed for free.</li>
          </ul>

          <h3 id="additional-policy">Additional Policy</h3>
          <p>By visiting and/or taking any action on our template, you confirm that you are in agreement with and bound by the terms outlined below. These terms apply to the website, emails, or any other communication.</p>
          <ul>
            <li>You have 2 days to evaluate your purchase. If your purchase fails to meet expectations set by the seller, or is critically flawed in some way, contact Bootstrap Themes and we will issue a full refund pending a review.</li>
          </ul>
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