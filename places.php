<?php
include 'db.php';

// Get selected state & category
$state_id = isset($_GET['state_id']) ? intval($_GET['state_id']) : 0;
$category_id = isset($_GET['category_id']) ? intval($_GET['category_id']) : 0;

// Validate Inputs
if ($state_id == 0 || $category_id == 0) {
    die("Invalid state or category selected.");
}

// Fetch category name
$category_query = "SELECT name FROM categories WHERE id = ?";
$category_stmt = mysqli_prepare($conn, $category_query);
mysqli_stmt_bind_param($category_stmt, "i", $category_id);
mysqli_stmt_execute($category_stmt);
$category_result = mysqli_stmt_get_result($category_stmt);
$category_row = mysqli_fetch_assoc($category_result);
$category_name = $category_row['name'] ?? "Tourist Places";

// Define category-based quotes
$category_quotes = [
    "Devotional Places" => "Faith is the bird that feels the light when the dawn is still dark. – Rabindranath Tagore",
    "Beaches" => "To go out with the setting sun on an empty beach is to truly embrace your solitude. – Jeanne Moreau",
    "Trekking" => "The best view comes after the hardest climb.",
    "Forests" => "And into the forest I go, to lose my mind and find my soul.",
    "Historical Places" => "A people without the knowledge of their past history, origin, and culture is like a tree without roots. – Marcus Garvey"
];

// Get quote for the selected category
$quote = $category_quotes[$category_name] ?? "Travel is the only thing you buy that makes you richer.";

// Fetch places for the selected state & category in alphabetical order
$query = "SELECT * FROM places WHERE state_id = ? AND category_id = ? ORDER BY name ASC";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ii", $state_id, $category_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= htmlspecialchars($category_name) ?> | Tourist Places</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            #background:linear-gradient(135deg,rgb(255, 255, 255),rgb(255, 255, 255));
            background-color:white;
            font-family: 'Poppins', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
        }


        .title {
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            text-transform: uppercase;
            background: linear-gradient(90deg,rgb(0, 0, 0),rgb(0, 0, 0));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .quote {
            text-align: center;
            font-size: 18px;
            font-style: italic;
            margin-bottom: 20px;
            color:rgb(55, 7, 7);
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            color: black;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        .transport-icons {
            font-size: 20px;
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 10px;
        }

        .transport-icons i {
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 50%;
            transition: 0.3s;
        }

        .transport-icons i:hover {
            background: rgba(255, 255, 255, 0.5);
        }

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

<!-- MeanuBar1 -->
<?php include "menubar.php"; ?>


<!-- Main Content -->
<div class="container mt-5"> <!-- Destination Start 1-->
    <!-- Service Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">DESTINATION</h6>
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
                
<!-- Dynamic Title & Quote -->
<h2 class="title"><?= htmlspecialchars($category_name) ?></h2>
<p class="quote">"<?= htmlspecialchars($quote) ?>"</p>
            </div>



<!-- Places Section -->
<div class="container">
    <div class="row" id="places-list">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-lg-4 col-md-6 mb-4 place-card">
                <div class="card">
                    <img src="uploads/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
                        <p><strong>Location:</strong> <?= htmlspecialchars($row['location']) ?></p>
                        <p><strong>Nearby Places:</strong> <?= htmlspecialchars($row['nearby_places']) ?></p>
                        <p><strong>Hotels:</strong> <?= htmlspecialchars($row['hotels']) ?></p>

                        <div class="transport-icons">
                            <i class="fas fa-plane" title="Air"></i>
                            <i class="fas fa-train" title="Rail"></i>
                            <i class="fas fa-bus" title="Bus"></i>
                            <i class="fas fa-car" title="Taxi"></i>
                        </div>

                        <a href="<?= htmlspecialchars($row['website_link']) ?>" class="btn btn-primary mt-3 w-100" target="_blank">More Info</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<script>
$(document).ready(function(){
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".place-card").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
</script>


<!-- chatbot -->
<?php include "chatbot_icon.php";?>

<!-- Footer -->

<?php include "footer.php";?>
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
