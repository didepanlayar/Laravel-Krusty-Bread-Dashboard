// Confirmation for deletion
function confirmation(event, paymentId) {
    event.preventDefault();
    swal({
        title: "Hapus metode pembayaran?",
        text: "Metode pembayaran ini akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            document.getElementById('delete-form-' + paymentId).submit();
        }
    });
}

// Populate fields for update payment modal
document.addEventListener('DOMContentLoaded', function () {
    const editUserButtons = document.querySelectorAll('.btn-update-payment');
    
    editUserButtons.forEach(button => {
        button.addEventListener('click', function () {
            const paymentId = button.getAttribute('data-id');
            const paymentTitle = button.getAttribute('data-title');
            // Set action URL for the form (replace ':id' with actual paymentId)
            const form = document.getElementById('form-update-payment');
            form.action = form.action.replace(':id', paymentId);
            // Set the form fields with payment data
            document.getElementById('update-title').value = paymentTitle;
        });
    });
});