<?php
    // Initialize a session
    session_start();

    // Check if the user is already logged in, if yes then redirect to the welcome page
    if (isset($_SESSION["creator_loggedin"]) && $_SESSION["creator_loggedin"] == true) {
        header('Location: blog_creator.php');
        exit;
    }


    // Include database file
    require_once '../includes/database.php';

    // Initialize variables
    $username = $password = "";
    $username_err = $password_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter your username";
        } else {
            $username = trim($_POST["username"]);
        }
        
        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials
        if (empty($username_err) && empty($password_err)) {
            // SELECT statement
            $sql = "SELECT creator_id, username, password, active_or_inactive FROM blog_creators WHERE username = ?";

            if ($stmt = mysqli_prepare($conn, $sql)) {
                // Bind variables to the prepared statemnt
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Attempt to execute the prepared statmtn
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if username exists, if yes then verify password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $creator_id, $username, $hashed_password, $active_or_inactive);

                        if (mysqli_stmt_fetch($stmt)) {
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, start a new session
                                session_start();

                                // Store data in session variables
                                $_SESSION["creator_loggedin"] = true;
                                $_SESSION["creator_id"] = $creator_id;
                                $_SESSION["creator_username"] = $username;
                                // $_SESSION["active_or_inactive"] = $active_or_inactive;
                                
                                // if ($_SESSION["active_or_inactive"] == 1) {
                                if ($active_or_inactive == 1) {
                                  // Redirect to blog admin page
                                  header('Location: blog_creator.php');
                                } else {
                                  // Remove all the session variables;
                                  session_unset();

                                  // Destroy the session
                                  session_destroy();

                                  // Redirect to deactivated page
                                  header('Location: blog_creator_deactivated.php');
                                }
                                
                            } else {
                                // Password is not valid display an error message
                                $login_err = "Invalid username or password.";
                                echo ("<h1>$login_err</h1>");
                            }
                        }
                    } else {
                        // Password is not valid display an error message
                        $login_err = "Invalid username or password.";
                    }
                    
                } else {
                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        // Close statement
        mysqli_close($conn);
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
          <span>Login to your Account</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-0">
          <li class="list-inline-item"><a href="../index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="blog_creator_login.php"><span>Login</span></a></li>
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
        <h2 class="h3 mb-4">Enter Your Credentials Here</h2>

        <?php
            if (!empty($login_err)) {
                echo '<div class="alert alert-danger">'.$login_err.'</div>';
            }
        ?>

        <form class="row g-4" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <div class='col-md-12'>
                <input type='text' class='form-control' placeholder='Username' name='username' <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?> value=<?php echo $username; ?>>
                <span class="invalid_feedback"><?php echo $username_err ?></span>
            </div>
            <div class='col-md-12'>
                <input type='password' class='form-control' placeholder='Password' name='password' <?php echo (!empty($password_err)) ? 'is-invalid' : '' ?>>
                <span class="invalid_feedback"><?php echo $password_err ?></span>
            </div>
            <div class='col-12'>
                <button type='submit' class='btn btn-primary' aria-label='Login'>Login <i class='ti ti-brand-telegram ms-1'></i></button>
            </div>
        </form>
        
        <div>
          <p class="mt-4 content text-end">Don't have an account yet? <a class="text-decoration-underline" href="blog_creator_register.php">Register Here</a></p>
        </div>
      </div>
      
    </div>
  </div>
</section>

<!-- start of footer -->
<footer>
  <div class="container">
    <div class="pt-3"></div>
    <div class="pt-5">
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

</body></html>