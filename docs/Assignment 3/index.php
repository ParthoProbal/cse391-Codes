<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Workshop Appointment System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Car Workshop Appointment System</h1>
        <button id="adminLoginBtn" class="admin-toggle-btn">Admin Login</button>
    </header>
    <main class="container">
        <section class="form-section">
            <h2>Book an Appointment</h2>
            <form id="appointmentForm" action="submit_appointment.php" method="POST">
                <div class="form-group">
                    <label for="clientName">Full Name:</label>
                    <input type="text" id="clientName" name="clientName" required placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="clientAddress">Address:</label>
                    <input type="text" id="clientAddress" name="clientAddress" required placeholder="Enter your address">
                </div>
                <div class="form-group">
                    <label for="clientPhone">Phone Number:</label>
                    <input type="text" id="clientPhone" name="clientPhone" required placeholder="e.g., 01712345678">
                </div>
                <div class="form-group">
                    <label for="carLicense">Car Registration (License) No:</label>
                    <input type="text" id="carLicense" name="carLicenseNumber" required placeholder="e.g., Dhaka-Metro-1234">
                </div>
                <div class="form-group">
                    <label for="carEngine">Car Engine Number:</label>
                    <input type="text" id="carEngine" name="carEngineNumber" required placeholder="Enter engine number">
                </div>
                <div class="form-group">
                    <label for="appointmentDate">Appointment Date:</label>
                    <input type="date" id="appointmentDate" name="appointmentDate" required>
                </div>
                <div class="form-group">
                    <label for="mechanicSelect">Select Desired Mechanic:</label>
                    <select id="mechanicSelect" name="mechanicSelect" required>
                        <option value="" disabled selected>-- Choose a Mechanic --</option>
                        <?php
                        include 'config.php';
                        $mechanicQuery = "SELECT mechanicId, mechanicName FROM mechanics";
                        $mechanicResult = mysqli_query($dbConnection, $mechanicQuery);
                        while($mRow = mysqli_fetch_assoc($mechanicResult)) {
                            $mid = $mRow['mechanicId'];
                            $mname = htmlspecialchars($mRow['mechanicName']);
                            echo "<option value='$mid'>$mname</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="submit-btn">Submit Appointment</button>
            </form>
        </section>
        <section class="help-section">
            <h3>Need Help?</h3>
            <p>Fill out all the fields in the form to successfully book a mechanic. Each mechanic can take a maximum of 4 active appointments per day. If a mechanic is fully occupied, please choose another available mechanic.</p>
        </section>
    </main>
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span id="closeModalBtn" class="close-btn">&times;</span>
            <h2>Admin Login</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="adminId">Admin ID:</label>
                    <input type="text" id="adminId" required>
                </div>
                <div class="form-group">
                    <label for="adminPassword">Password:</label>
                    <input type="password" id="adminPassword" required>
                </div>
                <button type="submit" class="login-submit-btn">Login</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>