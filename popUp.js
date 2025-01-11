    document.addEventListener('DOMContentLoaded', function () {

        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); 

                const productId = this.getAttribute('data-id');
                
                const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');
                confirmDeleteBtn.setAttribute('href', `fungsi.php?delete&id=${productId}`);

                const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
                deleteModal.show();
            });
        });
    });
