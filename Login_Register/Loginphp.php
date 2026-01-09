 <?php
session_start();

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "productsell";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $usernameOrEmail = $_POST['username'];
    $password = $_POST['password'];

    /* ================= ADMIN LOGIN CHECK ================= */
    if ($usernameOrEmail === "admin" && $password === "1234") {

        $_SESSION['username'] = "Admin";
        $_SESSION['role'] = "admin";

        header("Location: Admin/users.php");
        exit();
    }
    /* ===================================================== */

    // NORMAL USER LOGIN
    $stmt = $conn->prepare("SELECT id, fullname, email, password FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $usernameOrEmail);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $fullname, $email, $hashedPassword);

    if ($stmt->num_rows == 1) {
        $stmt->fetch();
        if (password_verify($password, $hashedPassword)) {

            $_SESSION['username'] = $fullname;
            $_SESSION['userid'] = $id;
            $_SESSION['role'] = "user";

            header("Location: MainWindow/MainWindow.php");
            exit();

        } else {
            echo "<script>alert('Invalid password!'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('Email not registered!'); window.location.href='login.html';</script>";
    }
}

$conn->close();
?>
