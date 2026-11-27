<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions — MarineCart</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="termscondition.css">
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

    <main class="legal-section">
        <div class="container">
            <div class="legal-header">
                <h1 class="legal-title">Terms & Conditions</h1>
            </div>

            <div class="legal-card-container">
                <div class="legal-card">
                    <p class="legal-date">Last updated: November 2026</p>

                    <div class="legal-block">
                        <h3>1. Introduction & Acceptance</h3>
                        <p>Welcome to MarineCart. By accessing or using our platform, services, marketplace and real-time bidding systems, you explicitly agree to comply with and be bound by the terms detailed herein. These provisions apply universally to all visitors, registered buyers and aquaculture merchants across all operational regions.</p>
                    </div>

                    <div class="legal-block">
                        <h3>2. Live Arrival Guarantee (LAG) Policy</h3>
                        <p>We pride ourselves on the highest standards of aquatic logistics, backed by our verified live arrival rate. To claim compensation or replacements under our guarantee protocol, the customer must observe the following conditions:</p>
                        <ul>
                            <li>The recipient or an authorized representative must accept receipt on the initial delivery attempt by our courier partners.</li>
                            <li>Uncut unboxing video evidence documenting the unopened transit container, oxygen seal integrity and water condition must be submitted within 2 hours of arrival.</li>
                            <li>Claims filed beyond the 2-hour delivery window, or involving improper water acclimation procedures, shall be considered ineligible for store credit or livestock replacement.</li>
                        </ul>
                    </div>

                    <div class="legal-block">
                        <h3>3. Real-Time Bidding & Auction Integrity</h3>
                        <p>Placing a bid on MarineCart creates a binding commercial commitment. All participants are subject to strict marketplace rules to safeguard breeder integrity and consumer trust:</p>
                        <ul>
                            <li>Every bid submitted through our auction engine constitutes an irrevocable and legally enforceable offer to acquire the subject livestock or gear.</li>
                            <li>Winning bidders are required to complete final checkout and payment within 24 hours of the recorded countdown closure.</li>
                            <li>Failure to settle winning invoices will prompt permanent suspension of auction privileges, liquidation of bidder deposits and offer reassignment to runner-up bidders.</li>
                        </ul>
                    </div>

                    <div class="legal-block">
                        <h3>4. Shipping Parameters & Transit Protocol</h3>
                        <p>All livestock packages are prepared inside climate-controlled insulated cartons with medical-grade oxygen replenishment and phase-change thermal packs. Delivery dispatches may be rescheduled at our discretion if regional adverse weather or transit delays pose mortality hazards.</p>
                        
                    </div>

                    <div class="legal-block">
                        <h3>5. Account Safety & Merchant Conduct</h3>
                        <p>Account holders are solely responsible for safeguarding authentication credentials and transaction activities. MarineCart reserves full administrative authority to restrict accounts, cancel suspect purchase requests and ban users engaged in bid-shielding or illicit trade.</p>
                    </div>

                    <div class="legal-block">
                        <h3>6. Policy Amendments & Notifications</h3>
                        <p>MarineCart reserves the right to revise or modernize these conditions to reflect changing regulatory frameworks and operational enhancements. Your continued use of the platform after notices take effect constitutes absolute assent to the updated provisions.</p>
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