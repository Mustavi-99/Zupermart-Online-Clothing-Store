<?php
session_start();
include "connection_open.php";
global $p;
global $li;
if (isset($_SESSION['userID'])) {
  $li = 1;
} else {
?>
  <script type="text/javascript">
    alert("User needs to be logged In");
    window.location.href = "Login.php"
  </script>
<?php
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
  <link rel="stylesheet" href="css/style.css?version=4">
  <link rel="stylesheet" href="css/fontawesome.css">

  <title>Zupermart</title>
</head>

<body onload="lgdd(<?php echo $li ?>)">


  <!-- Header -->
  <header class="sticky-md-top">
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

            <li class="nav-item">
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
                <li><a class="dropdown-item active" href="excl-Products.php">Exclusive Products</a></li>
                <li><a class="dropdown-item" href="user-profile.php">Profile</a></li>
                <li><a class="dropdown-item" href="wishlist.php">Wishlist</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!--header ends-->

  <!--Page Content-->
  <!--Banner-->
  <div class="container-fluid p-0 pb-1 col-lg-12" id="exclBanner">
    <img src="images/exclusive/bg.jpg">
    <div class="bannerText ">
      <textbox>Exclusive</textbox>
    </div>

    <!--img from pngtree.com-->
  </div>

  <!--Banner ends-->



  <!--cards Exclusive products-->
  <div class="container text-center cards">
    <div class="row justify-content-center card-id">

      <div class="section-heading">
        <h2>Exclusive Products</h2>
      </div>
      <?php
      $sql = "SELECT * FROM allproducts WHERE Exclusivity=1";
      $resultset = mysqli_query($link, $sql);
      if ($resultset) {
        if (mysqli_num_rows($resultset) > 0) {
          while ($row = mysqli_fetch_assoc($resultset)) { ?>
            <div class="col-lg-4 col-md-6">
              <div class="card h-100" style="width: 18rem;">
                <img src="<?php echo $row["Pimgurl"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row["Price"] ?></h5>
                  <p class="card-text"><?php echo $row["SDescription"] ?></p>
                  <?php echo '<a href="product-preview.php?productID=' . $row['PID'] . '&xclusive" class="stretched-link" target="_blank"></a>' ?>
                </div>
              </div>
            </div>
      <?php
          }
        }
      }
      ?>
    </div>
    <!--Row div end-->
  </div>
  <!--cards container div end-->
  <!--cards end here-->

  <!--cards: On Sale products-->
  <div class="container text-center cards">
    <div class="row justify-content-center card-id">
      <div class="section-heading">
        <h2>On Sale</h2>
      </div>
      <?php
      $dsql = "SELECT * FROM allproducts WHERE Sale>0";
      $dresultset = mysqli_query($link, $dsql);
      if ($dresultset) {
        if (mysqli_num_rows($dresultset) > 0) {
          while ($row = mysqli_fetch_assoc($dresultset)) { ?>
            <div class="col-lg-4 col-md-6 mb-2">
              <div class="card" style="width: 18rem;">
                <img src="<?php echo $row["Pimgurl"] ?>" class="card-img-top" alt="...">
                <div class="card-img-overlay">
                  <h5 class="card-title discount"><?php echo $row["Sale"] ?>%</h5>
                </div>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $row["Price"] ?></h5>
                  <p class="card-text"><?php echo $row["SDescription"] ?></p>
                  <?php echo '<a href="product-preview.php?productID=' . $row['PID'] . '&d" class="stretched-link" target="_blank"></a>' ?>
                </div>
              </div>
            </div>
      <?php
          }
        }
      }
      ?>
    </div>
    <!-- Row div end- -->
  </div>
  <!--cards container div end-->
  <!--cards end here-->

  <!--Page Content ends here-->


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