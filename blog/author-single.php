<?php
  session_start();
  include('includes/database.php');

  $scriptName = basename($_SERVER['PHP_SELF']);
  
  if (isset($_GET['author_id'])) {
    $creator_id = $_GET['author_id'];
    $sql = "SELECT * FROM blog_creators WHERE creator_id = $creator_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
  } else{
    header("location: author.php");
    exit('Error in '.$scriptName.'. The condition if (isset($_GET[author_id)) was not met');
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
        <?php include('includes/navbar.php'); ?>
      </div>
    </div>
  </div>
</header>

<div class="search-block">
  <?php include('includes/search_block.php'); ?>
</div>

<section class='page-header section-sm'>
  <div class='container'>
    <div class='row justify-content-center'>
      <?php
        
        $author_full_name = $row['first_name']. " ".$row['last_name'];
        $the_count = (($blog_count === 0) ? "no" : $blog_count);

        echo("
            <div class='col-lg-10'>
            <div class='row g-4 g-lg-5 text-center text-lg-start justify-content-center justify-content-lg-start'>
              <div class='col-lg-3 col-md-4 col-sm-5 col-6'>
                <img class='img-fluid rounded' src='assets/images/cropped_authors/$row[profile_photo_thumbnail]' alt=$author_full_name width='250' height='250' object-fit='fill'>
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

          $newData = json_decode($blog['blog_content'], true);
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