// Confirmation for deletion
function confirmation(event, categoryId) {
    event.preventDefault();
    swal({
        title: "Hapus kategori?",
        text: "Kategori ini akan dihapus secara permanen!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            document.getElementById('delete-form-' + categoryId).submit();
        }
    });
}

// Populate fields for update category modal
document.addEventListener('DOMContentLoaded', function () {
    const editUserButtons = document.querySelectorAll('.btn-update-category');
    
    editUserButtons.forEach(button => {
        button.addEventListener('click', function () {
            const categoryId = button.getAttribute('data-id');
            const categoryTitle = button.getAttribute('data-title');
            // Set action URL for the form (replace ':id' with actual categoryId)
            const form = document.getElementById('form-update-category');
            form.action = form.action.replace(':id', categoryId);
            // Set the form fields with category data
            document.getElementById('update-title').value = categoryTitle;
        });
    });
});