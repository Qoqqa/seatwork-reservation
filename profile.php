<!DOCTYPE html>
<html lang="en">

<head>
    <title>Company Profile - Horseplay Hotel</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="brand">
                <h1>Horseplay</h1>
                <span>Luxury Hotel</span>
            </a>
            <div class="nav-links">
                <a href="home.php">Home</a>
                <a href="profile.php" class="active">Company Profile</a>
                <a href="reservation.php">Reservations</a>
                <a href="contacts.php">Contact Us</a>
                <a href="admin/admin_login.php" class="admin-link">Admin Portal</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Our Legacy</h1>
            <p>A Tradition of Excellence</p>
        </div>
    </section>

    <main class="main-content">
        <section class="section">
            <h2 class="section-title">Our Story</h2>
            <p class="section-description">
                Since our establishment in 1925, Horseplay Hotel has been synonymous with luxury and excellence in hospitality. 
                Our unique blend of traditional values and modern amenities creates an unforgettable experience for every guest.
            </p>
        </section>

        <section class="section">
            <h2 class="section-title">Our Philosophy</h2>
            <div class="feature-list">
                <div class="feature-item">
                    <i class="fas fa-star"></i>
                    <div>
                        <h3>Excellence in Service</h3>
                        <p>We strive to exceed expectations in every interaction</p>
                    </div>
                </div>
                <div class="feature-item">
                    <i class="fas fa-heart"></i>
                    <div>
                        <h3>Personalized Care</h3>
                        <p>Every guest receives individual attention and care</p>
                    </div>
                </div>
                <div class="feature-item">
                    <i class="fas fa-gem"></i>
                    <div>
                        <h3>Luxury Standards</h3>
                        <p>Maintaining the highest standards in comfort and elegance</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">Awards & Recognition</h2>
            <div class="awards-grid">
                <div class="award-card">
                    <i class="fas fa-trophy"></i>
                    <h3>Best Luxury Hotel</h3>
                    <p>2025 Best Hotel in the Whole World Awardee</p>
                </div>
                <div class="award-card">
                    <i class="fas fa-medal"></i>
                    <h3>5-Star Rating</h3>
                    <p>Forbes Travel Guide 2025</p>
                </div>
                <div class="award-card">
                    <i class="fas fa-award"></i>
                    <h3>Service Excellence</h3>
                    <p>The best of the best awardee in 2025</p>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">Environmental Commitment</h2>
            <div class="feature-list">
                <div class="feature-item">
                    <i class="fas fa-leaf"></i>
                    <div>
                        <h3>Sustainable Practices</h3>
                        <p>Implementing eco-friendly initiatives throughout our operations</p>
                    </div>
                </div>
                <div class="feature-item">
                    <i class="fas fa-recycle"></i>
                    <div>
                        <h3>Waste Reduction</h3>
                        <p>Comprehensive recycling and waste management programs</p>
                    </div>
                </div>
                <div class="feature-item">
                    <i class="fas fa-solar-panel"></i>
                    <div>
                        <h3>Energy Efficiency</h3>
                        <p>Using renewable energy sources and smart technology</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>

</html>