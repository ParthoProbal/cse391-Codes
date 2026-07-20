<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'updateAppointment') {
    $appointmentId = (int)$_POST['appointmentId'];
    $newDate = mysqli_real_escape_string($dbConnection, $_POST['editDate']);
    $newMechanicId = (int)$_POST['editMechanic'];

    $capacityCheckQuery = "SELECT COUNT(*) as totalAppointments FROM appointments 
                           WHERE mechanicId = $newMechanicId AND appointmentDate = '$newDate' AND appointmentId != $appointmentId";
    $capacityCheckResult = mysqli_query($dbConnection, $capacityCheckQuery);
    $capacityRow = mysqli_fetch_assoc($capacityCheckResult);
    $currentActiveAppointments = $capacityRow['totalAppointments'];

    if ($currentActiveAppointments >= 4) {
        echo "<script>
                alert('Error: Cannot reassign. This mechanic is fully occupied (4 appointments) on that date.');
                window.location.href = 'admin.php';
              </script>";
        exit();
    }

    $updateQuery = "UPDATE appointments 
                    SET appointmentDate = '$newDate', mechanicId = $newMechanicId 
                    WHERE appointmentId = $appointmentId";

    if (mysqli_query($dbConnection, $updateQuery)) {
        echo "<script>
                alert('Success: Appointment details updated successfully!');
                window.location.href = 'admin.php';
              </script>";
    } else {
        echo "Database Update Error: " . mysqli_error($dbConnection);
    }
    exit();
}

function renderAppointmentTableRows($dbConnection) {
    $selectQuery = "SELECT a.appointmentId, a.clientName, a.clientPhone, a.carLicenseNumber, a.appointmentDate, a.mechanicId, m.mechanicName 
                    FROM appointments a 
                    JOIN mechanics m ON a.mechanicId = m.mechanicId 
                    ORDER BY a.appointmentDate ASC";
    $result = mysqli_query($dbConnection, $selectQuery);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['clientName']) . "</td>
                    <td>" . htmlspecialchars($row['clientPhone']) . "</td>
                    <td>" . htmlspecialchars($row['carLicenseNumber']) . "</td>
                    <td>" . htmlspecialchars($row['appointmentDate']) . "</td>
                    <td>" . htmlspecialchars($row['mechanicName']) . "</td>
                    <td>
                        <button class='edit-btn' onclick=\"openEditPanel('" . $row['appointmentId'] . "', '" . htmlspecialchars($row['clientName']) . "', '" . $row['appointmentDate'] . "', '" . $row['mechanicId'] . "')\">
                            Modify Appointment
                        </button>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='6' style='text-align:center;'>No appointments booked yet.</td></tr>";
    }
}
?>