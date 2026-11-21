<?php
session_start();

$error_message = $_SESSION['register_error'] ?? '';
$is_registered_success = $_SESSION['register_success'] ?? false;
unset($_SESSION['register_error']);
unset($_SESSION['register_success']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/db.php';

    $fullName = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if (empty($fullName) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['register_error'] = 'Please complete all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['register_error'] = 'Please enter a valid email address.';
    } elseif ($password !== $confirmPassword) {
        $_SESSION['register_error'] = 'Passwords do not match.';
    } elseif (strlen($password) < 6) {
        $_SESSION['register_error'] = 'Password must be at least 6 characters long.';
    } else {
        $checkStmt = $conn->prepare("SELECT customer_id FROM customers WHERE email = ?");
        if ($checkStmt) {
            $checkStmt->bind_param("s", $email);
            $checkStmt->execute();
            $checkStmt->store_result();

            if ($checkStmt->num_rows > 0) {
                $_SESSION['register_error'] = 'An account with this email address already exists.';
                $checkStmt->close();
            } else {
                $checkStmt->close();
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $insertStmt = $conn->prepare("INSERT INTO customers (full_name, email, password) VALUES (?, ?, ?)");

                if ($insertStmt) {
                    $insertStmt->bind_param("sss", $fullName, $email, $hashedPassword);
                    if ($insertStmt->execute()) {
                        $insertStmt->close();
                        $conn->close();
                        $_SESSION['register_success'] = true;
                    } else {
                        $_SESSION['register_error'] = 'Registration failed. Please try again.';
                        $insertStmt->close();
                    }
                } else {
                    $_SESSION['register_error'] = 'Database preparation failed.';
                }
            }
        } else {
            $_SESSION['register_error'] = 'Database query failed.';
        }
    }

    header('Location: customer-register.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Register — MarineCart</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css?v=<?= time(); ?>">
    <link rel="stylesheet" href="customer-register.css?v=<?= time(); ?>">
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

    <main class="register-section">
        <div class="register-container">
            <div class="register-header-box">
                <h1 class="register-main-title">REGISTER</h1>
            </div>

            <?php if ($is_registered_success): ?>
            <div id="registrationSuccessBanner" class="form-success-banner">
                Account created successfully! Redirecting to log in...
            </div>
            <?php endif; ?>

            <form action="customer-register.php" method="POST" class="register-form" id="registerForm" autocomplete="off" novalidate>
                <div id="clientError" class="form-error-msg" style="display: none;"></div>

                <?php if (!empty($error_message)): ?>
                <div class="form-error-msg" id="serverErrorMsg">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span><?= htmlspecialchars($error_message); ?></span>
                </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" id="fullName" name="full_name" class="form-input" placeholder="Enter your full name..." autocomplete="off" required autofocus <?= $is_registered_success ? 'disabled' : ''; ?>>
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email address..." autocomplete="off" required <?= $is_registered_success ? 'disabled' : ''; ?>>
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-input" placeholder="Create a strong password..." autocomplete="new-password" required <?= $is_registered_success ? 'disabled' : ''; ?>>
                </div>

                <div class="form-group">
                    <label for="confirmPassword" class="form-label">Re-enter Your Password</label>
                    <input type="password" id="confirmPassword" name="confirm_password" class="form-input" placeholder="Repeat your password to verify..." autocomplete="new-password" required <?= $is_registered_success ? 'disabled' : ''; ?>>
                </div>

                <div class="form-btn-box">
                    <button type="submit" class="btn-register-submit" <?= $is_registered_success ? 'disabled' : ''; ?>>Register</button>
                </div>

                <div class="switch-auth-link">
                    <a href="customer-login.php">Already Have An Account? Click Here To Login</a>
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

    <script src="customer-register.js?v=<?= time(); ?>"></script>
</body>
</html>