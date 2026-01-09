<?php
$conn = new mysqli("localhost", "root", "", "productsell");

if ($conn->connect_error) {
    die("Database connection failed");
}

$productId = $_POST['product_id'];
$report    = $_POST['report'];

// Update product report column
$sql = "UPDATE products SET reports = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $report, $productId);

echo $stmt->execute() ? "Report submitted" : "Error";
