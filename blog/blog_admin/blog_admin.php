<?php

    require_once "../includes/database.php";
    $creator_query = "SELECT * from blog_creators";
    $result = mysqli_query($conn, $creator_query);
    $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);

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

<section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="section-title h2 mb-1">
          <span>Blog Admin</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-1">
          <li class="list-inline-item"><a href="../index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="blog_admin.php"><span>Admin</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<p> 
  <?php
      if (!empty($login_err)) {
          echo '<div class="alert alert-danger">'.$login_err.'</div>';
      }
  ?>
</p>

<section class='page-header mt-3'>
  <div class="container">
    <div class="row gy-5 justify-content-center">
      <?php
        if (!empty($blog_creators)) {
          echo ("
            <table class='table table-hover'>
              <thead class='thead-dark'>
                  <tr>
                      <th scope='col'>S/N</th>
                      <th scope='col'>Username</th>
                      <th scope='col'>Creator Name</th>
                      <th scope='col'>Register Date</th>
                      <th scope='col'>Activate/Deactivate</th>
                      <th scope='col'>Delete</th>
                  </tr>
              </thead>
              <tbody>
          ");
                  
          $creator = 1;
          foreach ($blog_creators as $blog_creator) {
            $full_name = $blog_creator['first_name'].' '.$blog_creator['last_name'];
            $isActive = $blog_creator['active_or_inactive'];
            $ActiveOrNot = (($isActive == 0) ? "<i class='fa-solid fa-xmark icon'></i>" : "<i class='fa-solid fa-check icon'></i>");

            echo("
              <tr>
                <th scope='row'>".$creator++."</th>
                <td>$blog_creator[username]</td>
                <td>$full_name</td>
                <td>$blog_creator[time_created]</td>
                <td class='tickBtn'><a class='activeState' href='activate_or_deactivate_creator.php?creator_id=$blog_creator[creator_id]'>$ActiveOrNot</a></td>
                <td><a class='delete' href='delete_creator.php?creator_id=$blog_creator[creator_id]'><i class='fa-solid fa-trash'></i></a></td>
              </tr>
            ");
          }
          
          echo ("
              </tbody>
            </table>
            <p>Blog Creator is active = <i class='fa-solid fa-check fs-3'></i> <br> Blog Creator is not active = <i class='fa-solid fa-xmark fs-3'></i></p>
          ");
        } else {
          echo ("
              <div class='row'>
                <div class='col-12 text-center'>
                  <p>
                    <span class=fs-2>No one has registered yet :(</span>
                  </p>
                </div>
              </div>
            ");
        }   
      ?>
    </div>
  </div>
</section>

<div class="container section-sm">
  <div class="row"><div class="col-12"></div></div>
</div>


<section class="section-sm">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        
      </div>
    </div>
  </div>
</section>

<!-- start of footer -->
<footer>
  <div class="container">
    <div >
      
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

<!-- Main Script -->
<script src="../assets/js/script.js"></script>
<script src="../assets/js/untick.js"></script>
<script src="https://kit.fontawesome.com/58fb59c662.js" crossorigin="anonymous"></script>


</body></html>