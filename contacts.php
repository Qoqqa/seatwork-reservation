<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us - Horseplay Hotel</title>
    <link rel="stylesheet" href="/myapplication/seatworkreservation/style.css?v=1.0">
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
                <a href="profile.php">Company Profile</a>
                <a href="reservation.php">Reservations</a>
                <a href="contacts.php" class="active">Contact Us</a>
                <a href="admin/admin_login.php" class="admin-link">Admin Portal</a>
            </div>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <h1>Contact Us</h1>
            <p>We're Here to Help</p>
        </div>
    </section>

    <main class="main-content">
        <section class="section">
            <h2 class="section-title">Get in Touch</h2>
            <div class="contact-grid">
                <div class="contact-card">
                    <i class="fas fa-phone"></i>
                    <h3>Phone</h3>
                    <p>+1 (555) 123-4567</p>
                </div>
                <div class="contact-card">
                    <i class="fas fa-envelope"></i>
                    <h3>Email</h3>
                    <p>info@horseplayhotel.com</p>
                </div>
                <div class="contact-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h3>Location</h3>
                    <p>123 Luxury Lane<br>Paradise City, PC 12345</p>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">Hours of Operation</h2>
            <div class="hours-grid">
                <div class="hours-item">
                    <h3>Front Desk</h3>
                    <p>24/7</p>
                </div>
                <div class="hours-item">
                    <h3>Restaurant</h3>
                    <p>7:00 AM - 10:00 PM</p>
                </div>
                <div class="hours-item">
                    <h3>Spa</h3>
                    <p>9:00 AM - 8:00 PM</p>
                </div>
                <div class="hours-item">
                    <h3>Fitness Center</h3>
                    <p>6:00 AM - 10:00 PM</p>
                </div>
            </div>
        </section>

        <section class="section">
            <h2 class="section-title">Send Us a Message</h2>
            <form action="process_contact.php" method="POST" class="form-container">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="message-input" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </section>
    </main>

    <script>
        document.querySelector('.mobile-menu-btn').addEventListener('click', function() {
            document.querySelector('.nav-links').classList.toggle('active');
        });
    </script>
</body>

</html>
