document.addEventListener('DOMContentLoaded', () => {
    const menuTrigger = document.getElementById('menu-trigger');
    const menuClose = document.getElementById('menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOverlay = document.getElementById('menu-overlay');

    let startX = 0;
    let currentX = 0;
    let isDragging = false;

    const openMenu = () => {
        menuOverlay.classList.remove('hidden');
        setTimeout(() => menuOverlay.classList.replace('opacity-0', 'opacity-100'), 10);

        mobileMenu.classList.remove('-translate-x-full');
        mobileMenu.classList.add('translate-x-0');

        document.body.style.overflow = 'hidden';
    };

    const closeMenu = () => {
        mobileMenu.style.transition = '';
        mobileMenu.style.transform = '';

        mobileMenu.classList.add('-translate-x-full');
        mobileMenu.classList.remove('translate-x-0');

        menuOverlay.classList.replace('opacity-100', 'opacity-0');
        setTimeout(() => menuOverlay.classList.add('hidden'), 300);

        document.body.style.overflow = '';
    };

    /* ---------- Click events ---------- */
    menuTrigger.addEventListener('click', openMenu);
    menuClose.addEventListener('click', closeMenu);
    menuOverlay.addEventListener('click', closeMenu);

    /* ---------- Swipe events ---------- */
    let startY = 0; // Nueva variable para rastrear la posición vertical

    mobileMenu.addEventListener('touchstart', (e) => {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY; // Guardamos la Y inicial
        currentX = startX;
        isDragging = true;
        // IMPORTANTE: No quitamos la transición todavía para evitar saltos si es solo un tap
        // mobileMenu.style.transition = 'none'; 
    });

    mobileMenu.addEventListener('touchmove', (e) => {
        if (!isDragging) return;

        const currentTouchX = e.touches[0].clientX;
        const currentTouchY = e.touches[0].clientY;

        const deltaX = currentTouchX - startX;
        const deltaY = currentTouchY - startY;

        // LÓGICA DE BLOQUEO:
        // Si el movimiento vertical (valor absoluto) es mayor que el horizontal,
        // asumimos que el usuario quiere hacer SCROLL y no CERRAR.
        if (Math.abs(deltaY) > Math.abs(deltaX)) {
            isDragging = false; // Dejamos de rastrear este gesto como un swipe
            return; // Salimos y dejamos que el navegador haga scroll nativo
        }

        // Si llegamos aquí, es porque el movimiento es mayormente horizontal.

        // Solo permitir arrastrar hacia la izquierda (cerrar)
        if (deltaX < 0) {
            // Ahora sí quitamos la transición para que el arrastre sea en tiempo real
            mobileMenu.style.transition = 'none';

            // Prevenir el scroll de la página mientras arrastramos el menú lateralmente
            if (e.cancelable) e.preventDefault();

            currentX = currentTouchX;
            mobileMenu.style.transform = `translateX(${deltaX}px)`;
        }
    });

    mobileMenu.addEventListener('touchend', () => {
        if (!isDragging) return; // Si cancelamos el drag en el move, no hacemos nada aquí

        isDragging = false;
        mobileMenu.style.transition = 'transform 0.3s ease-in-out';

        const swipeDistance = currentX - startX;

        // Si el swipe supera los 100px hacia la izquierda → cerrar
        if (swipeDistance < -100) {
            closeMenu();
        } else {
            // Volver suavemente a su posición
            mobileMenu.style.transform = 'translateX(0)';
        }
    });
});
