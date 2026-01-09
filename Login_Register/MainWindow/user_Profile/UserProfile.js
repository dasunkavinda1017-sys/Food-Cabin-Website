document.addEventListener('DOMContentLoaded', () => {
    const editButtons = document.querySelectorAll('.edit-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');

    editButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            alert('clicked Edit button ');
        });
    });

    deleteButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const confirmDelete = confirm(' you want to delete this item?');
            if(confirmDelete){
                alert('Item delete');
            }
        });
    });
});
