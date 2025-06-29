document.addEventListener('DOMContentLoaded', function() {
    const dropdownLinks = document.querySelectorAll('.navbar-nav .dropdown > a[data-bs-toggle="dropdown"]');
    
    dropdownLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // On desktop: allow navigation
            if (window.innerWidth >= 992) {
                // Remove the data-bs-toggle temporarily to allow navigation
                this.removeAttribute('data-bs-toggle');
                // Navigate to the link
                window.location.href = this.getAttribute('href');
            }
            // On mobile: let Bootstrap handle the dropdown
        });
    });
});