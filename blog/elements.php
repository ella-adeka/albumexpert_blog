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
          <span>Elements</span>
        </h1>
        <ul class="list-inline breadcrumb-menu mb-3">
          <li class="list-inline-item"><a href="index.php"><i class="ti ti-home"></i>  <span>Home</span></a></li>
          <li class="list-inline-item">• &nbsp; <a href="elements.php"><span>Elements</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="content">
          <h3 id="elements">Elements</h3>
          <p>This page demonstrate some basic elements and typography which you will use frequently within your site. Make the text <strong>bold</strong> or make it <em>italic</em>. Why not <strong><em>bold and italic</em></strong> both at a time. Here is the link to <a href="https://gohugo.io/">Hugo</a> website. Do you want to link a long text <a href="https://gohugo.io/">here how it looks in this theme</a>.</p>
          <p>URLs and URLs in angle brackets will automatically get turned into links. <a href="https://gohugo.io/">https://gohugo.io/</a> or <a href="https://gohugo.io/">https://gohugo.io/</a> and sometimes example.com (but not on Github, for example).</p>
          <h1 id="heading-one">Heading one</h1>
          <h2 id="heading-two">Heading two</h2>
          <h3 id="heading-three">Heading three</h3>
          <h4 id="heading-four">Heading four</h4>
          <h5 id="heading-five">Heading five</h5>
          <h6 id="heading-six">Heading six</h6>
          <h3 id="paragraph">Paragraph</h3>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
          <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

          <hr>

          <h3 id="ordered-list">Ordered List</h3>
          <ol>
          <li>The leap into electronic typesetting</li>
          <li>It was popularised in the 1960s</li>
          <li>Recently with desktop publishing software</li>
          <li>An unknown printer took a galley</li>
          <li>It has survived not only five centuries</li>
          </ol>

          <hr>

          <h3 id="unordered-list">Unordered List</h3>
          <ul>
          <li>The leap into electronic typesetting</li>
          <li>It was popularised in the 1960s</li>
          <li>Recently with desktop publishing software</li>
          <li>An unknown printer took a galley</li>
          <li>It has survived not only five centuries</li>
          </ul>

          <hr>
          
          <h3 id="blockquote">Blockquote</h3>
          <blockquote>
          <p>Since its beginning in the 1950s, the field of artificial intelligence has cycled several times between periods of optimistic predictions and investment
          <cite>Alexender Toto</cite></p>
          </blockquote>

          <hr>
          
          <h3 id="twitter-card">Twitter Card</h3>
          <blockquote class="twitter-tweet"><p lang="en" dir="ltr">Owl bet you&#39;ll lose this staring contest 🦉 <a href="https://t.co/eJh4f2zncC">pic.twitter.com/eJh4f2zncC</a></p>&mdash; San Diego Zoo Wildlife Alliance (@sandiegozoo) <a href="https://twitter.com/sandiegozoo/status/1453110110599868418?ref_src=twsrc%5Etfw">October 26, 2021</a></blockquote>
          <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

          <hr>

          <h3 id="responsive-html-table">Responsive HTML table</h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Heading</th>
                  <th scope="col">Heading</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                  <td>Cell</td>
                </tr>
              </tbody>
            </table>
          </div>

          <hr>

          <h3 id="image">Image</h3>
          <figure>
            <img src="assets/images/blog/02.jpg" alt="image caption" title="this is example title">
            <figcaption>This is example photo caption</figcaption>
          </figure>

          <hr>
          
          <h3 id="gallery">Gallery</h3>
          <div class="gallery">
            <img src="assets/images/blog/01.jpg" alt="image caption" title="this is example title">
            <img src="assets/images/blog/02.jpg" alt="image caption" title="this is example title">
            <img src="assets/images/blog/03.jpg" alt="image caption" title="this is example title">
            <img src="assets/images/blog/04.jpg" alt="image caption" title="this is example title">
            <img src="assets/images/blog/05.jpg" alt="image caption" title="this is example title">
            <img src="assets/images/blog/06.jpg" alt="image caption" title="this is example title">
          </div>

          <hr>
          
          <h3 id="youtube-video">Youtube video</h3>

          <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe src="https://www.youtube.com/embed/NC0WPQd_bds" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" allowfullscreen title="YouTube Video"></iframe>
          </div>

          <hr>
          
          <h3 id="vimeo-video">Vimeo video</h3>

          <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <iframe src="https://player.vimeo.com/video/341490793" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border:0;" title="vimeo video" allowfullscreen></iframe>
          </div>

        </div>
      </div>
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