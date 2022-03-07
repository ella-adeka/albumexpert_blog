<?php
  include('includes/database.php');

  $creator_query = "SELECT * from blog_creators";
  $result = mysqli_query($conn, $creator_query);
  $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);

  include('includes/blog_db_skeleton.php');
?>
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
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <!-- logo -->
          <a class="navbar-brand font-weight-bold mb-0" href="index.html" title="Qurno">
            <img class="img-fluid" width="110" height="35" src="assets/images/logo.png" alt="Qurno">
          </a>

          <button class="search-toggle d-inline-block d-lg-none ms-auto me-1 me-sm-3" data-toggle="search" aria-label="Search Toggle">
            <span>Search</span>
            <svg width="22" height="22" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 15.5L19 19" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 11C5 14.3137 7.68629 17 11 17C12.6597 17 14.1621 16.3261 15.2483 15.237C16.3308 14.1517 17 12.654 17 11C17 7.68629 14.3137 5 11 5C7.68629 5 5 7.68629 5 11Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </button>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navHeader" aria-controls="navHeader" aria-expanded="false" aria-label="Toggle navigation">
            <i class="ti ti-menu-2 d-inline"></i>
            <i class="ti ti-x d-none"></i>
          </button>

          <div class="collapse navbar-collapse" id="navHeader">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item @@home">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item @@about">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item @@elements">
                <a class="nav-link" href="elements.html">Elements</a>
              </li>
              <li class="nav-item @@archive">
                <a class="nav-link" href="archive.html">Archive</a>
              </li>
              <li class="nav-item @@contact">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="author.html">Author</a></li>
                  <li><a class="dropdown-item" href="author-single.html">Author Single</a></li>
                  <li><a class="dropdown-item" href="tags.html">Tags</a></li>
                  <li><a class="dropdown-item" href="tag-single.html">Tag Single</a></li>
                  <li><a class="dropdown-item" href="categories.html">Categories</a></li>
                  <li><a class="dropdown-item" href="categories-single.html">Category Single</a></li>
                  <li><a class="dropdown-item" href="404-page.html">404 Page</a></li>
                  <li><a class="dropdown-item" href="privacy.html">Privacy</a></li>
                </ul>
              </li>
            </ul>
            
            <div class="navbar-right d-none d-lg-inline-block">
              <ul class="social-links list-unstyled list-inline">
                <li class="list-inline-item ms-4 d-none d-lg-inline-block">
                  <button class="search-toggle" data-toggle="search" aria-label="Search Toggle">
                    <span>Search</span>
                    <svg width="22" height="22" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M15.5 15.5L19 19" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path d="M5 11C5 14.3137 7.68629 17 11 17C12.6597 17 14.1621 16.3261 15.2483 15.237C16.3308 14.1517 17 12.654 17 11C17 7.68629 14.3137 5 11 5C7.68629 5 5 7.68629 5 11Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </button>
                </li>
              </ul>
            </div>
            
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>

<div class="search-block">
  <div data-toggle="search-close">
    <span class="ti ti-x text-primary"></span>
  </div>
  
  <input type="text" id="js-search-input" placeholder="Type to search blog.." aria-label="search-query">

  <div class="mt-4 card-meta">
    <p class="h4 mb-3">See posts by tags</p>
    <ul class="card-meta-tag list-inline">
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="tag-single.html">Life</a>
      </li>
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="tag-single.html">Lifestyle</a>
      </li>
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="tag-single.html">Lighting</a>
      </li>
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="tag-single.html">Machine</a>
      </li>
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="tag-single.html">Startups</a>
      </li>
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="tag-single.html">Work</a>
      </li>
    </ul>
  </div>

  <div class="mt-4 card-meta">
    <p class="h4 mb-3">See posts by categories</p>
    <ul class="card-meta-tag list-inline">
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="categorie-single.html">AI</a>
      </li>
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="categorie-single.html">Earth</a>
      </li>
      <li class="list-inline-item me-1 mb-2">
        <a class="small" href="categorie-single.html">Tech</a>
      </li>
    </ul>
  </div>
</div>

<section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="section-title h2 mb-3">
          <span>Author</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.html"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="author.html"><span>Author</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>


<section class="section-sm pt-0 mt-3">
  <div class='container'>
    <div class='row'>
      <div class='col-lg-10 mx-auto'>
        <div class='row gx-4 gy-5 gx-md-5 justify-content-center text-center'>
    
          <?php
            foreach ($blog_creators as $blog_creator){
              $author_name = "$blog_creator[first_name] $blog_creator[last_name]";
              
              foreach ($blogs as $blog){
                if ($blog["blog_creator_id"] === $blog_creator["creator_id"]) {
                  $blog_count = count($blog);
                }
              }
              echo("
                <div class='col-md-4 col-sm-6'>
                  <a class='d-inline-block is-hoverable' href='./author-single.php?author_id=".$blog_creator['creator_id']."'>
                    <img class='img-fluid rounded' src='./assets/images/uploaded_authors/$blog_creator[profile_photo_thumbnail]' alt='$blog_creator[first_name] $blog_creator[last_name]' width='150' height='150'>
                    <h4 class='text-dark mt-4 mb-1'>$author_name</h4>
                    <p class='mb-0'><span class='fw-bold text-black'>$blog_count</span> Published posts</p>
                  </a>
                </div>                
              ");
            };
          ?>
        
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
  <div class="row"><div class="col-12"><hr class="bg-primary"></div></div>
</div>

<section class="section-sm pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title">
          <span>Recent posts</span>
        </h2>
      </div>
    </div>
    <div class="row gy-5 gx-4 g-xl-5">
      <div class="col-lg-6">
        <article class="card post-card h-100 border-0 bg-transparent">
          <div class="card-body">
            <a class="d-block" href="blog-single.html" title="The AGI hype train is running out of steam">
              <div class="post-image position-relative">
                <img class="w-100 h-auto rounded" src="assets/images/blog/02.jpg" alt="The AGI hype train is running out of steam" width="970" height="500">
              </div>
            </a>
            <ul class="card-meta list-inline mb-3">
              <li class="list-inline-item mt-2">
                <i class="ti ti-calendar-event"></i>
                <span>05 Dec, 2021</span>
              </li>
              <li class="list-inline-item mt-2">—</li>
              <li class="list-inline-item mt-2">
                <i class="ti ti-clock"></i>
                <span>02 min read</span>
              </li>
            </ul>
            <a class="d-block" href="blog-single.html"
              title="The AGI hype train is running out of steam">
              <h3 class="mb-3 post-title">
                The AGI hype train is running out of steam
              </h3>
            </a>
            <p>The AGI hype train has hit some heavy traffic. While futurists and fundraisers used to make bullish predictions about artificial general intelligence, …</p>
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
                  <li class="list-inline-item small"><a href="tag-single.html">Machine</a></li>
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
              title="Creating an object that travels at 1% the speed of light?">
              <div class="post-image position-relative">
                <img class="w-100 h-auto rounded" src="assets/images/blog/03.jpg" alt="Creating an object that travels at 1% the speed of light?" width="970" height="500">
              </div>
            </a>
            <ul class="card-meta list-inline mb-3">
              <li class="list-inline-item mt-2">
                <i class="ti ti-calendar-event"></i>
                <span>17 Nov, 2021</span>
              </li>
              <li class="list-inline-item mt-2">—</li>
              <li class="list-inline-item mt-2">
                <i class="ti ti-clock"></i>
                <span>02 min read</span>
              </li>
            </ul>
            <a class="d-block" href="blog-single.html"
              title="Creating an object that travels at 1% the speed of light?">
              <h3 class="mb-3 post-title">
                Creating an object that travels at 1% the speed of light?
              </h3>
            </a>
            <p>Light is fast. In fact, it is the fastest thing that exists, and a law of the universe is that nothing can move faster than light. Light travels at …</p>
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
                  <li class="list-inline-item small"><a href="tag-single.html">Life</a></li>
                  <li class="list-inline-item small"><a href="tag-single.html">Lighting</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </article>
      </div>
      <div class="col-lg-6">
        <article class="card post-card h-100 border-0 bg-transparent">
          <div class="card-body">
            <a class="d-block" href="blog-single.html" title="Everything you wanted to know about the metaverse">
              <div class="post-image position-relative">
                <img class="w-100 h-auto rounded" src="assets/images/blog/04.jpg" alt="Everything you wanted to know about the metaverse" width="970" height="500">
              </div>
            </a>
            <ul class="card-meta list-inline mb-3">
              <li class="list-inline-item mt-2">
                <i class="ti ti-calendar-event"></i>
                <span>16 Nov, 2021</span>
              </li>
              <li class="list-inline-item mt-2">—</li>
              <li class="list-inline-item mt-2">
                <i class="ti ti-clock"></i>
                <span>01 min read</span>
              </li>
            </ul>
            <a class="d-block" href="blog-single.html"
              title="Everything you wanted to know about the metaverse">
              <h3 class="mb-3 post-title">
                Everything you wanted to know about the metaverse
              </h3>
            </a>
            <p>In the wake of Facebook rebranding as Meta, reflecting its focus on the “metaverse”, Microsoft has now announced it, too, will launch into this space. …</p>
          </div>
          <div class="card-footer border-top-0 bg-transparent p-0">
            <ul class="card-meta list-inline">
              <li class="list-inline-item mt-2">
                <a href="author-single.html" class="card-meta-author" title="Read all posts by - Emma Hazel">
                  <img class="w-auto" src="assets/images/author/emma-hazel.jpg" alt="Emma Hazel" width="26" height="26"> by <span>Emma</span>
                </a>
              </li>
              <li class="list-inline-item mt-2">•</li>
              <li class="list-inline-item mt-2">
                <ul class="card-meta-tag list-inline">
                  <li class="list-inline-item small"><a href="tag-single.html">Life</a></li>
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
            <a class="d-block" href="blog-single.html"
              title="Why developers are so divided over WordPress">
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
            <a class="d-block" href="blog-single.html"
              title="Why developers are so divided over WordPress">
              <h3 class="mb-3 post-title">
                Why developers are so divided over WordPress
              </h3>
            </a>
            <p>After seeing WordPress top the most dreaded platform on Stack Overflow’s Developer Survey for two years
              in a row (2019 and 2020), a few weeks ago we …</p>
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
      <div class="col-12 text-center">
        <a class="btn btn-primary mt-5" href="blog.html" aria-label="View all posts"><i class="ti ti-new-section me-2"></i>View all posts</a>
      </div>
    </div>
  </div>
</section>

<!-- start of footer -->
<footer>
  <div class="container">
    <div class="section">
      <div class="row justify-content-center align-items-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
          <!-- newsletter block -->
          <div class="newsletter-block">
            <h2 class="section-title text-center mb-4">Get latest posts delivered right to your inbox</h2>
            <form action="#!" method="post" novalidate>
              <div class="input-group flex-column flex-sm-row flex-nowrap flex-sm-nowrap">
                <input type="email" name="email" class="form-control required email w-auto text-center text-sm-start" placeholder="Your email address" aria-label="Subscription" required>
                <div class="input-group-append d-flex d-sm-inline-block mt-2 mt-sm-0 ms-0 w-auto">
                  <button type="submit" name="subscribe" id="mc-embedded-subscribe" class="input-group-text w-100 justify-content-center" aria-label="Subscription Button"><i class="ti ti-user-plus me-2"></i> Join today</button>
                </div>
              </div>
            </form>
          </div>
          <!-- newsletter block -->
        </div>
      </div>
    </div>
    <div class="pb-5">
      <div class="row g-2 g-lg-4 align-items-center">
        <div class="col-lg-6 text-center text-lg-start">
          <p class="mb-0 copyright-text content">&copy;2022 Qurno. All rights reserved.</p>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
          <ul class="list-inline footer-menu">
            <li class="list-inline-item m-0"><a href="privacy.html">Privacy Policy</a></li>
            <li class="list-inline-item m-0"><a href="404-page.html">404 Page</a></li>
          </ul>
        </div>
      </div>
    </div>
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