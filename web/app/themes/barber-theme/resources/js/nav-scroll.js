window.addEventListener('scroll', function () {
    const nav = document.getElementById('mainNav');
    if (window.scrollY > 40) {
        nav.classList.add('scrolled');
        nav.style.top = '0'; // Se pega al techo
    } else {
        nav.classList.remove('scrolled');
        nav.style.top = '40px';
    }
});