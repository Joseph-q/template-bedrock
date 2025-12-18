<div class="h-10 w-full overflow-hidden animate-marquee-container bg-dark">
    <div
        class="flex h-full w-max items-center gap-12 px-10 uppercase font-bold text-xs animate-marquee md:animate-none text-ligth-active js-marquee-content">

        <p class="flex gap-2 items-center shrink-0">
            <b class="text-active">Abierto</b> 7 Dias a la semana
        </p>

        <ul class="flex gap-12 shrink-0">
            <li class="flex gap-2 items-center whitespace-nowrap">
                <x-lucide-icon name="map-pin" class="w-4 h-4 text-active"></x-lucide-icon>
                7800 TEZIUTLAN PUEBLA
            </li>
            <li class="flex gap-2 items-center whitespace-nowrap">
                <x-lucide-icon name="phone" class="w-4 h-4 text-active"></x-lucide-icon>
                123-456-90-12
            </li>
        </ul>

    </div>
</div>


<script>
    function checkMarquee() {
        const containers = document.querySelectorAll('.animate-marquee-container');

        containers.forEach(container => {
            const content = container.querySelector('.js-marquee-content');

            // 1. Guardar el contenido original si no lo hemos hecho (para poder resetear)
            if (!content.dataset.originalContent) {
                content.dataset.originalContent = content.innerHTML;
            }

            // 2. Resetear estado para medir correctamente
            content.innerHTML = content.dataset.originalContent;
            content.classList.remove('animate-marquee', 'w-max'); // Quitamos animación y ancho forzado
            content.classList.add('w-full', 'justify-between'); // Ponemos estado estático ideal

            // 3. Medición Crítica
            // scrollWidth = lo que ocupa el texto realmente
            // clientWidth = lo que mide la pantalla/contenedor
            const contentWidth = content.scrollWidth;
            const containerWidth = container.clientWidth;

            // 4. Decisión
            if (contentWidth > containerWidth) {
                // NO CABE: Activamos modo Marquee
                content.classList.remove('w-full', 'justify-between');
                content.classList.add('w-max', 'animate-marquee'); // w-max es vital para que scrollee

                // Duplicamos el contenido para el loop infinito
                content.innerHTML += content.dataset.originalContent;
            } else {
                // SI CABE: Se queda como está (w-full y justify-between)
                // No hacemos nada más porque ya lo reseteamos en el paso 2
            }
        });
    }

    // Ejecutar al cargar la página
    document.addEventListener('DOMContentLoaded', checkMarquee);

    // Ejecutar cuando el usuario cambie el tamaño de la ventana (resize)
    // Usamos un pequeño timeout (debounce) para que no se ejecute mil veces por segundo
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(checkMarquee, 200);
    });
</script>
