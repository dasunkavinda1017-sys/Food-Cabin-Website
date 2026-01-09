 <?php
// Register backend
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // get form data safely
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $terms = isset($_POST['terms']) ? 1 : 0;

    // basic validation
    if (empty($fullname) || empty($email) || empty($password) || empty($confirm_password)) {
        die("All fields are required!");
    }

    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    if (!$terms) {
        die("You must agree to the terms and privacy policy.");
    }

    // DB connection (productsell database)
    $conn = new mysqli("localhost", "root", "", "productsell");

    if ($conn->connect_error) {
        die("Database connection failed: " . $conn->connect_error);
    }

    // check email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $check->close();
        $conn->close();
        die("Email already registered!");
    }
    $check->close();

    // hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // insert user
    $stmt = $conn->prepare(
        "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)"
    );
    $stmt->bind_param("sss", $fullname, $email, $hashedPassword);

    if ($stmt->execute()) {
        // redirect to login page after success
        header("Location: LoginHTML.html");
        exit();
    } else {
        echo "Registration failed: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
