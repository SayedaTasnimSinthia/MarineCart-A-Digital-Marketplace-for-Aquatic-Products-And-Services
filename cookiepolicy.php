<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Policy — MarineCart</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="cookiepolicy.css">
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
                    <li><a href="contactus.php">Contact Us</a></li>
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

    <main class="cookie-section">
        <div class="container">
            <div class="cookie-header">
                <h1 class="cookie-title">Cookie Policy</h1>
            </div>

            <div class="cookie-card">
                <h2>1. What Are Cookies</h2>
                <p>
                    Cookies are small text files placed on your device when you browse websites. They enable the platform to remember your navigation choices, shopping cart records and session credentials across browsing visits to provide a dependable experience across our marketplace.
                </p>

                <h2>2. Essential Session Cookies</h2>
                <p>
                    These cookies are strictly required for the platform to operate properly. They keep track of active user sessions, authenticate logged accounts and maintain your active cart count as you switch between species catalog listings, live auction rooms and checkout pipelines. Without these files, foundational functions such as bidding and ordering cannot operate.
                </p>

                <h2>3. Performance and Analytics Cookies</h2>
                <p>
                    MarineCart analyzes anonymous aggregate visitor behavior to evaluate store load speed, catalog search popularity and navigation traffic flows across devices. This diagnostic data helps us enhance server bandwidth during high volume live auction events and optimize site stability for customers throughout Bangladesh.
                </p>

                <h2>4. Functional Preferences</h2>
                <p>
                    Preference cookies store your selected operational settings such as localized currency representation, volume alerts for countdown auction endings and saved filter categories across fish supplies. These files reduce the need to reconfigure marketplace preferences upon each return visit.
                </p>

                <h2>5. Managing Cookie Preferences</h2>
                <p>
                    You can manage, restrict or delete browser cookies through your personal web browser configuration settings. Disabling essential session cookies may impair cart functionality, auction bidding submissions and account authentication mechanisms across MarineCart. For technical assistance regarding saved browser preferences, contact support@marinecart.com.bd.
                </p>
            </div>
        </div>
    </main>

    <footer>
        <div class="footer-wrapper-full">
            <div class="footer-brand">
                <a href="index.php" class="brand-logo footer-logo">
                    <i class="fa-solid fa-water footer-logo-icon"></i>
                    <div class="brand-text">Marine<span class="footer-logo-span">Cart</span></div>
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
                    <li><a href="cookiepolicy.php" class="active">Cookie Policy</a></li>
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