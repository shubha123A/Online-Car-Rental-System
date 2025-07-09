<?php 
session_start();
ini_set('display_errors', 1); // Show errors for debugging
error_reporting(E_ALL);       // Report all errors
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Car Rental Portal | Car Listing</title>

<!-- CSS Links -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/owl.carousel.css">
<link rel="stylesheet" href="assets/css/owl.transitions.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/bootstrap-slider.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">

<!-- Theme Switcher -->
<link rel="stylesheet" href="assets/switcher/css/switcher.css">
<link rel="alternate stylesheet" href="assets/switcher/css/red.css" title="red" data-default-color="true">
<!-- Add other color switchers if needed -->

<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>

<!-- Switcher -->
<?php include('includes/colorswitcher.php');?>

<!-- Header -->
<?php include('includes/header.php');?>

<!-- Page Header -->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading"><h1>Car Listing</h1></div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Car Listing</li>
      </ul>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>

<!-- Listing -->
<section class="listing-page">
  <div class="container">
    <div class="row">

      <!-- Main Content -->
      <div class="col-md-9 col-md-push-3">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
            <?php 
            $sql = "SELECT id FROM tblvehicles";
            $query = $dbh->prepare($sql);
            $query->execute();
            $cnt = $query->rowCount();
            ?>
            <p><span><?php echo htmlentities($cnt); ?> Listings</span></p>
          </div>
        </div>

        <?php 
        $sql = "SELECT tblvehicles.*, tblbrands.BrandName, tblbrands.id AS bid  
                FROM tblvehicles 
                JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);

        if($query->rowCount() > 0) {
          foreach($results as $result) {
        ?>
        <div class="product-listing-m gray-bg">
          <div class="product-listing-img">
            <img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1); ?>" class="img-responsive" alt="Car Image">
          </div>
          <div class="product-listing-content">
            <h5>
              <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>">
                <?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->VehiclesTitle); ?>
              </a>
            </h5>
            <p class="list-price">₹<?php echo htmlentities($result->PricePerDay); ?> Per Day</p>
            <ul>
              <li><i class="fa fa-user"></i> <?php echo htmlentities($result->SeatingCapacity); ?> seats</li>
              <li><i class="fa fa-calendar"></i> <?php echo htmlentities($result->ModelYear); ?> model</li>
              <li><i class="fa fa-car"></i> <?php echo htmlentities($result->FuelType); ?></li>
            </ul>
            <a href="vehical-details.php?vhid=<?php echo htmlentities($result->id); ?>" class="btn">
              View Details <span class="angle_arrow"><i class="fa fa-angle-right"></i></span>
            </a>
          </div>
        </div>
        <?php } } else { echo "<p>No cars found.</p>"; } ?>
      </div>

      <!-- Sidebar -->
      <aside class="col-md-3 col-md-pull-9">
        <!-- Filter Widget -->
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-filter"></i> Find Your Car</h5>
          </div>
          <div class="sidebar_filter">
            <form action="search-carresult.php" method="post">
              <div class="form-group select">
                <select class="form-control" name="brand">
                  <option>Select Brand</option>
                  <?php 
                  $sql = "SELECT * FROM tblbrands";
                  $query = $dbh->prepare($sql);
                  $query->execute();
                  $brands = $query->fetchAll(PDO::FETCH_OBJ);
                  foreach($brands as $brand) {
                    echo '<option value="' . htmlentities($brand->id) . '">' . htmlentities($brand->BrandName) . '</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group select">
                <select class="form-control" name="fueltype">
                  <option>Select Fuel Type</option>
                  <option value="Petrol">Petrol</option>
                  <option value="Diesel">Diesel</option>
                  <option value="CNG">CNG</option>
                </select>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-block"><i class="fa fa-search"></i> Search Car</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Recently Listed Cars -->
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-car"></i> Recently Listed Cars</h5>
          </div>
          <div class="recent_addedcars">
            <ul>
              <?php 
              $sql = "SELECT tblvehicles.*, tblbrands.BrandName  
                      FROM tblvehicles 
                      JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand 
                      ORDER BY tblvehicles.id DESC LIMIT 4";
              $query = $dbh->prepare($sql);
              $query->execute();
              $cars = $query->fetchAll(PDO::FETCH_OBJ);
              foreach($cars as $car) {
              ?>
              <li class="gray-bg">
                <div class="recent_post_img">
                  <a href="vehical-details.php?vhid=<?php echo htmlentities($car->id); ?>">
                    <img src="admin/img/vehicleimages/<?php echo htmlentities($car->Vimage1); ?>" alt="image">
                  </a>
                </div>
                <div class="recent_post_title">
                  <a href="vehical-details.php?vhid=<?php echo htmlentities($car->id); ?>">
                    <?php echo htmlentities($car->BrandName); ?>, <?php echo htmlentities($car->VehiclesTitle); ?>
                  </a>
                  <p class="widget_price">₹<?php echo htmlentities($car->PricePerDay); ?> Per Day</p>
                </div>
              </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </aside>
    </div>
  </div>
</section>

<!-- Footer -->
<?php include('includes/footer.php');?>

<!-- Login/Register/Forgot Password -->
<?php include('includes/login.php'); ?>
<?php include('includes/registration.php'); ?>
<?php include('includes/forgotpassword.php'); ?>

<!-- Back to Top -->
<div id="back-top" class="back-top">
  <a href="#top"><i class="fa fa-angle-up"></i></a>
</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script>
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>
