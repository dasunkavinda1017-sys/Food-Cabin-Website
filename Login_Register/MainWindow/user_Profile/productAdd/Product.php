 <?php
session_start();

/* ---------- login check ---------- */
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$userid = $_SESSION['userid'];

/* ---------- DB connection ---------- */
$conn = new mysqli("localhost", "root", "", "productsell");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

/* ---------- form submit ---------- */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $product_name = $_POST['name'];
    $category     = $_POST['category'];
    $price        = $_POST['price'];
    $description  = $_POST['description'];

    $imageName = null;

    /* ---------- image upload ---------- */
    if (!empty($_FILES['image']['name'])) {

        $uploadDir = "uploads_products/";

        // folder not exist → create
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = time() . "_" . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $imageName;

        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);
    }

    /* ---------- insert query ---------- */
    $stmt = $conn->prepare(
        "INSERT INTO products 
        (user_id, product_name, category, price, description, image)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "issdss",
        $userid,
        $product_name,
        $category,
        $price,
        $description,
        $imageName
    );

    if ($stmt->execute()) {
        echo "✅ Product Saved Successfully";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    exit();
}

/* ---------- page load ---------- */
include("Product.html");
