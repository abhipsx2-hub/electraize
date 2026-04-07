document.addEventListener('DOMContentLoaded', () => {
    // Mobile Menu Toggle
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    
    if (menuBtn && navLinks) {
        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('show');
        });
    }

    // Form interception removed for Laravel backend


    // Simple reveal animation adding
    const animatedElements = document.querySelectorAll('.service-card, .product-card');
    animatedElements.forEach((el, index) => {
        el.style.animationDelay = `${index * 0.1}s`;
        el.classList.add('animate-fade-in');
    });
});
