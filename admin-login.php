<?php
session_start();

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === 'admin' && $password === '123456789') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = 'admin';
        header('Location: admin-dashboard.php');
        exit;
    } else {
        $error_message = 'Invalid administrator username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — MarineCart</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="admin-login.css?v=<?= time(); ?>">
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

    <main class="admin-login-section">
        <div class="login-form-container">
            <div class="login-header-box">
                <h1 class="login-main-title">Log In</h1>
            </div>

            <form action="admin-login.php" method="POST" class="admin-login-form" id="adminLoginForm" novalidate>
                <div id="clientError" class="form-error-msg" style="display: none;"></div>

                <?php if (!empty($error_message)): ?>
                <div class="form-error-msg">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span><?= htmlspecialchars($error_message); ?></span>
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-input" placeholder="Enter your username..." required autofocus autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password..." required autocomplete="current-password">
                </div>

                <div class="form-btn-box">
                    <button type="submit" class="btn-admin-submit">Login</button>
                </div>
            </form>
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

    <script src="admin-login.js?v=<?= time(); ?>"></script>
</body>
</html>