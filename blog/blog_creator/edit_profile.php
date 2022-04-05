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

  if (isset($_GET['creator_id'])) {
    $creator_id= $_GET['creator_id'];
    $sql = "SELECT * FROM blog_creators WHERE creator_id = $creator_id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
  }



  // Initialize variables
  $username = $first_name = $last_name = $profile_photo_thumbnail = "";
  $username_err = $first_name_err = $last_name_err = $profile_photo_thumbnail_err = "";

  // Procession the form data on submit
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate title
    if (empty(trim($_POST["username"]))) {
      $username_err = "Please enter a username";
    } else {
      $username = trim($_POST["username"]);
    }

    // Validating First Name
    if (empty(trim($_POST["first_name"]))) {
        $first_name_err = "Please enter your first name";
    } else {
        $first_name = trim($_POST["first_name"]);
    }

    // Validating Last Name
    if (empty(trim($_POST["last_name"]))) {
        $last_name_err = "Please enter your last name";
    } else {
        $last_name = trim($_POST["last_name"]);
    }    

    // Validate image
    if (isset($_FILES["profile_photo_thumbnail"]) && empty($blog_creator['profile_photo_thumbnail'])) {
        $img_name = $_FILES['profile_photo_thumbnail']['name'];
        $tmp_name = $_FILES['profile_photo_thumbnail']['tmp_name'];
        $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_extension_lowercase = strtolower($img_extension);

        $allowed_extensions = array("gif", "png", "jpg", "jpeg");
        if (in_array($img_extension_lowercase, $allowed_extensions)) {
            $profile_photo_thumbnail = uniqid("IMG-", true).'.'.$img_extension_lowercase;
            $file_path= '../assets/images/uploaded_authors/'.$profile_photo_thumbnail;
            move_uploaded_file($tmp_name, $file_path);
        } else {
            $profile_photo_thumbnail_err = "Please upload in either .png, .gif, .jpg, or .jpeg format.";
        }
    } elseif (isset($_FILES["profile_photo_thumbnail"]) && !empty($blog_creator['profile_photo_thumbnail'])) {
        $img_name = $_FILES['profile_photo_thumbnail']['name'];
        $tmp_name = $_FILES['profile_photo_thumbnail']['tmp_name'];
        $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_extension_lowercase = strtolower($img_extension);
  
        $allowed_extensions = array("gif", "png", "jpg", "jpeg");
        if (in_array($img_extension_lowercase, $allowed_extensions)) {
            $profile_photo_thumbnail = uniqid("IMG-", true).'.'.$img_extension_lowercase;
            $file_path= '../assets/images/uploaded_authors/'.$profile_photo_thumbnail;
            move_uploaded_file($tmp_name, $file_path);
            unlink("../assets/images/uploaded_authors/".$blog_creator['profile_photo_thumbnail']."");
        } elseif(!empty($blog_creator['profile_photo_thumbnail'])) {
          $profile_photo_thumbnail = $blog_creator['profile_photo_thumbnail'];
        } else {
          $profile_photo_thumbnail_err = "Please upload an image in either .png, .gif, .jpg, or .jpeg";
        } 
    } else {
        $profile_photo_thumbnail_err = "Please upload a photo";
    }  


    
    
    // Check input erors brfore inserting into the database
    if (empty($username_err) && empty($first_name_err)  && empty($last_name_err) && empty($profile_photo_thumbnail_err)) {

    //   $creator_id= $_GET['creator_id'];
        
      // Insert serialize data into row
      $sql = "UPDATE blog_creators SET username=?, first_name=?, last_name=?, profile_photo_thumbnail=? WHERE creator_id=$creator_id";

      if ($stmt = mysqli_prepare($conn, $sql)) {
        
        mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_first_name, $param_last_name, $param_profile_photo_thumbnail);

        // Set parameters
        $param_username = $username;
        $param_first_name = $first_name;
        $param_last_name = $last_name;
        $param_profile_photo_thumbnail = $profile_photo_thumbnail;

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
          <span>Edit Your Profile</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="../index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="edit_profile.php"><span>Edit Profile</span></a></li>
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
                    $creator_id = $blog_creator['creator_id'];
                  $creator_img = "<img class='img-fluid rounded mb-4' src='../assets/images/uploaded_authors/$blog_creator[profile_photo_thumbnail]' alt='$blog_creator[first_name] $blog_creator[last_name]' width='250' height='250'>";
                  $creator_name = $blog_creator['first_name'].' '.$blog_creator['last_name'];
                //   $creator_username_name = $blog_creator['username_name'];
                //     $creator_first_name = $blog_creator['first_name'];
                //     $creator_last_name = $blog_creator['last_name'];
                }
              }
            }
            echo ("
              <h2 class='h3 mb-3'>Your Current Profile</h2>
              $creator_img
              <p class='mb-0'>Username: <span class='fw-bold text-bold'> $_SESSION[creator_username]</span></p>
              <p class='mb-0'>Name:<span class='fw-bold text-bold'> $creator_name </span></p>
              <p class='mb-0'>Blogs Created:<span class='fw-bold text-bold'> $blog_count </span></p>
            ");
          ?>
        </div>
      </div>
      
      <div class="col-lg-8 me-lg-auto ms-lg-0 ms-auto">
        <h2 class="h3 mb-4">Edit Your Profile</h2>

        <form id="edit_profile" class="row g-4" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" enctype="multipart/form-data">
          
            
           
                <div class='col-md-12'>
                  <label for='username'>Username:</label>
                  <input type='text' class='form-control' placeholder='Username' name='username' id='username' <?php echo (!empty($username_err)) ? 'is-invalid' : '' ?> value='<?php echo $blog_creator['username']; ?>'>
                </div>
                <div class='col-md-12'>
                  <label for='first_name'>First Name:</label>
                  <input type='text' class='form-control' placeholder='First Name' name='first_name' id='first_name' <?php echo (!empty($username_err)) ? 'is-invalid' : '' ?> value='<?php echo $blog_creator['first_name']; ?>'>
                </div>
                <div class='col-md-12'>
                  <label for='last_name'>Last Name:</label>
                  <input type='text' class='form-control' placeholder='Last Name' name='last_name' id='last_name' <?php echo (!empty($username_err)) ? 'is-invalid' : '' ?> value='<?php echo $blog_creator['last_name']; ?>'>
                </div>
                
                <div class='col-md-12'>
                  <p>Currently: <?php echo $blog_creator['profile_photo_thumbnail']; ?></p>
                  <input type='file' name='profile_photo_thumbnail' id='profile_photo_thumbnail' <?php echo (!empty($profile_photo_thumbnail_err)) ? 'is-invalid' : '' ?>>
                  <br>
                  <span class="invalid_feedback"><?php echo $profile_photo_thumbnail_err ?></span>
                </div>
                <div class='col-12'>
                  <button type='submit' class='btn btn-primary' aria-label='Update Blog'>Update <i class='ti ti-brand-telegram ms-1'></i></button>
                </div>
              
            
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