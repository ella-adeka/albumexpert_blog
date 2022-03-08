<?php
  session_start();
  include('includes/database.php');

  if (isset($_GET['author_id'])) {
    $creator_id = $_GET['author_id'];
    $sql = "SELECT * FROM blog_creators WHERE creator_id = $creator_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
  } 
  
  $creator_query = "SELECT * from blog_creators";
  $result = mysqli_query($conn, $creator_query);
  $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);

  if ($creator_id === $row["creator_id"]){
    $admin_id = $row['creator_id'];
    $blog_num = "SELECT * FROM blogs WHERE blog_creator_id = $admin_id";
    if ($result_2=mysqli_query($conn, $blog_num)) {         
      $blog_count=mysqli_num_rows($result_2);
    }
  }
  
  include('includes/blog_db_skeleton.php');
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="utf-8">
  <title>Qurno - Minimal Blog HTML Template</title>

  <meta name="row" content="Platol">
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
                  <li><a class="dropdown-item" href="row.html">Author</a></li>
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

<section class='page-header section-sm'>
  <div class='container'>
    <div class='row justify-content-center'>
      <?php
        
        $author_full_name = $row['first_name']. " ".$row['last_name'];
        $the_count = (($blog_count == 0) ? "no" : $blog_count);

        echo("
            <div class='col-lg-10'>
            <div class='row g-4 g-lg-5 text-center text-lg-start justify-content-center justify-content-lg-start'>
              <div class='col-lg-3 col-md-4 col-sm-5 col-6'>
                <img class='img-fluid rounded' src='assets/images/uploaded_authors/$row[profile_photo_thumbnail]' alt=$author_full_name width='250' height='250'>
              </div>
              <div class='col-lg-9 col-md-12'>
                <p class='mb-2'><span class='fw-bold text-black'>$the_count</span> Published posts</p>
                <h1 class='h3 text-dark mb-3'>$author_full_name</h1>
                <div class='content'>
                  <p>$row[first_name] is a writer based in New York City. He&rsquo;s interested in all things tech, science, and photography related, and likes to yo-yo in his free time.</p>
                  <p>Follow him <a target='_blank' href='https://twitter.com/thomas-macaulay'>on Twitter</a>.</p>
                </div>
              </div>
            </div>
          </div>
        ");     
      ?>
    </div>
  </div>
</section>

<div class="container">
  <div class="row"><div class="col-12"><hr class="bg-primary"></div></div>
</div>

<section class='page-header section-sm'>
  <div class="container">
  <div class="row gy-5 gx-4 g-xl-5">
    <?php
      
      if ($blog_count == 0) {
        echo ("
          <div class='row'>
            <div class='col-12 text-center'>
              <p>
                <span>There are no posts</span>
              </p>
            </div>
          </div>
        ");
      } else {
        foreach ($blogs as $blog) {

          $newData = unserialize($blog['blog_content']);
          $truncate = substr($newData['description'], 0, 255);
          if ($blog["blog_creator_id"] === $row["creator_id"]) {
            $author_name = "$row[first_name] $row[last_name]";
            $author_first_name = "$row[first_name]";
            $author_img = "$row[profile_photo_thumbnail]";
  
            echo ("
              <div class='col-lg-6'>
                <article class='card post-card h-100 border-0 bg-transparent'>
                  <div class='card-body'>
                    <a class='d-block'href='./blog-single.php?blog_id=".$blog['blog_id']."' title='$newData[title]'>
                      <div class='post-image position-relative'>
                        <img class='w-100 h-auto rounded' src='assets/images/blog_images/".$newData['blogImage']."' alt='$newData[title]' width='970' height='500'>
                      </div>
                    </a>
                    <ul class='card-meta list-inline mb-3'>
                      <li class='list-inline-item mt-2'>
                        <i class='ti ti-calendar-event'></i>
                        <span>$blog[time_created]</span>
                      </li>
                      <li class='list-inline-item mt-2'>—</li>
                      <li class='list-inline-item mt-2'>
                        <i class='ti ti-clock'></i>
                        <span>03 min read</span>
                      </li>
                    </ul>
                    <a class='d-block' href='./blog-single.php?blog_id=".$blog['blog_id']."' title='$newData[title]'><h3 class='mb-3 post-title'>
                    $newData[title]
                    </h3></a>
                    <p>$truncate ...</p>
                  </div>
                  <div class='card-footer border-top-0 bg-transparent p-0'>
                    <ul class='card-meta list-inline'>
                      <li class='list-inline-item mt-2'>
                        <a href='./author-single.php?author_id=".$blog['blog_creator_id']."' class='card-meta-author' title='Read all posts by - $blog[blog_creator_id]'>
                          <img class='w-auto' src='assets/images/uploaded_authors/$author_img' alt='$blog[blog_creator_id]' width='26' height='26'> by <span>$author_first_name</span>
                        </a>
                      </li>
                      <li class='list-inline-item mt-2'>•</li>
                      <li class='list-inline-item mt-2'>
                        <ul class='card-meta-tag list-inline'>
                          <li class='list-inline-item small'><a href='tag-single.php'>Machine</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </article>
              </div>
            ");
          }
        }
      }
      
    ?>
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