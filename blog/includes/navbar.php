<?php

echo '
<nav class="navbar navbar-expand-lg navbar-light p-0">
          <!-- logo -->
          <a class="navbar-brand font-weight-bold mb-0" href="index.php" title="Qurno">
            <img class="img-fluid" width="110" height="35" src="assets/images/logo.png" alt="Qurno">
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
              <li class="nav-item '; if(basename($_SERVER['PHP_SELF']) == 'index.php'){ echo 'active';} echo '">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item @@about '; if(basename($_SERVER['PHP_SELF']) == 'about.php'){ echo 'active';} echo '">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item @@elements '; if(basename($_SERVER['PHP_SELF']) == 'elements.php'){ echo 'active';} echo '">
                <a class="nav-link" href="elements.php">Elements</a>
              </li>
              <li class="nav-item @@archive '; if(basename($_SERVER['PHP_SELF']) == 'archive.php'){ echo 'active';} echo '">
                <a class="nav-link" href="archive.php">Archive</a>
              </li>
              <li class="nav-item @@contact '; if(basename($_SERVER['PHP_SELF']) == 'contact.php'){ echo 'active';} echo '">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="author.php">Author</a></li>
                  <li><a class="dropdown-item" href="author-single.php">Author Single</a></li>
                  <li><a class="dropdown-item" href="tags.php">Tags</a></li>
                  <li><a class="dropdown-item" href="tag-single.php">Tag Single</a></li>
                  <li><a class="dropdown-item" href="categories.php">Categories</a></li>
                  <li><a class="dropdown-item" href="categories-single.php">Category Single</a></li>
                  <li><a class="dropdown-item" href="404-page.php">404 Page</a></li>
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
';