<aside id="mobile-menu"
    class="fixed top-0 left-0 w-full max-w-sm bg-dark text-white z-20 h-full shadow-2xl border-r border-white/10 transition-transform duration-300 ease-in-out -translate-x-full flex flex-col">
    <div class="p-6 flex items-center justify-between border-b border-white/10 shrink-0">
        <p class="text-sm uppercase tracking-[0.2em] font-medium opacity-70">Menu</p>
        <button id="menu-close" class="hover:rotate-90 transition-transform duration-300 opacity-60 hover:opacity-100">
            <x-lucide-icon name="x"></x-lucide-icon>
        </button>
    </div>

    <div class="flex-1 min-h-0 relative"> 
        @if (has_nav_menu('primary_navigation'))
            <nav class="h-full overflow-y-auto mobile-nav uppercase font-semibold text-sm tracking-widest"
                aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
            </nav>
        @endif
    </div>
</aside>

<div id="menu-overlay" class="fixed inset-0 bg-black/50 z-10 hidden transition-opacity duration-300 opacity-0">
</div>


<style>
    #mobile-menu {
        touch-action: pan-y;
        will-change: transform;
    }

    .mobile-nav .nav {
        display: flex;
        flex-direction: column;
        list-style: none;
        padding: 0;
    }



    .mobile-nav .nav > li {
        position: relative;
        transition: all 0.3s ease;
        border-bottom: 1px solid rgba(255, 255, 255, 0.10)
    }

    .mobile-nav .nav li.menu-item-has-children>a::after {
        content: '';
        /* Creación de la flecha con bordes CSS (más limpio que una imagen) */
        border: solid currentColor;
        /* Usa el color de texto actual */
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 3px;

        /* Rotación para que apunte hacia abajo */
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);

        /* Posicionamiento */
        position: absolute;
        right: 15px;
        /* Ajusta esto según tu diseño */
        /* Centrado vertical aproximado */
        /* Ajuste fino del centro */
    }



   

    .mobile-nav .nav li a {
        display: flex;
        padding: 1.25rem 1.5rem;
        color: rgba(255, 255, 255, 0.6);
        text-decoration: none;
        transition: all 0.3s ease;
    }

     .mobile-nav .nav .menu-item-has-children ul a {
        padding-left:  2.5rem;
    }

    /* Efecto Hover */
    .mobile-nav .nav li a:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.03);
        /* Desplazamiento suave */
    }

    /* Item Activo */
    .mobile-nav .nav .current-menu-item a {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.05);
        border-left: 4px solid var(--active, #fff);
        /* Usa blanco si no hay variable */
    }

    /* Quitar borde al último elemento */
    .mobile-nav .nav li:last-child a {
        border-bottom: none;
    }
</style>
