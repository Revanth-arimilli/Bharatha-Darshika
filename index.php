<?php
include 'db.php';
$result = mysqli_query($conn, "SELECT * FROM zones");
?>
<!DOCTYPE html>
<html lang="en">

<?php include "headtag.php"; ?>

<body>

<?php include "menubar.php"; ?>


<!-- MOST VISITED PLACES -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">DESTINATION</h6>
            <h1 class="mb-5">MOST VISITED PLACES</h1>
        </div>
        <div class="owl-carousel testimonial-carousel position-relative">

            <!-- Place Card Component -->
            <div class="testimonial-item bg-white text-center border p-4" onclick="showPlaceDetails('Agra Fort', 'A historic fort in Agra, Uttar Pradesh, known for its stunning architecture and rich Mughal history.', 'images/ch4.jpg')">
                <img class="mx-auto mb-3" src="images/ch4.jpg" style="width: 350px; height: 250px; object-fit: cover;">
                <h5 class="mb-2">AGRA FORT</h5>
                <button class="btn btn-explore" style="background-color: lightgreen; border: none; padding: 8px 20px; border-radius: 5px; color: white; font-weight: bold;">
                    Explore
                </button>
            </div>

            <div class="testimonial-item bg-white text-center border p-4" onclick="showPlaceDetails('Golden Temple', 'A spiritual site in Amritsar, Punjab, famous for its golden structure and Sikh history.', 'images/dp4.jpg')">
                <img class="mx-auto mb-3" src="images/dp4.jpg" style="width: 350px; height: 250px; object-fit: cover;">
                <h5 class="mb-2">GOLDEN TEMPLE</h5>
                <button class="btn btn-explore" style="background-color: lightgreen; border: none; padding: 8px 20px; border-radius: 5px; color: white; font-weight: bold;">
                    Explore
                </button>
            </div>

            <div class="testimonial-item bg-white text-center border p-4" onclick="showPlaceDetails('Taj Mahal', 'One of the Seven Wonders of the World, the Taj Mahal is a symbol of love built by Emperor Shah Jahan.', 'images/ch2.jpg')">
                <img class="mx-auto mb-3" src="images/ch2.jpg" style="width: 350px; height: 250px; object-fit: cover;">
                <h5 class="mb-2">TAJ MAHAL</h5>
                <button class="btn btn-explore" style="background-color: lightgreen; border: none; padding: 8px 20px; border-radius: 5px; color: white; font-weight: bold;">
                    Explore
                </button>
            </div>

            <div class="testimonial-item bg-white text-center border p-4" onclick="showPlaceDetails('Ajanta Caves', 'Ancient Buddhist rock-cut caves in Maharashtra, famous for their exquisite paintings and sculptures.', 'images/ad2.jpg')">
                <img class="mx-auto mb-3" src="images/ad2.jpg" style="width: 350px; height: 250px; object-fit: cover;">
                <h5 class="mb-2">AJANTA CAVES</h5>
                <button class="btn btn-explore" style="background-color: lightgreen; border: none; padding: 8px 20px; border-radius: 5px; color: white; font-weight: bold;">
                    Explore
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Place Details Modal -->
<div class="modal fade" id="placeDetailsModal" tabindex="-1" aria-labelledby="placeDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="placeTitle"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img id="placeImage" class="img-fluid mb-3" style="width: 100%; height: auto;">
                <p id="placeDescription"></p>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript for Modal -->
<script>
    function showPlaceDetails(title, description, imageSrc) {
        document.getElementById('placeTitle').innerText = title;
        document.getElementById('placeDescription').innerText = description;
        document.getElementById('placeImage').src = imageSrc;
        var placeDetailsModal = new bootstrap.Modal(document.getElementById('placeDetailsModal'));
        placeDetailsModal.show();
    }
</script>
<!-- MOST VISITED PLACES -->



<!-- Main Content -->
<div class="container mt-5"> <!-- Destination Start 1-->
    <!-- Service Start -->
 <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">DESTINATION</h6>
                <h1 class="mb-5">YOUR DESTINATION</h1>
            </div>
   
    <div class="row justify-content-center" id="zoneContainer">
        <?php 
        $images = ["images/South.webp", "images/north.webp", "images/east.webp", "images/west.webp"];
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) { 
            $image = $images[$i % count($images)];
            $i++;
        ?>
            <div class="col-md-6 mb-4 zone-card-container">
                <div class="card zone-card" onclick="location.href='states.php?zone_id=<?= $row['id'] ?>'">
                    <img src="<?= $image ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>" onerror="this.src='images/default.jpg';">
                    <div class="card-body">
                        <h5 class="card-title text-center"> <?= htmlspecialchars($row['name']) ?> </h5>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



<!-- Chatbot Floating Icon -->
<button class="chatbot-button" onclick="navigateToChatbot()" title="Chat with us">
    💬
</button>

<script>
    function navigateToChatbot() {
        window.location.href = 'chatbot.php';
    }
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