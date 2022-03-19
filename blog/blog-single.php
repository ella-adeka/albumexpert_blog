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
        <?php include('includes/navbar.php'); ?>
      </div>
    </div>
  </div>
</header>

<div class="search-block">
  <?php include('includes/search_block.php'); ?>
</div>

<section class="section-sm pb-0">
  <?php 
    echo("
      <div class='container'>
        <div class='row justify-content-center'>
    ");

    $blog_content = json_decode($row['blog_content'], true);
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