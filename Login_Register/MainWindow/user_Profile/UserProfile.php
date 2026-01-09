 <?php
session_start();

// User login check
if(!isset($_SESSION['username'])){
    header("Location: login.html");
    exit();
}

// session variables
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];

// Include HTML layout
include('UserProfilehtml.php');  // HTML only page
?>
