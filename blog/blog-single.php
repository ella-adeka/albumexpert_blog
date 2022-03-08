<?php 
  include('includes/database.php');
  if (isset($_GET['blog_id'])) {
    $blog_id= $_GET['blog_id'];
    $sql = "SELECT * FROM blogs WHERE blog_id = $blog_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
  }
  
    // $creator_id= $_GET['creator_id'];
    $creator_query = "SELECT * from blog_creators WHERE creator_id = $row[blog_creator_id]";
    $result = mysqli_query($conn, $creator_query);
    $blog_creator = mysqli_fetch_assoc($result);
  
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

<section class="section-sm pb-0">
  <?php 
    echo("
      <div class='container'>
        <div class='row justify-content-center'>
    ");

    $blog_content = unserialize($row['blog_content']);
    $author_name = "$blog_creator[first_name] $blog_creator[last_name]";
  
        echo("
          <div class='col-lg-10'>
            <div class='mb-5'>
              <h3 class='h1 mb-4 post-title'>$blog_content[title]</h3>

              <ul class='card-meta list-inline mb-2'>
                <li class='list-inline-item mt-2'>
                  <a href='./author-single.php?author_id=".$blog_creator['creator_id']."' class='card-meta-author' title='Read all posts by - $blog_creator[first_name]'>
                    <img class='w-auto' src='assets/images/uploaded_authors/$blog_creator[profile_photo_thumbnail]' alt='$blog_creator[first_name]' width='26' height='26'> by <span>$blog_creator[first_name]</span>
                  </a>
                </li>
                <li class='list-inline-item mt-2'>—</li>
                <li class='list-inline-item mt-2'>
                  <i class='ti ti-clock'></i>
                  <span>02 min read</span>
                </li>
                <li class='list-inline-item mt-2'>—</li>
                <li class='list-inline-item mt-2'>
                  <i class='ti ti-calendar-event'></i>
                  <span>$row[time_created]</span>
                </li>
              </ul>
            </div>
        </div>
        <div class='col-lg-12'>
          <div class='mb-5 text-center'>
            <img class='w-100 h-auto rounded' src='assets/images/blog_images/".$blog_content['blogImage']."' alt='$blog_content[title]' width='970' height='500'>
          </div>
        </div>
        <div class='col-lg-2 post-share-block order-1 order-lg-0 mt-5 mt-lg-0'>
          <div class='position-sticky' style='top:150px'>
            <span class='d-inline-block mb-3 small'>SHARE</span>
            <ul class='social-share icon-box'>
              <li class='d-inline-block d-lg-block me-2 mb-2' onclick='return tbs_click()'><i class='ti ti-brand-twitter'></i></li>
              <li class='d-inline-block d-lg-block me-2 mb-2' onclick='return fbs_click()'><i class='ti ti-brand-facebook'></i></li>
              <li class='d-inline-block d-lg-block me-2 mb-2' onclick='return ins_click()'><i class='ti ti-brand-linkedin'></i></li>
              <li class='d-inline-block d-lg-block me-2 mb-2' onclick='return red_click()'><i class='ti ti-brand-reddit'></i></li>
              <li class='d-inline-block d-lg-block me-2 mb-2' onclick='return pin_click()'><i class='ti ti-brand-pinterest'></i></li>
            </ul>
          </div>
          
        </div>
        <div class='col-lg-8 post-content-block order-0 order-lg-2'>
          <div class='content'>
            <p>$blog_content[description]</p>
          </div>

          <ul class='post-meta-tag list-unstyled list-inline mt-5'>
            <li class='list-inline-item'>Tags: </li>
            <li class='list-inline-item'><a class='bg-white' href='tag-single.html'>Machine</a></li>
          </ul>
        </div>
      </div>

      
      <div class='single-post-author'>
        <div class='row justify-content-center'>
          <div class='col-lg-10'>
            <div class='d-block d-md-flex'>
              <a href='./author-single.php?author_id=".$blog_creator['creator_id']."'>
                <img class='rounded mr-4' src='assets/images/uploaded_authors/$blog_creator[profile_photo_thumbnail]' alt=$author_name width='155' height='155'>
              </a>
              <div class='ms-0 ms-md-4 ps-0 ps-md-3 mt-4 mt-md-0'>
                <h3 class='h4 mb-3'><a href='./author-single.php?author_id=".$blog_creator['creator_id']."' class='text-dark'>$author_name</a></h3>
                <p>$author_name is a writer based in New York City. He's interested in all things tech, science, and photography related, and likes to yo-yo in his free time. …</p>
                <div class='content'><a href='./author-single.php?author_id=".$blog_creator['creator_id']."'>See all posts by this author <i class='ti ti-arrow-up-right'></i></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
        ");
      // }
    // }
    echo("    
   </div> 
  </div>
    ");

    
  ?>
  
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