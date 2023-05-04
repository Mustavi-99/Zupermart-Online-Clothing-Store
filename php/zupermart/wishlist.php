<?php
session_start();
include "connection_open.php";
if (isset($_SESSION['userID'])) {
} else {
?>
  <script type="text/javascript">
    alert("User needs to be logged In");
    window.location.href = "Login.php"
  </script>
<?php
}
if(isset($_GET['remove'])){
  $deletesql="DELETE FROM wishlist WHERE PID=".$_GET['remove']." AND CID=".$_SESSION['userID'];
  mysqli_query($link, $deletesql);
  ?>
  <script type="text/javascript">
    alert("Removed From Wishlist");
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
  <link rel="stylesheet" href="css/fontawesome.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/wishlist.css">

  <title>Zupermart</title>
</head>

<body>


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
                <li><a class="dropdown-item" href="excl-Products.php">Exclusive Products</a></li>
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

  <!-- Page Content -->

  <div class="page-heading header-text">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Your</h4>
            <h2>Wishlist</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--page heading ends-->


  <section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table aa-wishlist-table">
              <form action="..." method="POST">
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $currentUserId = $_SESSION['userID'];
                      $sql = "SELECT * FROM wishlist w JOIN allproducts a ON w.PID=a.PID WHERE w.WID IN(SELECT WID FROM wishlist wi JOIN customers c ON wi.CID=c.CID WHERE c.CID=$currentUserId)";
                      $wishresult = mysqli_query($link, $sql);
                      if ($wishresult) {
                        if (mysqli_num_rows($wishresult) > 0) {
                          while ($row = mysqli_fetch_assoc($wishresult)) { ?>
                            <tr>
                              <td><a class="remove" href="wishlist.php?remove=<?php echo $row['PID'] ?>">
                                  <fa class="fa fa-close"></fa>
                                </a></td>
                              <td><?php echo '<a href="product-preview.php?productID=' . $row['PID'] . '">' ?><img src="<?php echo $row["Pimgurl"]?>" alt="website template image"></a></td>
                              <td><?php echo '<a href="product-preview.php?productID=' . $row['PID'] . '" class="aa-cart-title">'?><?php echo $row["PType"]?></a></td>
                              <td><?php echo $row["Price"] ?></td>
                              <?php 
                              if($row["inStock"]>0){
                                echo '<td>In Stock</td>';
                              }else{
                                echo '<td>Out of Stock</td>';
                              }
                              ?>
                              <td><span class="col d-grid gap-2 d-md-block" tabindex="0" data-bs-toggle="tooltip" title="Online shopping is under construction">
                                  <button type="submit" disabled class="btn btn-outline-success" name="submit" value="addtocard">
                                    Add To Cart</button>
                                </span></td>
                            </tr>
                      <?php
                          }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--page content ends-->


  <!--footer-->
  <?php
    include "footer.php";
  ?>
  <!--footer-->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>