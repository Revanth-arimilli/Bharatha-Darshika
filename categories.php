<?php
include 'db.php';

$state_id = isset($_GET['state_id']) ? intval($_GET['state_id']) : 0;

// Define exactly five categories with sample images
$categories = [
    ["id" => 3, "name" => "Beaches_Coastal_Places", "image" => "images/beaches.webp"],
    ["id" => 1, "name" => "Adventure_Places", "image" => "images/adventure.webp"],
    ["id" => 2, "name" => "Devotional_Places", "image" => "images/devotional.webp"],
    ["id" => 5, "name" => "Nature_Wildlife_Places", "image" => "images/wildlife.webp"],
    ["id" => 4, "name" => "Cultural_Heritage_Places", "image" => "images/cultural.webp"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            
            background: linear-gradient(135deg,rgb(255, 255, 255),rgb(255, 255, 255));
            font-family: 'Poppins', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
        }

        
        /* Category Cards */
        .category-card {
            border-radius: 12px;
            overflow: hidden;
            background: rgba(244, 241, 241, 0.95);
            text-align: center;
            padding: 15px;
            transition: transform 0.3s ease-in-out;
        }
        .category-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
        }
        .category-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 12px;
        }
        .category-title {
            font-size: 20px;
            font-weight: bold;
            text-transform: uppercase;
            color: black;
            margin-top: 10px;
        }

        /* Footer */
        .footer {
            background: rgba(0, 0, 0, 0.9);
            color: white;
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }
    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">

<?php include "headtag.php"; ?>

<body>

<?php include "menubar.php"; ?>



<!-- Main Content -->
<div class="container mt-5"> <!-- Destination Start 1-->
    <!-- Service Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">DESTINATION</h6>
                <h1 class="mb-5">CATEGORIES</h1>
            </div>
            <!-- Back Button -->
<div class="container mt-3 d-flex justify-content-end">
    <button class="btn btn-outline-primary d-flex align-items-center" onclick="goBack()">
        <i class="bi bi-arrow-left me-2"></i> Back
    </button>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

<!-- Add Bootstrap Icons if not already included -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">


<!-- Categories Section -->
<div class="container">
    <div class="row mt-4" id="category-list">
        <?php foreach ($categories as $category) { ?>
            <div class="col-md-6 col-lg-4 mb-4 category-card-container">
                <div class="category-card">
                    <a href="places.php?state_id=<?= $state_id ?>&category_id=<?= $category['id'] ?>">
                        <img src="<?= $category['image'] ?>" alt="<?= $category['name'] ?>" onerror="this.src='images/default.jpg';">
                        <div class="category-title"> <?= $category['name'] ?> </div>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- chatbot -->
<?php include "chatbot_icon.php";?>

<!-- Footer -->
<?php include "footer.php";?>

<script>
    // ✅ Live Search Functionality
    $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".category-card-container").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>
