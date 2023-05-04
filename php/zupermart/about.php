<?php
session_start();
include "connection_open.php";
global $li;
if (isset($_SESSION['userID'])) {
  $li = 1;
} else {
  $li = 0;
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="css/templatemo-sixteen.css">
  <link rel="stylesheet" href="css/style.css?version=1">
  <link rel="stylesheet" href="css/fontawesome.css">

  <title>Zupermart</title>
</head>

<body onload="lgdd(<?php echo $li ?>)">


  <!-- Header -->
  <header class="sticky-top">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/brand.png">
          <h2>Zuper <em>Mart</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <!--here we will have our unordered list-->
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">Our Products</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link " href="about.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img style="max-height:25px" src="images/account.png">
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div id="LoggedIn">
                  <li><a class="dropdown-item" href="excl-Products.php">Exclusive Products</a></li>
                  <li><a class="dropdown-item" href="user-profile.php">Profile</a></li>
                  <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </div>
                <div id="LoggedOut">
                  <li><a class="dropdown-item " href="login.php">Log In/Register</a></li>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--header ends-->

  <!-- Page Content -->

  <div class="page-heading about-heading header-text">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="text-content">
            <h4>about us</h4>
            <h2>our company</h2>
          </div>
        </div>

      </div>
    </div>
  </div>
  <!--page heading ends-->


  <!--Our Background-->
  <div class="best-features about-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Our Background</h2>
          </div>
        </div>
        <?php
        $sql = "SELECT * FROM aboutus";
        $resbrand = mysqli_query($link, $sql) or die(mysqli_errno($link));
        while ($rowbrand = mysqli_fetch_assoc($resbrand)) { ?>
          <div class="col-md-6">
            <div class="right-image">
              <img src="<?php echo $rowbrand['BrandPURL'] ?>" alt="">
            </div>
          </div>
        <?php } ?>
        <div class="col-lg-6 col-md-12">
          <div class="left-content">
            <h4 style="padding-bottom: 10px;">Who we are &amp; What we do?</h4>
            <?php
            $resaboutdesc = mysqli_query($link, $sql) or die(mysqli_errno($link));
            while ($rowaboutdesc = mysqli_fetch_assoc($resaboutdesc)) { ?>
              <p><?php echo $rowaboutdesc['AboutDesc'] ?></p>
            <?php }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--our background ends-->


  <!--Founder-->
  <?php
  $resfounder = mysqli_query($link, $sql) or die(mysqli_errno($link));
  while ($rowfounder = mysqli_fetch_assoc($resfounder)) { ?>
    <div class="best-features about-features" id="founder">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Founder</h2>
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="right-image">
              <img src="<?php echo $rowfounder['FounderPURL'] ?>" alt="">
            </div>
          </div>
          <div class="col-xl-6 col-lg-12">
            <div class="left-content" id="founderText">
              <h4 style="padding-bottom: 10px;"><?php echo $rowfounder['FounderName'] ?></h4>
              <p><?php echo $rowfounder['FounderDesc'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php  } ?>
  <!--founder ends-->

  <!--Parteners-->
  <div class="partners">
    <div class="container">
      <div class="col-md-12">
        <div class="section-heading">
          <h2>Happy Partners</h2>
        </div>
      </div>
      <?php
      $sql = "SELECT * FROM happypartners";
      $result = mysqli_query($link, $sql) or die(mysqli_error($link));
      while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="client-item col-md-3">
          <img src="<?php echo $row['hpPimgurl']?>" alt="">
        </div>
      <?php }
      ?>

    </div>
  </div>

  <!--partners ends-->

  <!--page content ends-->


  <!--footer-->
  <?php
  include "footer.php";
  ?>
  <!--footer-->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/index.js?version=1"></script>
</body>

</html>