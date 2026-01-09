 <?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}

$username = $_SESSION['username'];
$userid   = $_SESSION['userid'];
 
 
  // DATABASE CONNECT
 
$conn = new mysqli("localhost", "root", "", "productsell");

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

//product table select 
 $sql = "
SELECT 
    p.id,
    p.product_name,
    p.category,
    p.price,
    p.description,
    p.image,
    u.fullname
FROM products p
JOIN users u ON p.user_id = u.id
ORDER BY p.created_at DESC
";

$result = $conn->query($sql);
include('MainWindowhtml.php'); // HTML file include
?>
