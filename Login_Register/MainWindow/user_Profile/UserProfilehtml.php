 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>User Profile - My Listings</title>
<link rel="stylesheet" href="UserProfile.css"/>
<script src="UserProfile.js" defer></script>
</head>
<body>
<div class="main-container">
    <!-- Top Bar -->
    <header>
        <div class="profile-info">
            <div class="profile-pic"></div>
            <div class="profile-details">
                <h1>Hi, <?php echo htmlspecialchars($username); ?></h1>
                <h2>User ID: <?php echo htmlspecialchars($userid); ?></h2>
            </div>
        </div>
        <form action="productAdd/Product.php" method="get">
          <button type="submit" class="add-product-btn"> Add Product </button></form>
    </header>

    <!-- Stats -->
    <section class="stats">
        <div class="stat-card">
            <p>12</p>
            <p>Active</p>
        </div>
        <div class="stat-card">
            <p>4.8</p>
            <p>Rating</p>
        </div>
        <div class="stat-card">
            <p>$4.5k</p>
            <p>Sales</p>
        </div>
    </section>

    <!-- Inventory Items -->
    <main class="inventory">
        <!-- Cards go here -->
        <div class="product-card">
            <div class="product-image" style="background-image: url('...');"></div>
            <div class="product-info">
                <p class="product-title">Sony WH-1000XM4</p>
                <p class="price">$240.00</p>
                <p class="description">Industry-leading noise canceling wireless headphones with mic. Perfect condition, original box included.</p>
                <div class="actions">
                    <button class="edit-btn">Edit</button>
                    <button class="delete-btn">Delete</button>
                </div>
            </div>
        </div>
        <!-- repeat other cards -->
    </main>
</div>
</body>
</html>
