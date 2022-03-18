<?php
  session_start();

  if (!isset($_SESSION['creator_loggedin']) && $_SESSION['creator_loggedin'] == false ) {
    header ("location: blog_creator_login.php");
    exit;
  }  

  require_once '../includes/database.php';

  $creator_query = "SELECT * from blog_creators";
  $result = mysqli_query($conn, $creator_query);
  $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);

  foreach ($blog_creators as $blog_creator) {
    if ($_SESSION['creator_username'] === $blog_creator['username']) {
      $creator_id = $blog_creator['creator_id'];
      $blog_num = "SELECT * FROM blogs WHERE blog_creator_id = $creator_id";
      if ($result_2=mysqli_query($conn, $blog_num)) {         
        $blog_count=mysqli_num_rows($result_2);
      }
    }
  }

  include('../includes/blog_db_skeleton.php');
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
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <!-- logo -->
          <a class="navbar-brand font-weight-bold mb-0" href="index.html" title="Qurno">
            <img class="img-fluid" width="110" height="35" src="../assets/images/logo.png" alt="Qurno">
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
              <li class="nav-item active">
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

<!-- <section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="section-title h2 mb-1">
          <span>Your Profile</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-1">
          <li class="list-inline-item"><a href="../index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="blog_creator.php"><span>Profile</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section> -->

<section class='page-header section-sm'>
  <div class="container">
    <div class="row gy-5 justify-content-center">

      <?php
          $the_count = (($blog_count == 0) ? "no" : $blog_count);

          if (isset($_SESSION['creator_username'])) {
            foreach ($blog_creators as $blog_creator) {
              if ($_SESSION['creator_username'] === $blog_creator['username']) {
                $creator_img = "<img class='img-fluid rounded' src='../assets/images/uploaded_authors/$blog_creator[profile_photo_thumbnail]' alt='$blog_creator[first_name] $blog_creator[last_name]' width='300' height='300'>";
                $creator_name = $blog_creator['first_name'].' '.$blog_creator['last_name'];
              }
            }
          } 

         echo ("
         <div class='col-lg-10'>
            <div class='row g-4 g-lg-5 text-center text-lg-start justify-content-center justify-content-lg-start mb-4'>
                <div class='col-lg-3 col-md-6 col-sm-6 '>
                  <p class='text-center text-sm-start text-lg-start text-decoration-underline'><a href='edit_profile.php?creator_id=$blog_creator[creator_id]'>Edit Your Profile</a></p>
                </div>
                <div class='col-lg-9 col-md-6 col-sm-6 '>
                  <p class='text-center text-sm-end text-lg-end text-decoration-underline'><a href='blog_creator_logout.php'>Logout</a></p>
                </div>
            </div>
            <div class='row g-4 g-lg-5 text-center text-lg-start justify-content-center justify-content-lg-start'>
              <div class='col-lg-3 col-md-4 col-sm-5 col-6'>
                $creator_img
              </div>
              <div class='col-lg-9 col-md-12'>
                <h1 class='h3 text-dark mb-1'>$_SESSION[creator_username]</h1>
                <p>Full Name: <span class='fw-bold text-black'>$creator_name</span>.</p>
                <div class='content'>
                <p class='mb-2'>You have <span class='fw-bold text-black'>$the_count</span> Published posts.</p>
                  <p>Write your <a href='create_blog.php'>blog</a>.</p>
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


<section class="section-sm pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h2 class="section-title">
          <span>Your Blog Posts</span>
        </h2>
      </div>
    </div>
    <div class="container">
      <div class="row gy-5 gx-4 g-xl-5">
        <?php
          
          if ($blog_count == 0) {
            echo ("
              <div class='row'>
                <div class='col-12 text-center'>
                  <p>
                    <span>You have no posts :(</span>
                  </p>
                </div>
              </div>
            ");
          } else {
            if (isset($_SESSION['creator_username'])) {
              foreach ($blog_creators as $blog_creator) {
              foreach ($blogs as $blog) {
                $newData = json_decode($blog['blog_content'], true);
                $truncate = substr($newData['description'], 0, 255);
                if ($_SESSION['creator_username'] === $blog_creator['username'] && $blog["blog_creator_id"] === $blog_creator["creator_id"]) {
                  // if () {
                    $author_name = "$blog_creator[first_name] $blog_creator[last_name]";
                    $author_first_name = "$blog_creator[first_name]";
                    $author_img = "$blog_creator[profile_photo_thumbnail]";

                    echo ("
                      <div class='col-lg-6'>
                        <article class='card post-card h-100 border-0 bg-transparent'>
                          <div class='card-body'>
                            <a class='d-block'href='../blog-single.php?blog_id=".$blog['blog_id']."' title='$newData[title]'>
                              <div class='post-image position-relative'>
                                <img class='w-100 h-auto rounded' src='../assets/images/blog_images/".$newData['blogImage']."' alt='$newData[title]' width='970' height='500'>
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
                            <a class='d-block' href='../blog-single.php?blog_id=".$blog['blog_id']."' title='$newData[title]'><h3 class='mb-3 post-title'>
                            $newData[title]
                            </h3></a>
                            <p>$truncate ...</p>
                          </div>
                          <div class='card-footer border-top-0 bg-transparent p-0'>
                            <ul class='card-meta list-inline'>
                              <div class='row'>
                                <div class='col-7'>
                                  <li class='list-inline-item mt-2'>
                                    <a href='../author-single.php?author_id=".$blog['blog_creator_id']."' class='card-meta-author' title='Read all posts by - $blog[blog_creator_id]'>
                                      <img class='w-auto' src='../assets/images/uploaded_authors/$author_img' alt='$blog[blog_creator_id]' width='26' height='26'> by <span>$author_first_name</span>
                                    </a>
                                  </li>
                                  <li class='list-inline-item mt-2'>•</li>
                                  <li class='list-inline-item mt-2'>
                                    <ul class='card-meta-tag list-inline'>
                                      <li class='list-inline-item small'><a href='tag-single.php'>Machine</a></li>
                                    </ul>
                                  </li>
                                </div>
                                <div class='col-5 text-end'>
                                  <li class='list-inline-item mt-2'>
                                    <ul class='card-meta-tag list-inline'>
                                      <li class='list-inline-item medium'><a href='edit_blog.php?blog_id=$blog[blog_id]'><i class='fas fa-edit'></i> Edit</a></li>
                                      <li class='list-inline-item medium'><a href='delete_blog.php?blog_id=$blog[blog_id]' id='deleteBtn'><i class='fa fa-trash'></i> Delete</a></li>
                                    </ul>
                                  </li>
                                </div>
                              </div>
                            </ul>
                          </div>
                        </article>
                      </div>
                    ");
                  }
                }
              }
            }
          }
          
        ?>
      </div>
    </div>
  </div>
</section>

<!-- start of footer -->
<footer>
  <div class="container">
    <div class="section">
      
     
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
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/bootstrap.min.js"></script>
<script src="../plugins/lightense/lightense.min.js"></script>

<!-- Fontawesome -->
<script src="https://kit.fontawesome.com/58fb59c662.js" crossorigin="anonymous"></script>

<!-- Main Script -->
<script src="../assets/js/script.js"></script>

</body></html>