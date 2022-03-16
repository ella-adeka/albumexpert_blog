<?php
  // start a new session
  session_start();

  // If user is not logged, redirect to login page.
  if (!isset($_SESSION['creator_loggedin']) && $_SESSION['creator_loggedin'] == false) {
    header ("location: blog_creator_login.php");
    exit;
  }  

  // Add database file
  require_once '../includes/database.php';
  // require_once '../includes/blog_db_skeleton.php';

  // Blog Creators query
  $creator_query = "SELECT * from blog_creators";
  $result = mysqli_query($conn, $creator_query);
  $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);

  // To count the blogs created by each creator
  foreach ($blog_creators as $blog_creator) {
    if ($_SESSION['creator_username'] === $blog_creator['username']) {
      $creator_id = $blog_creator['creator_id'];
      $blog_num = "SELECT * FROM blogs WHERE blog_creator_id = $creator_id";
      if ($result_2=mysqli_query($conn, $blog_num)) {         
        $blog_count=mysqli_num_rows($result_2);
      }
    }
  }

  // Initialize variables
  $title = $description = $blog_image = "";
  $title_err = $description_err = $blog_image_err = "";

  // Procession the form data on submit
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate title
    if (empty(trim($_POST["title"]))) {
      $title_err = "Please enter a title";
    } else {
      $title = trim($_POST["title"]);
    }

    // Validate description
    if (empty(trim($_POST["description"]))) {
      $description_err = "Please enter a description";
    } else {
      $description = trim($_POST["description"]);
    }

    // Validate image
    if (isset($_FILES["blog_image"])) {
      $blog_img_name = $_FILES['blog_image']['name'];
      $blog_img_tmp_name = $_FILES['blog_image']['tmp_name'];
      $img_extension = pathinfo($blog_img_name, PATHINFO_EXTENSION);
      $img_extension_lowercase = strtolower($img_extension);

      $allowed_extensions = array("gif", "png", "jpg", "jpeg");
      if (in_array($img_extension_lowercase, $allowed_extensions)) {
        $blog_image = uniqid("IMG-", true).'.'.$img_extension_lowercase;
        $file_path = '../assets/images/blog_images/'.$blog_image;
        move_uploaded_file($blog_img_tmp_name, $file_path);
      } else {
        $blog_image_err = "Please upload an image in either .png, .gif, .jpg, or .jpeg";
      }
      
    } else {
      $blog_image_err = "Please upload a photo";
    }
    
    // Check input erors brfore inserting into the database
    if (empty($title_err) && empty($description_err) && empty($blog_image_err)) {

      // $date = date("Y-m-d");
      $time = date("Y-m-d");
      $article = array('title'=> $title, 'description'=>$description, 'blogImage'=>$blog_image);
      // if (is_array($article)) {
      $data = serialize($article);
        
      // Insert serialize data into row
      $sql = "INSERT INTO blogs (blog_creator_id, time_created, blog_content) VALUES ($creator_id, '$time', ?)";
      

      if ($stmt = mysqli_prepare($conn, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "s", $param_data);

        // Set parameters
        $param_data = $data;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Redirect to blog page
          header("location: blog_creator.php");
        } else {
          echo ("Something went wong. Please try again later.");
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
      }
    }
    
  }

  
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
        <h1 class="section-title h2 mb-3">
          <span>Create Your Blog</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="../index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="create_blog.php"><span>Create Blog</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row gy-5 justify-content-center">
      
      <div class="col-lg-4 col-md-10 ms-lg-auto me-lg-0 me-auto">
        <div class="mb-5">
          <?php
            if (isset($_SESSION['creator_username'])) {
              foreach ($blog_creators as $blog_creator) {
                if ($_SESSION['creator_username'] == $blog_creator['username']) {
                  $creator_img = "<img class='img-fluid rounded mb-4' src='../assets/images/uploaded_authors/$blog_creator[profile_photo_thumbnail]' alt='$blog_creator[first_name] $blog_creator[last_name]' width='250' height='250'>";
                  $creator_name = $blog_creator['first_name'].' '.$blog_creator['last_name'];
                }
              }
            }
            echo ("
              <h2 class='h3 mb-3'>Your Profile</h2>
              $creator_img
              <p class='mb-0'>Username: <span class='fw-bold text-bold'> $_SESSION[creator_username]</span></p>
              <p class='mb-0'>Name:<span class='fw-bold text-bold'> $creator_name </span></p>
              <p class='mb-0'>Blogs Created:<span class='fw-bold text-bold'> $blog_count </span></p>
            ");
          ?>
        </div>
      </div>
      
      <div class="col-lg-8 me-lg-auto ms-lg-0 ms-auto">
        <h2 class="h3 mb-4">Create Your Blog</h2>

        <form id="create_form_blog" class="row g-4" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" enctype="multipart/form-data">
          <div class='col-md-12'>
            <input type='text' class='form-control' placeholder='Title' name='title' required>
          </div>
          <div class='col-md-12'>
            <textarea class='form-control' placeholder='Description' rows='4' name='description' required></textarea>
          </div>
          <!-- <div class='col-md-12'>
            <select name='Tags' id='tag'>
                <option value=''>Choose Tags</option>
                <option value='Machine'>Machine</option>
                <option value='Life'>Life</option>
            </select>
          </div> -->
          <div class='col-md-12'>
            <input type='file' name='blog_image' id='blog_image' required>
          </div>
          <div class='col-12'>
            <button type='submit' class='btn btn-primary' aria-label='Post Blog'>Post <i class='ti ti-brand-telegram ms-1'></i></button>
          </div>
        </form>
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
<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/bootstrap.min.js"></script>
<script src="../plugins/lightense/lightense.min.js"></script>

<!-- Main Script -->
<script src="../assets/js/script.js"></script>

</body></html>