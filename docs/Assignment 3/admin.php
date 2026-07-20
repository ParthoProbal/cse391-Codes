<?php 
session_start();
if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: index.php");
    exit();
}
include 'admin_backend.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Car Workshop</title>
    <link rel="stylesheet" href="styleAdmin.css">
</head>
<body>
    <header>
        <h1>Admin Control Panel</h1>
        <a href="logout.php" class="logout-btn">Logout</a>
    </header>
    <main class="admin-container">
        <section class="table-section">
            <h2>Current Appointment Lists</h2>
            <table id="appointmentsTable">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Phone</th>
                        <th>Car Registration (License) No</th>
                        <th>Appointment Date</th>
                        <th>Assigned Mechanic</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php renderAppointmentTableRows($dbConnection); ?>
                </tbody>
            </table>
        </section>
        <section id="editPanel" class="edit-section" style="display: none;">
            <h3>Modify Appointment Settings</h3>
            <form id="editForm" action="admin_backend.php" method="POST">
                <input type="hidden" id="editAppointmentId" name="appointmentId">
                <input type="hidden" name="action" value="updateAppointment">
                <div class="form-group">
                    <label>Modifying Client:</label>
                    <input type="text" id="editClientName" readonly class="readonly-input">
                </div>
                <div class="form-group">
                    <label for="editDate">Change Appointment Date:</label>
                    <input type="date" id="editDate" name="editDate" required>
                </div>
                <div class="form-group">
                    <label for="editMechanic">Reassign Mechanic:</label>
                    <select id="editMechanic" name="editMechanic" required>
                        <?php 
                        $mechanicQuery = "SELECT mechanicId, mechanicName FROM mechanics";
                        $mechanicResult = mysqli_query($dbConnection, $mechanicQuery);
                        while($mRow = mysqli_fetch_assoc($mechanicResult)) {
                            echo "<option value='" . $mRow['mechanicId'] . "'>" . htmlspecialchars($mRow['mechanicName']) . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="action-buttons">
                    <button type="submit" class="save-btn">Save Changes</button>
                    <button type="button" class="cancel-btn" onclick="closeEditPanel()">Cancel</button>
                </div>
            </form>
        </section>
    </main>
    <script src="scriptAdmin.js"></script>
</body>
</html>