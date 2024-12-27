document.addEventListener('DOMContentLoaded', function () {
    // Modal functionality
    const modal = document.getElementById('taskModal');
    const newTaskBtn = document.getElementById('newTaskBtn');
    const closeBtn = document.querySelector('.close-btn');
    const cancelBtn = document.getElementById('cancelBtn');
    const taskForm = document.getElementById('taskForm');

    // Open modal
    newTaskBtn.addEventListener('click', () => {
        modal.classList.add('active');
    });

    // Close modal
    closeBtn.addEventListener('click', () => {
        modal.classList.remove('active');
    });

    // Cancel button
    cancelBtn.addEventListener('click', () => {
        modal.classList.remove('active');
        taskForm.reset();
    });

    // Handle status changes
    document.addEventListener('change', function (e) {
        if (e.target.classList.contains('task-status-select')) {
            const newStatus = e.target.value;
            const taskItem = e.target.closest('.task-item');

            // Update select class for styling
            e.target.className = `task-status-select ${newStatus}`;

            // Animate the change
            taskItem.style.opacity = '0';

            // Submit the form if it exists
            const form = e.target.closest('form');
            if (form) {
                form.submit();
            }
        }
    });

    // Handle delete confirmations
    document.addEventListener('click', function (e) {
        if (e.target.closest('.task-action.delete')) {
            if (!confirm('Êtes-vous sûr de vouloir supprimer cette tâche ?')) {
                e.preventDefault();
            }
        }
    });

    // Form submission
    taskForm.addEventListener('submit', function (e) {
        // If you're using PHP, you might want to remove this preventDefault
        // e.preventDefault();
        modal.classList.remove('active');
        taskForm.reset();
    });
});