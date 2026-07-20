<?php
session_start();
include 'config.php';

$response = ['success' => false];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminId = mysqli_real_escape_string($dbConnection, $_POST['adminId']);
    $adminPassword = mysqli_real_escape_string($dbConnection, $_POST['adminPassword']);
    
    $query = "SELECT * FROM admins WHERE adminId = '$adminId' AND adminPassword = '$adminPassword'";
    $result = mysqli_query($dbConnection, $query);
    
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_id'] = $adminId;
        $response['success'] = true;
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>