// Confirmation for deletion
function confirmation(event, userId) {
    event.preventDefault();
    swal({
        title: "Hapus data karyawan?",
        text: "Data karyawan ini akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            document.getElementById('delete-form-' + userId).submit();
        }
    });
}

// Populate fields for update user modal
document.addEventListener('DOMContentLoaded', function () {
    const editUserButtons = document.querySelectorAll('.btn-update-user');
    
    editUserButtons.forEach(button => {
        button.addEventListener('click', function () {
            const userId = button.getAttribute('data-id');
            const userName = button.getAttribute('data-name');
            const userUsername = button.getAttribute('data-username');
            const userEmail = button.getAttribute('data-email');
            const userPhone = button.getAttribute('data-phone');
            const userRoles = button.getAttribute('data-roles').replace(/['"]+/g, '');
            // Set action URL for the form (replace ':id' with actual userId)
            const form = document.getElementById('form-update-user');
            form.action = form.action.replace(':id', userId);
            // Set the form fields with user data
            document.getElementById('update-name').value = userName;
            document.getElementById('update-username').value = userUsername;
            document.getElementById('update-email').value = userEmail;
            document.getElementById('update-phone').value = userPhone;
            // Reset radio buttons and set checked based on userRoles
            document.getElementById('role-owner').checked = false;
            document.getElementById('role-staff').checked = false;
            if (userRoles === "Owner") {
                document.getElementById('role-owner').checked = true;
            } else if (userRoles === "Staff") {
                document.getElementById('role-staff').checked = true;
            }
        });
    });
});
