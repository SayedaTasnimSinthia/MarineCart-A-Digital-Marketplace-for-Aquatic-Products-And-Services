<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'subscribe') {
    while (ob_get_level()) {
        ob_end_clean();
    }
    header('Content-Type: application/json; charset=utf-8');

    require_once __DIR__ . '/db.php';

    $email = trim($_POST['email'] ?? '');

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Please provide a valid email address.'
        ]);
        exit;
    }

    $checkStmt = $conn->prepare("SELECT subscriber_key FROM subscribers WHERE email = ?");
    if (!$checkStmt) {
        echo json_encode(['status' => 'error', 'message' => 'Prepare failed: ' . $conn->error]);
        exit;
    }

    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        $checkStmt->close();
        echo json_encode([
            'status' => 'duplicate',
            'message' => 'This email is already subscribed.'
        ]);
        exit;
    }
    $checkStmt->close();

    $insertStmt = $conn->prepare("INSERT INTO subscribers (email) VALUES (?)");
    if (!$insertStmt) {
        echo json_encode(['status' => 'error', 'message' => 'Insert prepare failed: ' . $conn->error]);
        exit;
    }

    $insertStmt->bind_param("s", $email);

    if ($insertStmt->execute()) {
        $assigned_key = $insertStmt->insert_id;
        $insertStmt->close();
        $conn->close();
        echo json_encode([
            'status' => 'success',
            'message' => 'Thank you for subscribing to MarineCart!',
            'unique_key' => $assigned_key
        ]);
        exit;
    } else {
        $err = $insertStmt->error;
        $insertStmt->close();
        $conn->close();
        echo json_encode([
            'status' => 'error',
            'message' => 'Insert execution failed: ' . $err
        ]);
        exit;
    }
}

$categories = [
    [
        'id' => 1,
        'name' => 'Aquatic Foods',
        'url' => 'aquaticfood.php',
        'img' => 'images/2.jpg'
    ],
    [
        'id' => 2,
        'name' => 'Live Aquatic Pets',
        'url' => 'aquaticpet.php',
        'img' => 'images/3.jpg'
    ],
    [
        'id' => 3,
        'name' => 'Aquarium Supplies',
        'url' => 'aquriumsupplies.php',
        'img' => 'images/4.jpg'
    ],
    [
        'id' => 4,
        'name' => 'Commercial Aquaculture',
        'url' => 'commercialaquaculture.php',
        'img' => 'images/5.jpg'
    ],
    [
        'id' => 5,
        'name' => 'Water Sports Gear',
        'url' => 'gear.php',
        'img' => 'images/6.jpg'
    ]
];

$auctions = [
    [
        'id' => 101,
        'title' => 'Rare Royal Blue Discus',
        'current_bid' => 85.00,
        'min_increment' => 5.00,
        'bids_count' => 14,
        'end_timestamp' => time() + 7400,
        'image' => 'images/11.jpg'
    ],
    [
        'id' => 102,
        'title' => 'Midnight Halfmoon Betta Male',
        'current_bid' => 42.50,
        'min_increment' => 2.50,
        'bids_count' => 19,
        'end_timestamp' => time() + 14200,
        'image' => 'images/12.jpg'
    ],
    [
        'id' => 103,
        'title' => 'Albino Red Dragon Guppy Trio',
        'current_bid' => 28.00,
        'min_increment' => 2.00,
        'bids_count' => 8,
        'end_timestamp' => time() + 259200,
        'image' => 'images/13.jpg'
    ]
];

$fixed_products = [
    [
        'id' => 201,
        'category' => 'Aquatic Foods',
        'title' => 'Shrimp',
        'pricing_type' => 'per kg',
        'price' => 1400,
        'stock' => 26,
        'image' => 'images/7.jpg'
    ],
    [
        'id' => 202,
        'category' => 'Live Aquatic Pets',
        'title' => 'Ocellaris Clownfish',
        'pricing_type' => 'per unit',
        'price' => 2400,
        'stock' => 50,
        'image' => 'images/8.jpg'
    ],
    [
        'id' => 203,
        'category' => 'Aquarium Supplies',
        'title' => 'Anubias Plant Driftwood',
        'pricing_type' => 'per package',
        'price' => 1999,
        'stock' => 12,
        'image' => 'images/9.jpg'
    ],
    [
        'id' => 204,
        'category' => 'Water Sports Gear',
        'title' => 'Scuba Diving Mask',
        'pricing_type' => 'per unit',
        'price' => 1390,
        'stock' => 8,
        'image' => 'images/10.jpg'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MarineCart — Marine & Freshwater Marketplace</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
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

    <section class="hero-section">
        <div class="container hero-grid">
            <div class="hero-content">
                <h1>Healthy Species,<br><span class="highlight">Directly to Your Door</span></h1>
                <p class="hero-desc-justified">
                    The premier marketplace for healthy freshwater & marine life. Buy essential species at fixed prices or bid in real-time auctions, backed by certified care & guaranteed live arrival.
                </p>
                <div class="hero-btn-group">
                    <a href="shop.php" class="btn btn-teal">Shop Marketplace</a>
                    <a href="auctions.php" class="btn btn-coral">Explore Live Auctions</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <h3>250+</h3>
                        <p>Fish Species</p>
                    </div>
                    <div class="stat-item">
                        <h3>10K+</h3>
                        <p>Happy Customers</p>
                    </div>
                    <div class="stat-item">
                        <h3>98%</h3>
                        <p>Live Arrival Rate</p>
                    </div>
                </div>
            </div>

            <a href="index.php" class="hero-visual-card">
                <img src="images/107.jpg" alt="Aquarium Betta" class="main-showcase">
            </a>
        </div>
    </section>

    <section class="categories-section">
        <div class="container">
            <div class="section-header">
                <div class="sub-title"><h1>Explore by Category</h1></div>
            </div>
            <div class="category-grid">
                <?php foreach ($categories as $cat): ?>
                <a href="<?= htmlspecialchars($cat['url']); ?>" class="category-item">
                    <div class="category-circle">
                        <img src="<?= htmlspecialchars($cat['img']); ?>" alt="<?= htmlspecialchars($cat['name']); ?>">
                    </div>
                    <h4><?= htmlspecialchars($cat['name']); ?></h4>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="catalog-section" id="shop">
        <div class="container">
            <div class="catalog-header-bar">
                <div>
                    <div class="section-tag-teal">Store Products</div>
                    <h2 class="section-heading-blue">Featured Aquatic Essentials</h2>
                </div>
                <a href="shop.php" class="btn btn-outline">View All Products</a>
            </div>

            <div class="product-grid" id="productGrid">
                <?php foreach ($fixed_products as $p): ?>
                <div class="product-card">
                    <div>
                        <img src="<?= htmlspecialchars($p['image']); ?>" alt="<?= htmlspecialchars($p['title']); ?>">
                        <span class="category-subtitle"><?= htmlspecialchars($p['category']); ?></span>
                        <h4><?= htmlspecialchars($p['title']); ?></h4>
                    </div>
                    <div class="price-row">
                        <div class="price">Tk.<?= number_format($p['price'], 2); ?> <span>/ <?= explode(' ', $p['pricing_type'])[1] ?? 'item'; ?></span></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="auctions-section" id="auctions">
        <div class="container">
            <div class="auctions-header-bar">
                <div>
                    <div class="section-tag-coral">Real-Time Bidding</div>
                    <h2 class="section-heading-blue">Featured Live Auctions</h2>
                </div>
                <a href="auctions.php" class="btn btn-outline">View All</a>
            </div>

            <div class="auction-grid">
                <?php foreach ($auctions as $auc): ?>
                <div class="auction-card">
                    <div class="auction-img-wrapper">
                       
                            <img src="<?= htmlspecialchars($auc['image']); ?>" alt="<?= htmlspecialchars($auc['title']); ?>">
                
                        <span class="live-tag">Live Auction</span>
                        <span class="timer-badge countdown-timer" data-end="<?= $auc['end_timestamp']; ?>">Calculating...</span>
                    </div>
                    <div class="auction-body">
                        <h3><a href="auctions.php?id=<?= $auc['id']; ?>"><?= htmlspecialchars($auc['title']); ?></a></h3>
                        
                        <div class="bid-info-box">
                            <div>
                                <span class="label">Current Highest Bid</span>
                                <div class="amount" id="bid-val-<?= $auc['id']; ?>">Tk. <?= number_format($auc['current_bid'], 2); ?></div>
                            </div>
                            <div class="bid-increment-wrap">
                                <span class="label">Min Increment</span>
                                <span class="increment">+ Tk.<?= number_format($auc['min_increment'], 2); ?></span>
                            </div>
                        </div>

                        
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="care-section" id="guides">
        <div class="container care-grid">
            <div>
                <div class="section-tag-teal-spaced">Educational Resources</div>
                <h2 class="section-heading-blue-spaced">Fish Care Tips & Expert Maintenance Guides</h2>
                <p class="care-desc">
                    From setting up a first five gallon nano tank to stabilizing chemistry in a complex African Cichlid colony,
                    our certified marine specialists provide actionable, step-by-step care protocols.
                </p>
                <a href="guides.php" class="btn btn-teal">Read All Care Guides</a>
            </div>

            <div class="care-card-stack">
                <div class="care-card">
                    <div>
                        <h4>Cichlid Care in BD</h4>
                        <p>Dhaka tap water pH & rock setup guide.</p>
                    </div>
                    <a href="guides.php?topic=cichlids" class="btn btn-outline btn-compact">6 Min Read</a>
                </div>

                <div class="care-card">
                    <div>
                        <h4>Summer Goldfish Care</h4>
                        <p>Beat BD heat & avoid swim bladder issues.</p>
                    </div>
                    <a href="guides.php?topic=goldfish" class="btn btn-outline btn-compact">4 Min Read</a>
                </div>

                <div class="care-card">
                    <div>
                        <h4>Planted Tanks & CO<sub>2</sub></h4>
                        <p>Control tropical algae & local soil mix.</p>
                    </div>
                    <a href="guides.php?topic=plants" class="btn btn-outline btn-compact">8 Min Read</a>
                </div>
            </div>
        </div>
    </section>

    <div class="container" id="consultation">
        <div class="consult-banner">
            <div>
                <h2>Book an On-Site or Virtual Aquarium Consultation</h2>
                <p>Get custom plumbing blueprints, disease diagnostics, or routine water parameters auditing from experienced aquarists.</p>
                <div class="consult-btn-group">
                    <a href="consultation.php" class="btn btn-coral">Book Consultation</a>
                </div>
            </div>
            <div class="consult-direct-box">
                <h4>Direct Biologist Line</h4>
                <p class="consult-quarantine-text">Need emergency quarantine advice? Our certified specialists answer active inquiries directly through your customer profile.</p>
                <div class="consult-phone">+880 1712-345678</div>
            </div>
        </div>
    </div>

    <section class="reviews-section">
        <div class="container">
            <div class="section-header">
                <h2>Opinions From Our Customer</h2>
            </div>
            <div class="reviews-grid">
                <div class="review-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <p class="review-text">"Outstanding customer service! The Royal Blue Discus arrived vigorous and healthy in insulated packaging with warming packs."</p>
                    <div class="reviewer-meta">Luke Curran, Fishkeeper</div>
                </div>

                <div class="review-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <p class="review-text">"Won a rare Betta through their auction engine. Instant invoice generation, seamless checkout & tracking was updated constantly."</p>
                    <div class="reviewer-meta">Allen DecCosta, Auction Winner</div>
                </div>

                <div class="review-card">
                    <div class="stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half-stroke"></i>
                    </div>
                    <p class="review-text">"The bulk feed per kg option saves our retail shop hundreds every month. Stock is always freshly packed & high nutrient."</p>
                    <div class="reviewer-meta">Cassie H, Commercial Breeder</div>
                </div>
            </div>
        </div>
    </section>

    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-card">
                <div class="newsletter-content">
                    <h3>Subscribe to Our Newsletter</h3>
                    <p class="newsletter-desc">
                        Get exclusive aquatic care tips, rare livestock alerts & marketplace updates delivered straight to your inbox.
                    </p>
                    <form id="newsletter-form" class="newsletter-form">
                        <input type="email" id="newsletter-email" name="email" class="newsletter-input" placeholder="Enter your email" required />
                        <button type="submit" class="btn-subscribe">Subscribe</button>
                    </form>
                    <div id="newsletter-message" class="newsletter-msg"></div>
                </div>
                <div class="newsletter-image-wrap">
                    <img class="newsletter-image" src="images/14.jpg" alt="Aquarium Fish" />
                </div>
            </div>
        </div>
    </section>

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
    <script src="index.js?v=<?= time(); ?>"></script>
</body>
</html>