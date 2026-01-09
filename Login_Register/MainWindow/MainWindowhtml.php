<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Home Page</title>
    <link rel="stylesheet" href="MainWindow.css">
    <script src="MainWindow.js" defer></script>
</head>
<body>
    <header class="header">
        <div class="header-top">
            <div>
                <h1>Hi, <?php echo htmlspecialchars($username); ?></h1>
                <h1>user Id <?php echo htmlspecialchars($userid); ?></h1>
                <p>Welcome back</p>
            </div>
            <div class="profile">
                <div class="profile-pic">   <a href="user_Profile/UserProfile.php"><button>Go Profile</button></a> </div>
                <div class="status-dot"></div>
            </div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search items...">
        </div>
        <div class="categories">
            <button class="active">All</button>
            <button>Electronics</button>
            <button>Vehicles</button>
            <button>Toys</button>
            <button>Services</button>
        </div>
    </header>
<main class="product-list">

<?php if ($result && $result->num_rows > 0): ?>
    <?php while ($row = $result->fetch_assoc()): ?>

        <article class="product-card">

            <!-- PRODUCT IMAGE -->
            <div class="product-image"
                 style="background-image:url('user_Profile/productAdd/uploads_products/<?php echo htmlspecialchars($row['image']); ?>');">
            </div>

            <div class="product-info">

                <!-- PRODUCT NAME + REPORT ICON -->
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <h3><?php echo htmlspecialchars($row['product_name']); ?></h3>

                    <!-- ⚠️ REPORT ICON -->
                    <span style="cursor:pointer; font-size:18px;"
                          onclick="toggleReport(<?php echo $row['id']; ?>)">
                        ⚠️
                    </span>
                </div>

                <p><?php echo htmlspecialchars($row['category']); ?></p>

                <span class="price">
                    Rs. <?php echo number_format($row['price'], 2); ?>
                </span>

                <p class="description">
                    <?php echo htmlspecialchars($row['description']); ?>
                </p>

                <p class="seller">
                    Seller: <?php echo htmlspecialchars($row['fullname']); ?>
                </p>

                <!-- REPORT TEXTAREA (HIDDEN BY DEFAULT) -->
                <div id="report-<?php echo $row['id']; ?>" style="display:none; margin-top:6px;">
                    <textarea
                        id="text-<?php echo $row['id']; ?>"
                        rows="3"
                        placeholder="Report this product..."
                        style="width:100%; resize:none;"></textarea>

                    <button
                        style="margin-top:5px;border: 2px solid red;   background-color: rgba(255, 0, 0, 0.2);   color: red;    padding: 6px 12px;   border-radius: 6px;     cursor: pointer;   font-weight: bold;"
                        onclick="submitReport(<?php echo $row['id']; ?>)">
                        Report
                    </button>
                </div><br>

                <button class="buy-btn">Buy Now</button>

            </div>
        </article>

    <?php endwhile; ?>
<?php else: ?>
    <p style="padding:20px;">No products available</p>
<?php endif; ?>

</main>
     
    <nav class="bottom-nav">
        <a href="#" class="active">Home</a>
        <a href="#">Saved</a>
        <a href="#">Cart</a>
        <a href="#">Profile</a>
    </nav>

    <script src="MainWindow.js" defer></script>
</body>
</html>
