    const navbarCollapse = document.getElementById('navbarSupportedContent');
    const bsCollapse = new bootstrap.Collapse(navbarCollapse, { toggle: false });

    window.addEventListener('resize', () => {
        // Если ширина >= 992px (десктоп) и меню открыто — закрываем
        if (window.innerWidth >= 992 && navbarCollapse.classList.contains('show')) {
            bsCollapse.hide();
        }
    });