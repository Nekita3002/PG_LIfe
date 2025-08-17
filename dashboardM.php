<?php
session_start(); // after login the name will be shown changes that u made to show
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard M| PG Life</title>
    <?php
    include "includes/head_links.php";
    ?>
    <div id="loading">
    </div>
    <link href="css/dashboard.css" rel="stylesheet" />
</head>
<body>
<div class="header sticky-top">
        <nav class="navbar navbar-expand-lg navbar-light ">
              <a class="navbar-brand" href="index_home.php">
                <img src="img\logo.png"/>
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar" aria-controls="mynavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="mynavbar">
                <ul class="navbar-nav">
                <?php
                //Check if user is logged-in or not
                if (!isset($_SESSION["user_id"])) {     //session
                ?>
                 <li class="nav-item">
                    <a class="nav-link" aria-current="page" data-bs-toggle="modal" data-bs-target="#signup-modal">
                    <i class="fas fa-user"></i>Signup
                    </a>
                 </li>
                 <div class="nav-vl"></div>
                 <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#login-modal">
                    <i class="fas fa-sign-in-alt"></i>Login
                    </a>
                 </li>
                <?php
                } else {
                ?>
                    <div class='nav-name'>
                        Hi, <?php echo $_SESSION["full_name"] ?>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboardM.php">
                            <i class="fas fa-user"></i>Dashboard
                        </a>
                    </li>
                    <div class="nav-vl"></div>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i>Logout
                        </a>
                    </li>
                </ul>
                <?php
          }
          ?>
              </div>
          </nav>
    </div>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-2">
          <li class="breadcrumb-item">
            <a href="index_home.php">Home</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            Dashboard
          </li>
        </ol>
      </nav>
    
      <div class="my-profile page-container">
      <h1>My Profile</h1>
      <div class="row">
        <div class="col-md-3 profile-img-container">
            <i class="fas fa-user profile-img"></i>
        </div>
        <div class="col-md-9">
            <div class="row justify-content-between align-items-end profile-content">
                <div class="profile col-md-auto">
                    <div class="name">Aditya Sood</div>
                    <div class="email">aditya@gmail.com</div>
                    <div class="phone">9876543210</div>
                    <div class="college">Internshala</div>
                </div>
                <div class="edit col-md-auto">
                    <div class="edit-profile justify-content-end">Edit Profile</div>
                </div>
            </div>
         </div>
        </div>
</div>

<div class="interested-properties">
    <div class="page-container">
        <h1>My Interested Properties</h1>
        <div class="property-card property-id-1 row">
            <div class="image-container col-md-4">
                <img src="img\properties\1\eace7b9114fd6046.jpg"/>
            </div>
            <div class="col-md-8">
                <div class="row containers">
                    <div class="star-container col-10" title="4.8">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="interested-container col-2">
                        <i class="is-interested-image fas fa-heart"></i>
                    </div>
                    <div class="detail-container">
                            <div class="property-name">Ganpati Paying Guest</div>
                            <div class="property-address">Police Beat, Sainath Complex, Besides, SV Rd, Daulat Nagar, Borivali East, Mumbai - 400066</div>
                            <div class="property-gender">
                                <img src="img\unisex.png"/>
                            </div>
                    </div>
                    <div class="row">
                            <div class="rent-container col-6">
                                <div class="rent">₹ 8,500/-</div>
                                <div class="rent-unit"> per month</div>
                            </div>
                            <div class="button-container col-6">
                                <a href="detailMY.php" class="btn btn-primary">View</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="property-card property-id-2 row">
            <div class="image-container col-md-4">
                <img src="img\properties\1\1d4f0757fdb86d5f.jpg"/>
            </div>
            <div class="col-md-8">
                <div class="row ccontainers">
                    <div class="star-container col-10" title="4.5">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <div class="interested-container col-2">
                        <i class="is-interested-image fas fa-heart"></i>
                    </div>
                    <div class="detail-container">
                            <div class="property-name">Navkar Paying Guest</div>
                            <div class="property-address">44, Juhu Scheme, Juhu, Mumbai, Maharashtra 400058</div>
                            <div class="property-gender">
                                <img src="img\male.png"/>
                            </div>
                    </div>
                    <div class="row">
                            <div class="rent-container col-6">
                                <div class="rent">₹ 9,500/-</div>
                                <div class="rent-unit"> per month</div>
                            </div>
                            <div class="button-container col-6">
                                <a href="detailMY.php" class="btn btn-primary">View</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    //  include "includes/signup-modal.php";//No need to include this file
    //  include "includes/login-modal.php";
     include "includes/footer.php";

 ?>
</body>
</html>