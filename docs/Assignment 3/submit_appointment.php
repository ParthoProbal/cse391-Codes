<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clientName = mysqli_real_escape_string($dbConnection, $_POST['clientName']);
    $clientAddress = mysqli_real_escape_string($dbConnection, $_POST['clientAddress']);
    $clientPhone = mysqli_real_escape_string($dbConnection, $_POST['clientPhone']);
    $carLicenseNumber = mysqli_real_escape_string($dbConnection, $_POST['carLicenseNumber']);
    $carEngineNumber = mysqli_real_escape_string($dbConnection, $_POST['carEngineNumber']);
    $appointmentDate = mysqli_real_escape_string($dbConnection, $_POST['appointmentDate']);
    $mechanicId = (int)$_POST['mechanicSelect'];

    
    $today = date('Y-m-d');
    if($appointmentDate < $today) {
        echo "<script>
                alert('Error: Cannot book appointment for past dates!');
                window.history.back();
             </script>";
        exit();
    }

    $duplicateCheckQuery = "SELECT * FROM appointments WHERE carLicenseNumber = '$carLicenseNumber' AND appointmentDate = '$appointmentDate'";
    $duplicateCheckResult = mysqli_query($dbConnection, $duplicateCheckQuery);

    if (mysqli_num_rows($duplicateCheckResult) > 0) {
        echo "<script>
                alert('Error: You have already taken an appointment on this specific date!');
                window.history.back();
             </script>";
        exit();
    }

    $capacityCheckQuery = "SELECT COUNT(*) as totalAppointments FROM appointments WHERE mechanicId = $mechanicId AND appointmentDate = '$appointmentDate'";
    $capacityCheckResult = mysqli_query($dbConnection, $capacityCheckQuery);
    $capacityRow = mysqli_fetch_assoc($capacityCheckResult);
    $currentActiveAppointments = $capacityRow['totalAppointments'];

    if ($currentActiveAppointments >= 4) {
        echo "<script>
                alert('Error: This mechanic is fully occupied for the selected date. Please choose another mechanic.');
                window.history.back();
             </script>";
        exit();
    }

    $insertQuery = "INSERT INTO appointments (clientName, clientAddress, clientPhone, carLicenseNumber, carEngineNumber, appointmentDate, mechanicId) 
                    VALUES ('$clientName', '$clientAddress', '$clientPhone', '$carLicenseNumber', '$carEngineNumber', '$appointmentDate', $mechanicId)";

    if (mysqli_query($dbConnection, $insertQuery)) {
        echo "<script>
                alert('Success! Your appointment has been approved and booked.');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "Database Insertion Error: " . mysqli_error($dbConnection);
    }
}
?>