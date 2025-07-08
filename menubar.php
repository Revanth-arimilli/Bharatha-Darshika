    <!-- Spinner Start -->
     <!--
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
-->
    <!-- Spinner End -->




    <!-- Navbar & Hero Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0">
                <h1 class="text-primary m-0">
                    <img src="images/blog.png" alt="Logo">
                </i>Bharatha-Darshika</h1>
                 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="service.php" class="nav-item nav-link">Services</a>
                   
                    <a href="contact.php" class="nav-item nav-link">Contact</a>

                    <div class="nav-item nav-link dropdown">
                        <a href="#" class="btn-primary rounded-pill py-2 px-4 dropdown-toggle" data-bs-toggle="dropdown" style="color:white;">Register</a>
                        <div class="dropdown-menu m-0">
                            <a href="login.php" class="dropdown-item">LOGIN</a>
                            <a href="registration.php" class="dropdown-item">SIGN-IN</a>
                            <a href="logout.php" class="dropdown-item">LOGOUT</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </nav>
</div>
    
    <!-- Navbar & Hero End -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header position-relative">
    <!-- Video Background -->
    <video autoplay muted loop id="video-background" class="position-absolute w-100 h-100" style="object-fit: cover; top: 0; left: 0; z-index: 0;">
        <source src="images/a.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Content -->
    <div class="container py-5 position-relative" style="z-index: 1;">
        <div class="row justify-content-center py-5">
            <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Enjoy Your Vacation</h1>
                <p class="fs-4 text-white mb-4 animated slideInDown"></p>
                <div class="position-relative w-75 mx-auto animated slideInDown">
                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Search you destination...." id="text" name="text" onkeyup="showResult(this.value)" >
                    </head>
                    <body>
                    <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute top-0 end-0 me-2" style="margin-top: 7px;">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="livesearch"></div>
