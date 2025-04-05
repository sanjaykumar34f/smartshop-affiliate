<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartShop India - Affiliate Deals</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <h1>SmartShop India - Affiliate Deals</h1>
        <div class="nav-links">
            <a href="index.php">Home</a>
        </div>
        <form class="search-bar" method="GET" action="index.php">
            <input type="text" name="search" placeholder="Search affiliate deals..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
            <button type="submit">Search</button>
        </form>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="product-grid">
            <?php
            // Hardcoded affiliate products
            $affiliate_products = [
                [
                    'name' => 'Dance Dress',
                    'description' => 'Flowy dress for dance performance',
                    'price' => 899.00,
                    'image' => 'images/dance-dress.jpg', // Replace with actual image path
                    'deliveryBy' => 'Amazon',
                    'delivery_days' => 3,
                    'affiliate_link' => 'https://www.amazon.in/dp/B08XYZ1234?tag=youraffiliatetag-21'
                ],
                [
                    'name' => 'Barrel Fit Jeans',
                    'description' => 'Stylish jeans for casual wear',
                    'price' => 1299.00,
                    'image' => 'images/jeans.jpg', // Replace with actual image path
                    'deliveryBy' => 'Amazon',
                    'delivery_days' => 3,
                    'affiliate_link' => 'https://www.amazon.in/dp/B09ABC4567?tag=youraffiliatetag-21'
                ]
            ];

            // Simple search functionality
            $search = isset($_GET['search']) ? strtolower($_GET['search']) : '';
            $filtered_products = $affiliate_products;
            if ($search) {
                $filtered_products = array_filter($affiliate_products, function($product) use ($search) {
                    return strpos(strtolower($product['name']), $search) !== false || strpos(strtolower($product['description']), $search) !== false;
                });
            }

            foreach ($filtered_products as $row) {
                echo "<div class='product'>";
                if (!empty($row['image'])) {
                    echo "<img src='" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>";
                } else {
                    echo "<p>No image available</p>";
                }
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p class='description'>" . htmlspecialchars($row['description']) . "</p>";
                echo "<p>Price: ₹" . number_format($row['price'], 2) . "</p>";
                echo "<p>Delivered by: " . htmlspecialchars($row['deliveryBy']) . "</p>";
                echo "<p>Delivery in: " . htmlspecialchars($row['delivery_days']) . " days</p>";
                // Include Affiliate Button
                include 'affiliate_button.php';
                echo "</div>";
            }
            if (empty($filtered_products)) {
                echo "<p>No products found.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>© 2025 SmartShop India - Affiliate Deals | Powered by Amazon Affiliates</p>
    </footer>
</body>
</html>