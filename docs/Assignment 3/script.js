const adminLoginBtn = document.getElementById('adminLoginBtn');
const loginModal = document.getElementById('loginModal');
const closeModalBtn = document.getElementById('closeModalBtn');
const loginForm = document.getElementById('loginForm');
const appointmentForm = document.getElementById('appointmentForm');

adminLoginBtn.addEventListener('click', function() {
    loginModal.style.display = 'flex';
});

closeModalBtn.addEventListener('click', function() {
    loginModal.style.display = 'none';
});

loginForm.addEventListener('submit', function(event) {
    event.preventDefault();
    const adminIdInput = document.getElementById('adminId').value;
    const adminPasswordInput = document.getElementById('adminPassword').value;
    
    
    fetch('admin_login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'adminId=' + encodeURIComponent(adminIdInput) + '&adminPassword=' + encodeURIComponent(adminPasswordInput)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Login successful! Redirecting to Admin Panel...');
            window.location.href = 'admin.php';
        } else {
            alert('Invalid ID or Password. Access Denied!');
        }
    });
});

appointmentForm.addEventListener('submit', function(event) {
    const phoneValue = document.getElementById('clientPhone').value;
    const engineValue = document.getElementById('carEngine').value;
    const numericRegex = /^[0-9]+$/;
    if (!numericRegex.test(phoneValue)) {
        event.preventDefault();
        alert('Validation Error: Phone number must contain only numeric characters.');
        return;
    }
    if (!numericRegex.test(engineValue)) {
        event.preventDefault();
        alert('Validation Error: Car Engine Number must contain only numeric characters.');
        return;
    }
});