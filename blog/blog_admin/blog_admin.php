<?php
  session_start();

  if (!isset($_SESSION['admin_loggedin']) && $_SESSION['admin_loggedin'] == false) {
    header ("location: blog_admin_login.php");
    exit;
  }  
   
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
    <div class='row g-4 g-lg-5 text-center text-lg-start justify-content-center justify-content-lg-start mb-4'>
        <div class='col-lg-3 col-md-6 col-sm-6 '>
          <p class='text-center text-sm-start text-lg-start fs-3'>
            <?php echo $_SESSION['admin_username']; ?>
          </p>
        </div>
        <div class='col-lg-9 col-md-6 col-sm-6 '>
          <p class='text-center text-sm-end text-lg-end text-decoration-underline'><a href='blog_admin_logout.php'>Logout</a></p>
        </div>
    </div>
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
            <li class="list-inline-item m-0"><a href="../privacy.php">Privacy Policy</a></li>
            <li class="list-inline-item m-0"><a href="../404-page.html">404 Page</a></li>
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