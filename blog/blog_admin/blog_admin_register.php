<?php
    // Include the database file
    require_once "../includes/database.php";
    // include("../includes/blog_db_skeleton.php");

    // Initialize variables
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    // Processing form data when submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Validating Username
        if (empty(trim($_POST['username']))) {
            $username_err = "Please enter a username";
        } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
            $username_err = "Username can only contain letters, numbers, and underscores";
        } else{
            $sql = "SELECT admin_id FROM blog_admins WHERE username = ?";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                # Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = trim($_POST["username"]);

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // store result
                    mysqli_stmt_store_result($stmt);

                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        $username_err = "This username is already taken.";
                    } else {
                        $username = trim($_POST["username"]);
                    }
                    
                } else {
                    echo "Something went wrong!. Please try again.";
                }
                
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }     

        // Validating password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter a password";
        } elseif (strlen(trim($_POST["password"])) < 8){
            $password_err = "Password is too short. Must be atleast 8 characters";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validating password_confirmation
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password";
        } else{
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Passwords did not match";
            }
        }


        // Check input errors before inserting into the database
        if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

            // Insert Statement
            $sql = "INSERT INTO blog_admins (username, password) VALUES (?, ?)";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

                // Set parameters
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash;
                

                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Redirect to login page
                    header("location: blog_admin_login.php");
                } else {
                    echo "Something went wrong. Please try again later.";
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
          <span>Register Your Account</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="../index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">??? &nbsp; <a href="blog_admin_register.php"><span>Register</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row gy-5 justify-content-center">
      
      <div class="col-lg-5 col-md-10 ms-lg-auto me-lg-0 me-auto">
        <div class="mb-5">
          <h2 class="h3 mb-3">Contact Qurno</h2>
          <p class="mb-0">I&rsquo;m here to help and answer any question you might have. I look forward to hearing from you</p>
        </div>
        <div>
          <h2 class="h4 mb-3">Hate forms? <br> Write an email or make a call</h2>
          <p class="mb-2 content">
            <i class="ti ti-mail-forward me-2 d-inline-block mb-0" style="transform:translateY(2px)"></i> <a href="mailto:contact@qurno.com">contact@qurno.com</a></p>
          <p class="mb-0 content"><i class="ti ti-phone me-2"></i> +98 02 296 4902</p>
        </div>
      </div>
      
      <div class="col-lg-5 me-lg-auto ms-lg-0 ms-auto">
        <h2 class="h3 mb-4">Create Your Profile Here</h2>
        

        <form class="row g-4" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> method="post" enctype="multipart/form-data">
            <div class='col-md-12'>
                <input type='text' class='form-control' placeholder='Username' name='username' <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> value="<?php echo $username ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class='col-md-6'>
                <input type='password' class='form-control' placeholder='Password' name='password' <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?> >
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class='col-md-6'>
                <input type='password' class='form-control' placeholder='Confirm Password' name='confirm_password' <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>>
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class='col-12'>
                <button type='submit' class='btn btn-primary' aria-label='Register'>Register <i class='ti ti-brand-telegram ms-1'></i></button>
            </div>
        </form>

        <div>
          <p class="mt-4 content text-end">Have have an account yet? Then Just <a class="text-decoration-underline" href="blog_admin_login.php">Login Here</a></p>
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- start of footer -->
<footer>
  <div class="container">
    <!-- <div class="section mb-5">
      
    </div> -->
    <div class="pt-5 pb-3">
      <div class="row g-2 g-lg-4 align-items-center">
        <div class="col-lg-6 text-center text-lg-start">
          <p class="mb-0 copyright-text content">&copy;2022 Qurno. All rights reserved.</p>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
          <ul class="list-inline footer-menu">
            <li class="list-inline-item m-0"><a href="../privacy.php">Privacy Policy</a></li>
            <li class="list-inline-item m-0"><a href="404-page.php">404 Page</a></li>
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