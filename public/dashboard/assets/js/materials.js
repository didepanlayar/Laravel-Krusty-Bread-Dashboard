// Confirmation for deletion
function confirmation(event, materialId) {
    event.preventDefault();
    swal({
        title: "Hapus stok?",
        text: "Stok ini akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            document.getElementById('delete-form-' + materialId).submit();
        }
    });
}

// Populate fields for update material modal
document.addEventListener('DOMContentLoaded', function () {
    const editUserButtons = document.querySelectorAll('.btn-update-material');
    
    editUserButtons.forEach(button => {
        button.addEventListener('click', function () {
            const materialId = button.getAttribute('data-id');
            const materialTitle = button.getAttribute('data-title');
            const materialStock = button.getAttribute('data-stock');
            const materialUnit = button.getAttribute('data-unit');
            // Set action URL for the form (replace ':id' with actual materialId)
            const form = document.getElementById('form-update-material');
            form.action = form.action.replace(':id', materialId);
            // Set the form fields with material data
            document.getElementById('update-title').value = materialTitle;
            document.getElementById('update-stock').value = materialStock;
            document.getElementById('update-unit').value = materialUnit;
        });
    });
});