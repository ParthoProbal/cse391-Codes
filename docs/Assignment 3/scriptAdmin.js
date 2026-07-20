const editPanel = document.getElementById('editPanel');
const editClientName = document.getElementById('editClientName');
const editDate = document.getElementById('editDate');
const editMechanic = document.getElementById('editMechanic');

function openEditPanel(appointmentId, clientName, date, mechanicId) {
    editPanel.style.display = 'block';
    
    document.getElementById('editAppointmentId').value = appointmentId;
    editClientName.value = clientName;
    editDate.value = date;
    editMechanic.value = mechanicId;
    
    editPanel.scrollIntoView({ behavior: 'smooth' });
}

function closeEditPanel() {
    editPanel.style.display = 'none';
}