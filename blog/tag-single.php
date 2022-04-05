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
        <p class="mb-2">Showing posts from</p>
        <h1 class="section-title h2 mb-3">
          <span>Lifestyle</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="tags.php"><span>Tags</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="tag-single.php"><span>Lifestyle</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row gy-5 gx-4 g-xl-5">
    <div class="col-lg-6">
      <article class="card post-card h-100 border-0 bg-transparent">
        <div class="card-body">
          <a class="d-block" href="blog-single.html"
            title="How to hire a developer straight out of bootcamp — without getting burned">
            <div class="post-image position-relative">
              <img class="w-100 h-auto rounded" src="assets/images/blog/07.jpg" alt="How to hire a developer straight out of bootcamp — without getting burned" width="970" height="500">
            </div>
          </a>
          <ul class="card-meta list-inline mb-3">
            <li class="list-inline-item mt-2">
              <i class="ti ti-calendar-event"></i>
              <span>15 Nov, 2021</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-clock"></i>
              <span>03 min read</span>
            </li>
          </ul>
          <a class="d-block" href="blog-single.html"
            title="How to hire a developer straight out of bootcamp — without getting burned">
            <h3 class="mb-3 post-title">
              How to hire a developer straight out of bootcamp — without getting burned
            </h3>
          </a>
          <p>There’s a worldwide talent shortage in software development, and nearly one-third of hiring managers have
            hired someone from a coding bootcamp to help …
          </p>
        </div>
        <div class="card-footer border-top-0 bg-transparent p-0">
          <ul class="card-meta list-inline">
            <li class="list-inline-item mt-2">
              <a href="author-single.html" class="card-meta-author" title="Read all posts by - Chris Impey">
                <img class="w-auto" src="assets/images/author/chris-impey.jpg" alt="Chris Impey" width="26" height="26"> by <span>Chris</span>
              </a>
            </li>
            <li class="list-inline-item mt-2">•</li>
            <li class="list-inline-item mt-2">
              <ul class="card-meta-tag list-inline">
                <li class="list-inline-item small"><a href="tag-single.html">Lifestyle</a></li>
                <li class="list-inline-item small"><a href="tag-single.html">Startups</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </article>
    </div>
    
    <div class="col-lg-6">
      <article class="card post-card h-100 border-0 bg-transparent">
        <div class="card-body">
          <a class="d-block" href="blog-single.html" title="Why developers are so divided over WordPress">
            <div class="post-image position-relative">
              <img class="w-100 h-auto rounded" src="assets/images/blog/09.jpg" alt="Why developers are so divided over WordPress" width="970" height="500">
            </div>
          </a>
          <ul class="card-meta list-inline mb-3">
            <li class="list-inline-item mt-2">
              <i class="ti ti-calendar-event"></i>
              <span>12 Oct, 2020</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-clock"></i>
              <span>03 min read</span>
            </li>
          </ul>

          <a class="d-block" href="blog-single.html" title="Why developers are so divided over WordPress"><h3 class="mb-3 post-title">
            Why developers are so divided over WordPress
          </h3></a>
          <p>After seeing WordPress top the most dreaded platform on Stack Overflow’s Developer Survey for two years in a row (2019 and 2020), a few weeks ago we …</p>
        </div>
        <div class="card-footer border-top-0 bg-transparent p-0">
          <ul class="card-meta list-inline">
            <li class="list-inline-item mt-2">
              <a href="author-single.html" class="card-meta-author" title="Read all posts by - Thomas Macaulay">
                <img class="w-auto" src="assets/images/author/thomas-macaulay.jpg" alt="Thomas Macaulay" width="26" height="26">
                by <span>Thomas</span>
              </a>
            </li>
            <li class="list-inline-item mt-2">•</li>
            <li class="list-inline-item mt-2">
              <ul class="card-meta-tag list-inline">
                <li class="list-inline-item small"><a href="tag-single.html">Work</a></li>
                <li class="list-inline-item small"><a href="tag-single.html">Lifestyle</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </article>
    </div>
    
    <div class="col-lg-6">
      <article class="card post-card h-100 border-0 bg-transparent">
        <div class="card-body">
          <a class="d-block" href="blog-single.html"
            title="Why everyone is talking about ‘green steel’ at COP26">
            <div class="post-image position-relative">
              <img class="w-100 h-auto rounded" src="assets/images/blog/06.jpg" alt="Why everyone is talking about ‘green steel’ at COP26" width="970" height="500">
            </div>
          </a>
          <ul class="card-meta list-inline mb-3">
            <li class="list-inline-item mt-2">
              <i class="ti ti-calendar-event"></i>
              <span>14 Sep, 2020</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-clock"></i>
              <span>03 min read</span>
            </li>
          </ul>
          <a class="d-block" href="blog-single.html"
            title="Why everyone is talking about ‘green steel’ at COP26">
            <h3 class="mb-3 post-title">
              Why everyone is talking about ‘green steel’ at COP26
            </h3>
          </a>
          <p>Among the rhetoric of climate change bingo and platitudes, there’s a term I’ve been hearing a lot at COP26 this week — green steel. But what is it, …</p>
        </div>
        <div class="card-footer border-top-0 bg-transparent p-0">
          <ul class="card-meta list-inline">
            <li class="list-inline-item mt-2">
              <a href="author-single.html" class="card-meta-author" title="Read all posts by - Thomas Macaulay">
                <img class="w-auto" src="assets/images/author/thomas-macaulay.jpg" alt="Thomas Macaulay" width="26" height="26"> by <span>Thomas</span>
              </a>
            </li>
            <li class="list-inline-item mt-2">•</li>
            <li class="list-inline-item mt-2">
              <ul class="card-meta-tag list-inline">
                <li class="list-inline-item small"><a href="tag-single.html">Lifestyle</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </article>
    </div>
    
    <div class="col-lg-6">
      <article class="card post-card h-100 border-0 bg-transparent">
        <div class="card-body">
          <a class="d-block" href="blog-single.html" title="I work 5 hours a day, and I’ve never been more productive">
            <div class="post-image position-relative">
              <img class="w-100 h-auto rounded" src="assets/images/blog/08.jpg" alt="I work 5 hours a day, and I’ve never been more productive" width="970" height="500">
            </div>
          </a>
          <ul class="card-meta list-inline mb-3">
            <li class="list-inline-item mt-2">
              <i class="ti ti-calendar-event"></i>
              <span>12 Aug, 2020</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-clock"></i>
              <span>03 min read</span>
            </li>
          </ul>

          <a class="d-block" href="blog-single.html" title="I work 5 hours a day, and I’ve never been more productive"><h3 class="mb-3 post-title">
            I work 5 hours a day, and I’ve never been more productive
          </h3></a>
          <p>Something’s very wrong with the traditional 9 to 5: it doesn’t work. Scandinavian countries dominate the World Happiness Report — Norway being the …</p>
        </div>
        <div class="card-footer border-top-0 bg-transparent p-0">
          <ul class="card-meta list-inline">
            <li class="list-inline-item mt-2">
              <a href="author-single.html" class="card-meta-author" title="Read all posts by - Chris Impey">
                <img class="w-auto" src="assets/images/author/chris-impey.jpg" alt="Chris Impey" width="26" height="26">
                by <span>Chris</span>
              </a>
            </li>
            <li class="list-inline-item mt-2">•</li>
            <li class="list-inline-item mt-2">
              <ul class="card-meta-tag list-inline">
                <li class="list-inline-item small"><a href="tag-single.html">Work</a></li>
                <li class="list-inline-item small"><a href="tag-single.html">Lifestyle</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </article>
    </div>
    
    <div class="col-lg-6">
      <article class="card post-card h-100 border-0 bg-transparent">
        <div class="card-body">
          <a class="d-block" href="blog-single.html" title="Gig startups want you to believe they can replace your job — don’t fall for it">
            <div class="post-image position-relative">
              <img class="w-100 h-auto rounded" src="assets/images/blog/05.jpg" alt="Gig startups want you to believe they can replace your job — don’t fall for it" width="970" height="500">
            </div>
          </a>
          <ul class="card-meta list-inline mb-3">
            <li class="list-inline-item mt-2">
              <i class="ti ti-calendar-event"></i>
              <span>09 Feb, 2019</span>
            </li>
            <li class="list-inline-item mt-2">—</li>
            <li class="list-inline-item mt-2">
              <i class="ti ti-clock"></i>
              <span>03 min read</span>
            </li>
          </ul>

          <a class="d-block" href="blog-single.html" title="Gig startups want you to believe they can replace your job — don’t fall for it"><h3 class="mb-3 post-title">
            Gig startups want you to believe they can replace your job — don’t fall for it
          </h3></a>
          <p>Don’t quit your day job just yet. That’s the message that should be implied — if not explicitly stated — to every applicant of every gig and creator …</p>
        </div>
        <div class="card-footer border-top-0 bg-transparent p-0">
          <ul class="card-meta list-inline">
            <li class="list-inline-item mt-2">
              <a href="author-single.html" class="card-meta-author" title="Read all posts by - Chris Impey">
                <img class="w-auto" src="assets/images/author/chris-impey.jpg" alt="Chris Impey" width="26" height="26">
                by <span>Chris</span>
              </a>
            </li>
            <li class="list-inline-item mt-2">•</li>
            <li class="list-inline-item mt-2">
              <ul class="card-meta-tag list-inline">
                <li class="list-inline-item small"><a href="tag-single.html">Lifestyle</a></li>
                <li class="list-inline-item small"><a href="tag-single.html">Startups</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </article>
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