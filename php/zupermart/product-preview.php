<?php
session_start();
include "connection_open.php";
global $li;
global $pt;
if (isset($_SESSION['userID'])) {
  $li = 1;
} else {
  $li = 0;
}
if (isset($_GET["productID"])) {
  $productID = $_GET["productID"];
  $seapro = "SELECT * FROM allproducts WHERE PID=$productID AND Exclusivity=1";
  $seares = mysqli_query($link, $seapro);
  if (mysqli_num_rows($seares) > 0) {
    if (!isset($_SESSION['userID'])) {
?>
      <script type="text/javascript">
        alert("User needs to be logged In");
        window.location.href = "Login.php"
      </script>
    <?php
    }
  }
}
if (isset($_POST["addtowish"])) {
  if (!isset($_SESSION['userID'])) {
    ?>
    <script type="text/javascript">
      alert("User needs to be logged In");
      window.location.href = "Login.php"
    </script>
  <?php
  } else {
    if (isset($_GET['d'])) {
      $disc = 1;
    } else {
      $disc = 0;
    }
    $insertsql = "INSERT INTO wishlist (`PID`,`CID`,`Discount`) VALUES ($productID," . $_SESSION['userID'] . ",$disc)";
    mysqli_query($link, $insertsql);
  ?>
    <script type="text/javascript">
      alert("Added To Wishlist");
    </script>
  <?php
  }
}
if (isset($_POST["removefromwish"])) {
  $deletesql = "DELETE FROM wishlist WHERE PID=$productID AND CID=" . $_SESSION['userID'];
  mysqli_query($link, $deletesql);
  ?>
  <script type="text/javascript">
    alert("Removed From Wishlist");
  </script>
  <?php
}
if (isset($_GET['d'])) {
  if (!isset($_SESSION['userID'])) {
  ?>
    <script type="text/javascript">
      alert("User needs to be logged In");
      window.location.href = "Login.php"
    </script>
<?php
  }
}
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
  $url = "https://";
else
  $url = "http://";
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/fontawesome.css">
  <title>Zupermart</title>
</head>

<body onload="lgdd(<?php echo $li ?>)">
  <!-- Start Top Nav -->
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
  <!--header, top navigation ends-->


  <!-- Open Content -->
  <?php
  $sql = "SELECT * FROM allproducts WHERE PID=" . $_GET["productID"];
  $resultset = mysqli_query($link, $sql);
  if ($resultset) {
    if (mysqli_num_rows($resultset) > 0) {
      while ($row = mysqli_fetch_assoc($resultset)) {
  ?>
        <section class="bg-light">
          <div class="container pb-5">
            <div class="row">
              <div class="col-lg-5 mt-5">
                <!--main image-->
                <div class="card mb-3">
                  <img class="card-img img-fluid" src="<?php echo $row["Pimgurl"] ?>" alt="Card image cap" id="product-detail">
                </div>
              </div>

              <!-- col end -->

              <!--description here-->
              <div class="col-lg-7 mt-5">
                <div class="card">
                  <div class="card-body">
                    <!--using breadcrumb to show where we are...cool-->

                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <?php
                          if (isset($_GET["xclusive"])) {
                            echo "<a href='excl-Products.php'>Exclusive Products</a>";
                          } else {
                            echo "<a href='products.php'>Our Products</a>";
                          }
                          ?>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $row["PType"] ?></li>
                      </ol>
                    </nav>

                    <h1 class="h2"><?php echo $row["PName"] ?></h1>
                    <p class="h3 py-2"><?php echo $row["Price"] ?></p>
                    <?php
                    $pt = $row["PType"];
                    if (isset($_GET['d'])) {
                      echo '<span class="list-inline-item" style="color:red">(' . $row["Sale"] . '% only)</span>';
                    }
                    ?>
                    <p class="py-2">
                      <?php
                      for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $row["PRating"]) {
                          echo "<i class='fa fa-star text-warning'></i>";
                        } else {
                          echo "<i class='fa fa-star text-secondary'></i>";
                        }
                      }
                      ?>

                      <span class="list-inline-item text-dark"><?php echo $row["PRating"] ?></span>
                    </p>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <h6>Brand:</h6>
                      </li>
                      <li class="list-inline-item">
                        <p class="text-muted"><strong><?php echo $row["PBrand"] ?></strong></p>
                      </li>
                    </ul>

                    <h6>Description:</h6>
                    <p><?php echo $row["Description"] ?></p>
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        <h6>Avaliable Color :</h6>
                      </li>
                      <li class="list-inline-item">
                        <p class="text-muted">
                          <?php
                          $csql = "SELECT * FROM productcolor WHERE PID=" . $_GET["productID"];
                          // echo $sql;
                          $resultcol = mysqli_query($link, $csql);
                          if ($resultcol) {
                            if (mysqli_num_rows($resultcol) > 0) {
                              while ($rowcol = mysqli_fetch_assoc($resultcol)) {
                                echo "<strong>" . $rowcol["Colors"] . " </strong>";
                              }
                            }
                          }
                          ?>
                        </p>
                      </li>
                    </ul>

                    <h6>Specification:</h6>
                    <ul class="list-unstyled pb-3">
                      <?php
                      $ssql = "SELECT * FROM productspecification WHERE PID=" . $_GET["productID"];
                      // echo $sql;
                      $resultspec = mysqli_query($link, $ssql);
                      if ($resultspec) {
                        if (mysqli_num_rows($resultspec) > 0) {
                          while ($rowspec = mysqli_fetch_assoc($resultspec)) {
                            echo "<li>" . $rowspec['Specifications'] . "</li>";
                          }
                        }
                      }
                      ?>
                    </ul>

                    <form action="<?php echo $url ?>" method="POST">
                      <input type="hidden" name="product-title" value="Activewear">
                      <div class="row">
                        <div class="col-auto">
                          <ul class="list-inline pb-3">
                            <li class="list-inline-item">Size :
                              <input type="hidden" name="product-size" id="product-size" value="S">
                            </li>
                            <?php
                            if ($row["S"] != 0) {
                              echo "<li class='list-inline-item'><span class='btn btn-success btn-size'>S</span></li>";
                            }
                            if ($row["M"] != 0) {
                              echo "<li class='list-inline-item'><span class='btn btn-success btn-size'>M</span></li>";
                            }
                            if ($row["L"] != 0) {
                              echo "<li class='list-inline-item'><span class='btn btn-success btn-size'>L</span></li>";
                            }
                            ?>
                          </ul>
                        </div>
                        <div class="col-auto">
                          <ul class="list-inline pb-3">
                            <li class="list-inline-item text-right">
                              Quantity
                              <input type="hidden" name="product-quanity" id="product-quanity" value="1">
                            </li>
                            <li class="list-inline-item"><span class="btn btn-success disabled" id="btn-minus">-</span></li>
                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                            <li class="list-inline-item"><span class="btn btn-success disabled" id="btn-plus">+</span></li>
                          </ul>
                        </div>
                      </div>
                      <div class="row pb-3">
                        <span class="col d-grid" tabindex="0" data-bs-toggle="tooltip" title="Online shopping is under construction">
                          <button type="submit" disabled class="btn btn-success btn-lg" name="submit" value="buy">Buy</button>
                        </span>
                        <?php
                        if (isset($_SESSION['userID'])) {
                          $searchsql = "SELECT * FROM wishlist WHERE PID=" . $_GET["productID"] . " AND CID =" . $_SESSION['userID'];
                          $resultsearch = mysqli_query($link, $searchsql);
                          $nosea = mysqli_num_rows($resultsearch);
                        } else {
                          $nosea = 0;
                        }
                        if ($nosea) {
                          echo '<span class="col d-grid">
                                <button type="submit" class="btn btn-outline-danger btn-lg" name="removefromwish" value="addtocard">Remove from Wishlist</button></span>';
                        } else {
                          echo '<span class="col d-grid">
                                <button type="submit" class="btn btn-outline-danger btn-lg" name="addtowish" value="addtocard">Add To Wishlist</button></span>';
                        }
                        ?>
                      </div>
                    </form>

              <?php
            }
          }
        }
              ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </section>
        <!-- Close Content -->
        <section class="py-5">
          <div class="container justify-content-center">
            <div class="row text-left p-2 pb-3">
              <h4>Related Products</h4>
            </div>
            <div class="row justify-content-center">
              <div id="carouselExampleIndicators" class="carousel carousel-dark slide carousel-multi-item d-flex justify-content-center" data-bs-ride="carousel">
                <div class="carousel-indicators">
                  <?php
                  $page = 1;
                  $results_per_page = 3;
                  if (isset($_GET['d'])) {
                    $e = "";
                  } else {
                    $e = "Exclusivity= 0 AND";
                  }
                  $query = "SELECT * FROM allproducts WHERE $e PType= '$pt' AND PID !=" . $_GET['productID'];
                  $resultslide = mysqli_query($link, $query);
                  $number_of_result = mysqli_num_rows($resultslide);
                  $number_of_slide = ceil($number_of_result / $results_per_page);
                  $p = 0;
                  while ($p < $number_of_slide) {
                    if ($p == 0) {
                      $act = "active";
                    } else {
                      $act = "";
                    }
                    echo '
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $p . '" class="' . $act . '" aria-current="true" aria-label="Slide ' . ++$p . '"></button>';
                  } ?>
                </div>
                <div class="carousel-inner  d-flex justify-content-center text-center pb-5">
                  <?php
                  while ($page <= $number_of_slide) {
                    $page_first_result = ($page - 1) * $results_per_page;
                    $slidequery = "SELECT * FROM allproducts WHERE $e PType= '$pt' AND PID !=" . $_GET['productID'] . " LIMIT " . $page_first_result . ',' . $results_per_page;
                    $resslide = mysqli_query($link, $slidequery);
                    if ($page == 1) {
                      $active = "active";
                    } else {
                      $active = "";
                    } ?>
                    <div class="carousel-item <?php echo $active ?> carcard">
                      <div class="card-group">
                        <?php
                        while ($rowslide = mysqli_fetch_assoc($resslide)) { ?>
                          <div class="col-lg-4 col-md-6 d-flex justify-content-center">
                            <div class="card h-100" style="width: 18rem;">
                              <div class="carimg">
                                <img src="<?php echo $rowslide['Pimgurl'] ?>" class="card-img-top" alt="...">
                              </div>
                              <div class="card-body">
                                <h5 class="card-title text-danger"><?php echo $rowslide['Price'] ?></h5>
                                <p class="card-text"><?php echo $rowslide['PName'] ?></p>
                                <a href="product-preview.php?productID=<?php echo $rowslide['PID'] ?>" class="stretched-link" target="_blank"></a>
                              </div>
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                    </div>
                  <?php
                    $page++;
                  } ?>
                </div>
              </div>
            </div>
          </div>
        </section>
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