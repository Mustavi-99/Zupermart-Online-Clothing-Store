<?php
session_start();
include "connection_open.php";
global $p;
global $li;
global $i;
global $updatesql;
global $userproimg;
global $img;
global $filetype;
global $newImg;

if (isset($_SESSION['userID'])) {
} else {
?>
    <script type="text/javascript">
        alert("User needs to be logged In");
        window.location.href = "Login.php"
    </script>
    <?php
}
if (isset($_GET["edit"])) {
    $i = 1;
} else {
    $i = 0;
}
function userNameExists($conn, $name, $uid)
{
    $searchsql = "SELECT * FROM customers WHERE UserName='$name' AND CID!=$uid";
    $resultSearch = mysqli_query($conn, $searchsql) or die(mysqli_error($conn));
    if ($row = mysqli_fetch_assoc($resultSearch)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
function userEmailExists($conn, $email, $uid)
{
    $searchsql = "SELECT * FROM customers WHERE Email='$email' AND CID!=$uid";
    $resultSearch = mysqli_query($conn, $searchsql) or die(mysqli_error($conn));
    if ($row = mysqli_fetch_assoc($resultSearch)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}
function userPhoneExists($conn, $phone, $uid)
{
    $searchsql = "SELECT * FROM customers WHERE Phone='$phone' AND CID!=$uid";
    $resultSearch = mysqli_query($conn, $searchsql) or die(mysqli_error($conn));
    if ($row = mysqli_fetch_assoc($resultSearch)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }
}

if (isset($_POST["savpro"])) {
    $userId = $_SESSION['userID'];
    $newName = $_POST["newname"];
    $newEmail = $_POST["newemail"];
    $newPhone = $_POST["newphone"];
    $destination = "images/users/";
    if (userNameExists($link, $newName, $userId) !== false) {
    ?><script>
            alert("User Name Already Exists");
        </script><?php
                } else if (userEmailExists($link, $newEmail, $userId) !== false) {
                    ?><script>
            alert("User Email Already Exists");
        </script><?php
                } else if (userPhoneExists($link, $newPhone, $userId) !== false) {
                    ?><script>
            alert("User Phone Already Exists");
        </script><?php
                } else {
                    if ($_FILES['UserIMG']['size'] != 0) {
                        $img = basename($_FILES['UserIMG']['name']);
                        $filetype = strtolower(pathinfo($img, PATHINFO_EXTENSION));
                        $newImg = $destination . $userId . '-' . $newName . '.' . $filetype;
                        move_uploaded_file($_FILES['UserIMG']['tmp_name'], $newImg);
                        $updatesql = "UPDATE customers SET UserName='$newName', Email='$newEmail',Phone= '$newPhone',ImageURL= '$newImg' WHERE CID= $userId";
                    } else {
                        $updatesql = "UPDATE customers SET UserName='$newName', Email='$newEmail',Phone= '$newPhone' WHERE CID= $userId";
                    }
                    mysqli_query($link, $updatesql) or die(mysqli_error($link));
                    header("location:../zupermart/user-profile.php");
                }
            }
            if (isset($_POST["registerbtn"])) {
                $userId = $_SESSION['userID'];
                $newpassword = $_POST["RegisterPassword"];
                $updatesql = "UPDATE customers SET Password='$newpassword' WHERE CID='$userId'";
                // echo $updatesql;
                mysqli_query($link, $updatesql) or die(mysqli_error($link));
                    ?><script type="text/javascript">
        alert("Password Changed");
        //window.location.href = "user-profile.php"
    </script><?php
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
    <link rel="stylesheet" href="css/userProfile.css?version=2">
    <link rel="stylesheet" href="css/fontawesome.css">

    <title>Zupermart</title>
</head>

<body onload="profile(<?php echo $i ?>)">

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
                        <li class="nav-item s">
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
                                <li><a class="dropdown-item active" href="user-profile.php">Profile</a></li>
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
    <div class="empty"></div>
    <div class="Container">
        <div class="matrix">
            <div class="UserDetails col-lg-12 col-sm-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <?php
                    $currentUserId = $_SESSION['userID'];
                    $sql = "SELECT * FROM customers WHERE CID=$currentUserId";
                    $resultUser = mysqli_query($link, $sql);
                    if ($resultUser) {
                        if (mysqli_num_rows($resultUser) > 0) {
                            while ($row = mysqli_fetch_assoc($resultUser)) {
                                if (empty($row["ImageURL"])) {
                                    $userproimg = 'images/users/default.png';
                                } else {
                                    $userproimg = $row["ImageURL"];
                                }
                                $_POST["oldp"] = $row["Password"];
                                //print_r($row["UserName"]);
                    ?>
                                <!-- <div class="userImage"> -->
                                <div class="col-md-6 col-lg-10 userImage" id="userImage">
                                    <img src="<?php echo $userproimg ?>" class="img-fluid rounded-circle" alt="user image" id="userphoto">
                                    <input type="file" name="UserIMG" id="uploadImage">
                                    <label for="uploadImage" id="uploadbtn">Choose Photo</label>
                                </div>
                                <!-- </div> -->

                                <div class="textbox">
                                    <i class="fas fa-user"></i>
                                    <input type="text" id="prousername" name="newname" value="<?php echo $row["UserName"] ?>" placeholder="Enter Your Name" required>
                                </div>

                                <div class="textbox">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" id="proemail" name="newemail" value="<?php echo $row["Email"] ?>" placeholder="Enter Your Email" required>
                                </div>

                                <div class="textbox">
                                    <i class="fas fa-mobile"></i>
                                    <input type="text" id="prophoneNumber" name="newphone" value="<?php echo $row["Phone"] ?>" placeholder="Enter Your Phone Number" required>
                                </div>
                                <div class="editButton">
                                    <div class="col-md-9">
                                        <input type="button" id="EditProfile" onclick="return editProfile();" class="btn" value="Edit Profile">
                                        <input type="submit" id="SaveProfile" class="btn" value="Save Profile" name="savpro">
                                    </div>
                                </div>
                                <input type="password" name="" id="logpassword" value="<?php echo $row["Password"] ?>">
                </form>
    <?php
                            }
                        }
                    }
    ?>
    <!-- Button trigger modal -->
            </div>
            <div class="editButton solobutton col-lg-12 col-sm-6">
                <div class="col-md-9">
                    <input type="button" class="btn" value="Change Password" data-bs-toggle="modal" data-bs-target="#cpModal">
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade cpmodal" id="cpModal" tabindex="-1" role="dialog" aria-labelledby="cpModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cpModalTitle">Change Password</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" onclick="document.getElementById('OldPassword').value='';document.getElementById('NewPassword').value='';document.getElementById('CPassword').value='';indicoff()" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3 textbox">
                            <label for="OldPassword" class="col-form-label">Old Password<span>*</span>
                                <div class="form-text">Password length must be 6 and must have digits,letters,characters</div>
                            </label>
                            <div>
                                <i class="fas fa-lock"></i>
                                <input onkeyup="checkop(document.getElementById('logpassword'))" type="password" class="form-control" id="OldPassword" name="OldPassword" required>
                            </div>
                        </div>
                        <div class="textop"></div>
                        <div class="mb-3 textbox">
                            <label for="UserPassword" class="col-form-label">New Password<span>*</span></label>
                            <div>
                                <i class="fas fa-lock"></i>
                                <input onkeyup="trigger()" type="password" class="form-control" id="UserPassword" name="RegisterPassword" required>
                            </div>
                        </div>
                        <div class="indicator" id="indicator">
                            <span class="weak"></span>
                            <span class="medium"></span>
                            <span class="strong"></span>
                        </div>
                        <div class="text"></div>
                        <div class="mb-3 textbox">
                            <label for="UserCPassword" class="col-form-label">Confirm Password<span>*</span></label>
                            <div>
                                <i class="fas fa-lock"></i>
                                <input onkeyup="checkPass()" type="password" class="form-control" id="UserCPassword" name="RegisterCPassword" required>
                            </div>
                        </div>
                        <div class="textc"></div>
                        <div class="mb-3">
                            <input type="submit" name="registerbtn" value="Confirm" class="btn btn-primary" id="reg" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <?php
    include "footer.php";
    ?>
    <!--footer-->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js?version=4"></script>
</body>

</html>