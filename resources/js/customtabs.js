document.querySelectorAll('.custom-tab-item').forEach(tab => {
    tab.addEventListener('click', () => {
        // Remove active from all tabs
        document.querySelectorAll('.custom-tab-item').forEach(t => t.classList.remove('active'));
        // Add active to clicked tab
        tab.classList.add('active');

        // Hide all tab panes
        document.querySelectorAll('.custom-tab-content .tab-pane').forEach(pane => pane.classList.remove('active'));
        // Show the target pane
        const target = tab.getAttribute('data-target');
        document.getElementById(target).classList.add('active');
    });
});
