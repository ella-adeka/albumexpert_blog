<?php 
  include('includes/database.php');

  $creator_query = "SELECT * from blog_creators";
  $result = mysqli_query($conn, $creator_query);
  $blog_creators = mysqli_fetch_all($result, MYSQLI_ASSOC);

  $tag_query = "SELECT * from blog_tags";
  $result = mysqli_query($conn, $tag_query);
  $blog_tags = mysqli_fetch_all($result, MYSQLI_ASSOC);
 
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
          <span>All posts</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="blog.php"><span>All posts</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<?php   
  if (empty($blogs)) {
    echo ("
      <div class='row'>
        <div class='col-12 text-center'>
          <p>
            <span class='fs-3'>No blogs have been written yet :(</span>
          </p>
        </div>
      </div>
    ");
  } else {
      echo("
      <div class='container'>
        <div class='row gy-5 gx-4 g-xl-5'>
        
    ");
      
    foreach ($blogs as $blog){
      
      if (isset($blog['blog_creator_id'])) {
        $newData = json_decode($blog['blog_content'], true);

      $truncate = substr($newData['description'], 0, 255);

      foreach ($blog_creators as $blog_creator){
        if ($blog["blog_creator_id"] === $blog_creator["creator_id"]) {
          $author_name = "$blog_creator[first_name] $blog_creator[last_name]";
          $author_first_name = "$blog_creator[first_name]";
          $author_img = "$blog_creator[profile_photo_thumbnail]";
        } 
      }
      echo("
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
      } else {
        echo "";
      }
      
    }

    echo("
        <div class='col-12'>
          <!-- pagination -->
          <nav class='text-center mt-5'>
            <ul class='pagination justify-content-center border border-white rounded d-inline-flex'>
              <li class='page-item'><a class='page-link rounded w-auto px-4' href='blog.html' aria-label='Pagination Arrow'>Prev</a></li>
              <li class='page-item active '>
                <a href='blog.php' class='page-link rounded'>1</a>
              </li>
              <li class='page-item'>
                <a href='blog.php' class='page-link rounded'>2</a>
              </li>
              <li class='page-item mt-2 mx-2'>...</li>
              <li class='page-item'><a class='page-link rounded' href='blog.html' aria-label='Pagination Arrow'>16</a></li>
              <li class='page-item'><a class='page-link rounded w-auto px-4' href='blog.html' aria-label='Pagination Arrow'>Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    ");
  }
?>

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