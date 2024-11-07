// Confirmation for deletion
function confirmation(event, customerId) {
    event.preventDefault();
    swal({
        title: "Hapus data pelanggan?",
        text: "Data pelanggan ini akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            document.getElementById('delete-form-' + customerId).submit();
        }
    });
}

// Populate fields for update customer modal
document.addEventListener('DOMContentLoaded', function () {
    const editUserButtons = document.querySelectorAll('.btn-update-customer');
    
    editUserButtons.forEach(button => {
        button.addEventListener('click', function () {
            const customerId = button.getAttribute('data-id');
            const customerName = button.getAttribute('data-name');
            const customerPhone = button.getAttribute('data-phone');
            // Set action URL for the form (replace ':id' with actual customerId)
            const form = document.getElementById('form-update-customer');
            form.action = form.action.replace(':id', customerId);
            // Set the form fields with customer data
            document.getElementById('update-name').value = customerName;
            document.getElementById('update-phone').value = customerPhone;
        });
    });
});