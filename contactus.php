<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us — MarineCart</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="contactus.css">
</head>
<body>

    <header class="navbar">
        <div class="nav-wrapper-full">
           <a href="index.php" class="brand-logo">
            <i class="fa-solid fa-water"></i>
            <div class="brand-text">Marine<span>Cart</span></div>
        </a>

            <div class="nav-right-cluster">
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="auctions.php">Live Auctions</a></li>
                    <li><a href="shop.php">Shop Marketplace</a></li>
                    <li><a href="guides.php">Care Guides</a></li>
                    <li><a href="consultation.php">Consulting</a></li>
                    <li><a href="contactus.php" class="active">Contact Us</a></li>
                </ul>

                <div class="nav-actions">
                    <a href="cart.php" class="btn-badge" title="View Cart">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="badge-count" id="cartBadgeCount">0</span>
                    </a>
                    <a href="login.php" class="btn btn-outline btn-signin">Register / Login</a>
                </div>
            </div>
        </div>
    </header>

    <main class="contact-section">
        <div class="container">
            <div class="contact-header">
                <h1 class="contact-title">Contact Us</h1>
            </div>

            <div class="contact-grid">
                <div class="contact-card">
                    <div class="contact-card-title">
                        <i class="fa-solid fa-house-chimney icon-coral"></i>
                        <h3>Office Address</h3>
                    </div>
                    <div class="contact-card-body">
                    
                        <p>Town Hall Market</p>
                        <p>Asad Avenue, Mohammadpur</p>
                        <p>Dhaka - 1207, Bangladesh</p>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-card-title">
                        <i class="fa-solid fa-mobile-screen-button icon-teal"></i>
                        <h3>Phone</h3>
                    </div>
                    <div class="contact-card-body">
                        <p>+880 (2) 818-1234   <span class="tag-meta"> (Hotline)</span></p>
                        <p>+880 1712-345678   <span class="tag-meta"> (Support)</span></p>
                        <p>+880 1912-345678   <span class="tag-meta"> (WhatsApp)</span></p>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-card-title">
                        <i class="fa-solid fa-envelope icon-purple"></i>
                        <h3>Email</h3>
                    </div>
                    <div class="contact-card-body">
                        <p>info@marinecart.com.bd</p>
                        <p>support@marinecart.com.bd</p>
                
                        <p>auctions@marinecart.com.bd</p>
                    </div>
                </div>

                <div class="contact-card">
                    <div class="contact-card-title">
                        <i class="fa-regular fa-clock icon-amber"></i>
                        <h3>Working Hours</h3>
                    </div>
                    <div class="contact-card-body">
                        <p class="highlight-line">Sunday – Thursday:</p>
                        <p class="mb-sm">9:00 AM – 6:00 PM (BST)</p>
                        <p class="highlight-line">Friday – Saturday:</p>
                        <p>Emergency Support Only (24/7)</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-wrapper-full">
            <div class="footer-brand">
                <a href="index.php" class="brand-logo footer-logo">
                    <i class="fa-solid fa-water footer-logo-icon"></i>
                    <div class="brand-text">Marine<span class="footer-logo-span">Cart</span>
                </div>
            </a>
                <p>Your unified destination for ornamental aquatics, commercial farming,</p>
                <p class="footer-desc-spaced">wild watersports gear & sustainably harvested seafood.</p>
                <div class="footer-social-links">
                    <a href="https://www.facebook.com" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                    <a href="https://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.whatsapp.com" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                </div>
            </div>

            <div class="footer-col">
                <h4>Legal & Support</h4>
                <ul>
                    <li><a href="about.php">About</a></li>
                    <li><a href="privacypolicy.php">Privacy Policy</a></li>
                    <li><a href="cookiepolicy.php">Cookie Policy</a></li>
                    <li><a href="termscondition.php">Terms and Conditions</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            &copy; MarineCart 2026. All rights reserved.
        </div>
    </footer>

</body>
</html>