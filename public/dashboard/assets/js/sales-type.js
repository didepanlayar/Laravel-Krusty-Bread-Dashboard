// Confirmation for deletion
function confirmation(event, salesTypeId) {
    event.preventDefault();
    swal({
        title: "Hapus jenis penjualan?",
        text: "Jenis penjualan ini akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            document.getElementById('delete-form-' + salesTypeId).submit();
        }
    });
}

// Populate fields for update sales modal
document.addEventListener('DOMContentLoaded', function () {
    const editUserButtons = document.querySelectorAll('.btn-update-sales');
    
    editUserButtons.forEach(button => {
        button.addEventListener('click', function () {
            const salesTypeId = button.getAttribute('data-id');
            const salesTitle = button.getAttribute('data-title');
            const salesCommission = button.getAttribute('data-commission');
            // Set action URL for the form (replace ':id' with actual salesTypeId)
            const form = document.getElementById('form-update-sales');
            form.action = form.action.replace(':id', salesTypeId);
            // Set the form fields with sales data
            document.getElementById('update-title').value = salesTitle;
            document.getElementById('update-commission').value = salesCommission;
        });
    });
});