<?php
include 'db.php';
$zone_id = isset($_GET['zone_id']) ? intval($_GET['zone_id']) : 0;

// Fetch zone name
$zone_query = mysqli_query($conn, "SELECT name FROM zones WHERE id=$zone_id");
$zone = mysqli_fetch_assoc($zone_query);

// Fetch states in the selected zone
$result = mysqli_query($conn, "SELECT * FROM states WHERE zone_id=$zone_id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>States in <?= htmlspecialchars($zone['name']) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg,rgb(255, 255, 255),rgb(255, 255, 255));
            color: white;
            min-height: 100vh;
            padding-bottom: 20px;
        }

        
        /* Card Styling */
        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.4);
        }
        .card img {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
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

<?php include "headtag.php";?>

<body>
    
<?php include "menubar.php";?>

   
    <!-- Destination Start 1-->
    <!-- Service Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">DESTINATION</h6>
                <h1 class="mb-5">STATES</h1>
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
             <div class="row mt-4" id="state-list">
        <?php while ($row = mysqli_fetch_assoc($result)) { 
            $id = $row['id'];
            $name = htmlspecialchars($row['name']);
            $imageSrc = !empty($row['image']) ? "uploads/states/" . htmlspecialchars($row['image']) : "images/default.jpg";
        ?>
            <div class="col-md-6 col-lg-4 mb-4 state-card">
                <div class="card text-center p-3">
                    <img src="<?= $imageSrc ?>" class="card-img-top" alt="<?= $name ?>" onerror="this.src='images/default.jpg';">
                    <div class="card-body">
                        <h5 class="card-title"> <?= $name ?> </h5>
                        <a href="categories.php?state_id=<?= $id ?>" class="btn btn-primary w-100">Explore</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


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
