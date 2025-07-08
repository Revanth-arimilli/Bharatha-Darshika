

<?php include "headtag.php"; ?>



<?php include "menubar.php"; ?>
<style>
    body {
        background: #f4f4f4;
        font-family: 'Poppins', sans-serif;
    }
    .hero-section {
        background: url('images/about-banner.jpg') center/cover no-repeat;
        height: 400px;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .hero-section h1 {
        font-size: 48px;
        font-weight: bold;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
    }
    .content-section {
        padding: 50px 20px;
    }
    .content-section h2 {
        text-align: center;
        font-weight: bold;
        color: #ff5733;
        margin-bottom: 20px;
    }
    .team-section {
        background: #fff;
        padding: 50px 20px;
        text-align: center;
    }
    .team-member img {
        width: 120px;
        border-radius: 50%;
        border: 3px solid #ff5733;
    }
    .cta-section {
        text-align: center;
        padding: 40px 20px;
        background: linear-gradient(135deg, #ff5733, #ff0080);
        color: white;
    }
</style>

<!-- Hero Section -->
<div class="hero-section">
    <h1>About Bharath Darsika</h1>
</div>


<!-- chatbot -->
<?php include "chatbot_icon.php";?>

<?php include 'footer.php'; ?>  <!-- Include your website footer -->
