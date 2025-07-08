<?php include "headtag.php"; ?>

<?php include "menubar.php"; ?>
<?php 


include 'db.php';  // Ensure db.php exists
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us | Bharath Darsika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
   
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center text-primary">Contact Us</h2>
    <p class="text-center">We’d love to hear from you! Reach out to us for any queries.</p>

    <div class="row">
        <!-- Contact Information -->
        <div class="col-md-5">
            <div class="contact-info">
                <i class="fas fa-map-marker-alt"></i>
                <h5>Our Location</h5>
                <p>Bharath Darsika Office, New Delhi, India</p>
                
                <i class="fas fa-envelope"></i>
                <h5>Email</h5>
                <p>info@bharathdarsika.com</p>

                <i class="fas fa-phone"></i>
                <h5>Phone</h5>
                <p>+91 98765 43210</p>

                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="col-md-7">
            <div class="contact-section">
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-100">Send Message</button>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    $name = mysqli_real_escape_string($conn, $_POST['name']);
                    $email = mysqli_real_escape_string($conn, $_POST['email']);
                    $message = mysqli_real_escape_string($conn, $_POST['message']);

                    $query = "INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$message')";
                    if (mysqli_query($conn, $query)) {
                        echo "<div class='alert alert-success mt-3'>Message Sent Successfully!</div>";
                    } else {
                        echo "<div class='alert alert-danger mt-3'>Error Sending Message.</div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Google Map Embed -->
<div class="container mt-4">
    <h3 class="text-center">Find Us Here</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d224345.8391679825!2d77.0688991217883!3d28.527280343363237!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1db1a21a5f11%3A0xe57bc9e7f383ed12!2sNew%20Delhi%2C%20Delhi!5e0!3m2!1sen!2sin!4v1647262570862!5m2!1sen!2sin" 
        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
    </iframe>
</div>

<!-- chatbot -->
<?php include "chatbot_icon.php";?>
<?php 
// Check if footer.php exists before including
$footerFile = 'footer.php';
if (file_exists($footerFile)) {
    include $footerFile;
} else {
    echo "<p style='color:red; text-align:center;'>Error: footer.php not found.</p>";
}
?>

</body>
</html>
