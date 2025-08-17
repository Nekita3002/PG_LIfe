<?php
session_start(); // after login the name will be shown changes that u made to show
require "includes/database-connect.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
$property_id = $_GET["property_id"];

$sql_1 = "SELECT *, p.id AS property_id, p.name AS property_name, c.name AS city_name 
            FROM properties p
            INNER JOIN cities c ON p.city_id = c.id 
            WHERE p.id = $property_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$property = mysqli_fetch_assoc($result_1);
if (!$property) {
    echo "Something went wrong!";
    return;
}


$sql_2 = "SELECT * FROM testimonials WHERE property_id = $property_id";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$testimonials = mysqli_fetch_all($result_2, MYSQLI_ASSOC);


$sql_3 = "SELECT a.* 
            FROM amenities a
            INNER JOIN properties_amenities pa ON a.id = pa.amenity_id
            WHERE pa.property_id = $property_id";
$result_3 = mysqli_query($conn, $sql_3);
if (!$result_3) {
    echo "Something went wrong!";
    return;
}
$amenities = mysqli_fetch_all($result_3, MYSQLI_ASSOC);


$sql_4 = "SELECT * FROM interested_users_properties WHERE property_id = $property_id";
$result_4 = mysqli_query($conn, $sql_4);
if (!$result_4) {
    echo "Something went wrong!";
    return;
}
$interested_users = mysqli_fetch_all($result_4, MYSQLI_ASSOC);
$interested_users_count = mysqli_num_rows($result_4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GANAPATI</title>
    <?php
    include "includes/head_links.php";
    ?>
    <div id="loading">
    </div>
    <link href="css\property_detail.css" rel="stylesheet"/>
</head>
<body>
  <?php
    include "includes/header.php";
    ?>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb py-2">
        <li class="breadcrumb-item">
          <a href="index_home.php">Home</a>
        </li>
        <li class="breadcrumb-item">
          <!--  -->
          <a href="property_list.php?city=Mumbai">Mumbai</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Ganapati Paying Guest
        </li>
      </ol>
    </nav>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img\properties\1\1d4f0757fdb86d5f.jpg" class="d-block w-100" alt="slide">
        </div>
        <div class="carousel-item">
          <img src="img\properties\1\46ebbb537aa9fb0a.jpg" class="d-block w-100" alt="slide">
        </div>
        <div class="carousel-item">
          <img src="img\properties\1\eace7b9114fd6046.jpg" class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="property-summary page-container">
      <!-- <div class="row  justify-content-between">
        <div class="star-container col-auto" title="4.8">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
        </div>
        <div class="interested-container col-auto">
          <i class="is-interested-image far fa-heart"></i>
          <div class="interested-text">
            <span class="interested-user-count">6</span> interested
          </div>
        </div>
      </div> -->
      <div class="row no-gutters justify-content-between">
            <?php
            $total_rating = ($property['rating_clean'] + $property['rating_food'] + $property['rating_safety']) / 3;
            $total_rating = round($total_rating, 1);
            ?>
            <div class="star-container col-auto" title="<?= $total_rating ?>">
                <?php
                $rating = $total_rating;
                for ($i = 0; $i < 5; $i++) {
                    if ($rating >= $i + 0.8) {
                ?>
                        <i class="fas fa-star"></i>
                    <?php
                    } elseif ($rating >= $i + 0.3) {
                    ?>
                        <i class="fas fa-star-half-alt"></i>
                    <?php
                    } else {
                    ?>
                        <i class="far fa-star"></i>
                <?php
                    }
                }
                ?>
            </div>
            <div class="interested-container">
                <?php
                $is_interested = false;
                foreach ($interested_users as $interested_user) {
                    if ($interested_user['user_id'] == $user_id) {
                        $is_interested = true;
                    }
                }

                if ($is_interested) {
                ?>
                    <i class="is-interested-image fas fa-heart"></i>
                <?php
                } else {
                ?>
                    <i class="is-interested-image far fa-heart"></i>
                <?php
                }
                ?>
                <div class="interested-text">
                    <span class="interested-user-count"><?= $interested_users_count ?></span> interested
                </div>
            </div>
        </div>
      <div class="detail-container">
      <div class="property-name">Ganapati Paying Guest</div>
      <div class="prperty-address">Police Beat, Sainath Complex, Besides, SV Rd, Daulat Nagar, Borivali East, Mumbai - 400066</div>
      <div class="property-gender">
        <img src="img\unisex.png" alt="gender">
      </div>
    </div>
    <div class="row no-gutters">
      <div class="rent-container col-6">
        <div class="rent">Rs 8,500/-</div>
        <div class="rent-unit"> per month</div>
      </div>
      <div class="button-container col-6">
        <a href="#" class="btn btn-primary">Book Now</a>
      </div>
    </div>
  </div>
   <div class="property-amenities">
    <div class="page-container">
      <h1>Amenities</h1>
      <div class="row justify-content-between" >
        <div class="col-md-auto">
          <h5>Building</h5>
          <div class="amenity-container">
            <img src="img/amenities/powerbackup.svg">
                <span>Power backup</span>
          </div>
          <div class="amenity-container">
            <img src="img/amenities/lift.svg">
            <span>Lift</span>
         </div>
        </div>

        <div class="col-md-auto">
          <h5>Common Area</h5>
          <div class="amenity-container">
            <img src="img/amenities/wifi.svg">
            <span>Wifi</span>
        </div>
        <div class="amenity-container">
            <img src="img/amenities/tv.svg">
            <span>TV</span>
        </div>
        <div class="amenity-container">
            <img src="img/amenities/rowater.svg">
            <span>Water Purifier</span>
        </div>
        <div class="amenity-container">
            <img src="img/amenities/dining.svg">
            <span>Dining</span>
        </div>
        <div class="amenity-container">
            <img src="img/amenities/washingmachine.svg">
            <span>Washing Machine</span>
        </div>
        </div>

        <div class="col-md-auto">
          <h5>Bedroom</h5>
          <div class="amenity-container">
            <img src="img/amenities/bed.svg">
            <span>Bed with Matress</span>
        </div>
        <div class="amenity-container">
            <img src="img/amenities/ac.svg">
            <span>Air Conditioner</span>
        </div>
        </div>

        <div class="col-md-auto">
          <h5>Washroom</h5>
          <div class="amenity-container">
            <img src="img/amenities/geyser.svg">
            <span>Geyser</span>
        </div>
        </div>
      </div>
    </div>
   </div>
   
    <div class="property-about page-container">
      <h1>About the Property</h1>
      <p>Furnished studio apartment - share it with close friends! Located in posh area of Bijwasan in Delhi, this house is available for both boys and girls. Go for a private room or opt for a shared one and make it your own abode. Go out with your new friends - catch a movie at the nearest cinema hall or just chill in a cafe which is not even 2 kms away. Unwind with your flatmates after a long day at work/college. With a common living area and a shared kitchen, make your own FRIENDS moments. After all, there's always a Joey with unlimited supply of food. Remember, all it needs is one crazy story to convert a roomie into a BFF. What's nearby/Your New Neighborhood 4.0 Kms from Dwarka Sector- 21 Metro Station.</p>
    </div>
   <div class="property-rating">
    <div class="page-container">
      <h1>Property Rating</h1>
      
      <!-- <div class="row align items-center justify-content-between"> -->
      <div class="row justify-content-between">
        <div class="col-md-6">
          <div class="rating-criteria row">
            <div class="col-6">
              <i class="rating-criteria-icon fas fa-broom"></i>
              <span class="rating-criteria-text">Cleanliness</span>
            </div>
            <div class="rating-criteria-star-container col-6" title="4.3">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>

          <div class="rating-criteria row">
            <div class="col-6">
                <i class="rating-criteria-icon fas fa-utensils"></i>
                <span class="rating-criteria-text">Food Quality</span>
            </div>
            <div class="rating-criteria-star-container col-6" title="3.4">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
            </div>
        </div>
        
        <div class="rating-criteria row">
          <div class="col-6">
            <i class="rating-criteria-icon fas fa-lock"></i>
            <span class="rating-criterria-text">Safety</span>
          </div>
          <div class="rating-criteria-star-container col-6" title="4.8">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
        </div>
        </div>

        <div class="col-md-4">
          <div class="rating-circle">
            <div class="total-rating">4.2</div>
            <div class="rating-circle-star-container">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div> 

  <div class="property-testiimonials page-container">
    <h1>What people say</h1>
    <div class="testimonial-block">
      <div class="testimonial-image-container">
        <img class="testimonial-img" src="img\man.png" alt="profilePic">
      </div>
      <div class="testimonial-text">
        <i class="fa fa-quote-left" aria-hidden="true"></i>
            <p>You just have to arrive at the place, it's fully furnished and stocked with all basic amenities and services and even your friends are welcome.</p>
      </div>
      <div class="testimonial-name">- Ashutosh Gowariker</div>
    </div>
    <div class="testimonial-block">
      <div class="testimonial-image-container">
        <img class="testimonial-img" src="img/man.png">
      </div>
      <div class="testimonial-text">
        <i class="fa fa-quote-left" aria-hidden="true"></i>
        <p>You just have to arrive at the place, it's fully furnished and stocked with all basic amenities and services and even your friends are welcome.</p>
    </div>
    <div class="testimonial-name">- Karan Johar</div>
    </div>
  </div>
  <?php
     include "includes/signup-modal.php";
     include "includes/login-modal.php";
     include "includes/footer.php";
  ?>
</body>
</html>