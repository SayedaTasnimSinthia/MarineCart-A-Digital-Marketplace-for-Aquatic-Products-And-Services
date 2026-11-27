<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy — MarineCart</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="privacypolicy.css">
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

    <main class="privacy-section">
        <div class="container">
            <div class="privacy-header">
                <h1 class="privacy-title">Privacy Policy</h1>
            </div>

            <div class="privacy-card">
                <h2>1. Information We Collect</h2>
                <p>
                    MarineCart collects information required to deliver live livestock, dry aquarium equipment and specialized consulting services. This includes personal contact details such as full name, delivery address, phone number and email address submitted during account registration, marketplace checkout or newsletter subscription.
                </p>
                <p>
                    For auction participants, we monitor bidding logs, transaction records and verified account activity to maintain bidding transparency and marketplace safety across every live auction listing.
                </p>

                <h2>2. How We Use Collected Information</h2>
                <p>
                    Your data is strictly utilized to process order fulfillment, coordinate temperature-sensitive courier logistics and communicate shipment status updates. We also analyze aggregated traffic data to enhance marketplace performance and refine care guide offerings.
                </p>
                <p>
                    Subscribed email addresses receive store announcements, livestock arrivals and auction event reminders. Users can withdraw subscription preferences at any given time via our automated links.
                </p>

                <h2>3. Information Sharing and Disclosure</h2>
                <p>
                    We do not rent, trade or sell your personal details to outside marketing companies. Selected details are provided only to authorized distribution partners and verified couriers who require address details to complete doorstep deliveries across Bangladesh.
                </p>
                <p>
                    Information may also be disclosed when required by Bangladeshi law, statutory authorities or judicial proceedings to protect platform security and investigate fraudulent auction practices.
                </p>

                <h2>4. Data Storage and Security</h2>
                <p>
                    MarineCart implements multi-tier administrative protections, encrypted database connections and secure session controls to safeguard stored user information against unauthorized alterations, theft or malicious exposure.
                </p>
                <p>
                    Payment transactions are routed through encrypted third-party payment gateways. Sensitive banking credentials and mobile financial account pins are never stored on our database servers.
                </p>

                <h2>5. Policy Updates and Contact</h2>
                <p>
                    We reserve the right to amend this policy periodically to accommodate service advancements and legal changes. Continued use of MarineCart following publication confirms agreement to the updated clauses. For any inquiries regarding personal information handling, contact support@marinecart.com.bd.
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
                    <li><a href="privacypolicy.php" class="active">Privacy Policy</a></li>
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