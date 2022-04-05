<?php
  // start a new session
  session_start();

  // If creator is not logged, redirect to login page.
  if (!isset($_SESSION['creator_loggedin']) && $_SESSION['creator_loggedin'] == false) {
    header ("location: blog_creator_login.php");
    exit;
  }  

  // Add database file
  require_once '../includes/database.php';
  

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

  if (isset($_GET['blog_id'])) {
    $blog_id= $_GET['blog_id'];
    $sql = "SELECT * FROM blogs WHERE blog_id = $blog_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
  }

  // json_decode blog_content
  $newData = json_decode($row['blog_content'], true);


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
    if (isset($_FILES["blog_image"]) && empty($newData['blogImage'])) {
      // if a new blog_image is set, and there is no current blog_image
      // set its value to $blog_image
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
    } elseif (isset($_FILES["blog_image"]) && !empty($newData['blogImage'])) {
      // If a new blog_image is set and there is a current blog_image,
      $blog_img_name = $_FILES['blog_image']['name'];
      $blog_img_tmp_name = $_FILES['blog_image']['tmp_name'];
      $img_extension = pathinfo($blog_img_name, PATHINFO_EXTENSION);
      $img_extension_lowercase = strtolower($img_extension);

      $allowed_extensions = array("gif", "png", "jpg", "jpeg");
      if (in_array($img_extension_lowercase, $allowed_extensions)) {
        // Update current blog_image to newly set blog_image
        $blog_image = uniqid("IMG_", true).'.'.$img_extension_lowercase;
        $file_path = '../assets/images/blog_images/'.$blog_image;
        move_uploaded_file($blog_img_tmp_name, $file_path);
        unlink("../assets/images/blog_images/".$newData['blogImage']."");
      } elseif(!empty($newData['blogImage'])) {
        // If there is a current blog_image, set $blog_image to its value
        $blog_image = $newData['blogImage'];
      } else {
        // If no image is set at all
        $blog_image_err = "Please upload an image in either .png, .gif, .jpg, or .jpeg";
      } 
    } else {
      $blog_image_err = "Please upload a photo";
    }

    
    
    // Check input erors brfore inserting into the database
    if (empty($title_err) && empty($description_err) && empty($blog_image_err)) {

      // Set blog_content in an array
      $article = array('title'=> $title, 'description'=>$description, 'blogImage'=>$blog_image);
      // Serialize the blog_content and set it to $data
      $data = json_encode($article, JSON_FORCE_OBJECT);
      // $blog_id is necessary, beause only one blog is being updated
      $blog_id= $_GET['blog_id'];
        
      // Insert serialize data into row
      $sql = "UPDATE blogs SET blog_content = ? WHERE blog_id=$blog_id";

      if ($stmt = mysqli_prepare($conn, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "s", $param_data);

        // Set parameters
        $param_data = $data;

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
          // Redirect to blog creator page
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
        <?php include('../includes/navbar_for_folders.php'); ?>
      </div>
    </div>
  </div>
</header>

<div class="search-block">
  <?php include('../includes/search_block_for_folders.php'); ?>
</div>

<section class="page-header section-sm">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="section-title h2 mb-3">
          <span>Edit Your Blog</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="../index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="edit_blog.php"><span>Edit Blog</span></a></li>
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
            // If the creator_username is set in the session and equals the $blog_creator's username, display corresponding details of the blog_creator
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
        <h2 class="h3 mb-4">Edit Your Blog</h2>

        <form id="edit_form_blog" class="row g-4" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF'])."?blog_id=$row[blog_id]" ?> method="post" enctype="multipart/form-data">
          <!-- userialize blog_content  -->
          <?php 
            $newData = json_decode($row['blog_content'], true); 

            echo("
                <div class='col-md-12'>
                  <label for='title'>Title:</label>
                  <input type='text' class='form-control' placeholder='Title' name='title' id='title' value='$newData[title]'>
                </div>
                <div class='col-md-12'>
                  <label for='description'>Description:</label>
                  <textarea class='form-control' placeholder='Description' rows='4' name='description'> $newData[description]</textarea>
                  <span class='invalid-feedback'> $description_err</span>
                </div>
                <div class='col-md-12'>
                  <p>Currently: $newData[blogImage]</p>
                  <input type='file' name='blog_image' id='blog_image'>
                  <br>
                  <span class='invalid_feedback'> $blog_image_err</span>
                </div>
                <div class='col-12'>
                  <button type='submit' class='btn btn-primary' aria-label='Update Blog'>Update <i class='ti ti-brand-telegram ms-1'></i></button>
                </div>
            ");
          
          ?>
              
        </form>
      </div>
      
    </div>
  </div>
</section>

<!-- start of footer -->
<footer>
  <div class="container">
    <?php include('../includes/footer_for_folders.php'); ?>
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