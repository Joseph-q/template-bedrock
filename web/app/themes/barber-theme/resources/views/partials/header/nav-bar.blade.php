<div id="mainNav"
    class="nav-header fixed left-0 right-0 top-10 flex h-15 items-center justify-between px-10 transition-all duration-200 ease-in-out">

    {{-- Botón menú móvil --}}
    <button id="menu-trigger" class="flex md:hidden">
        <x-lucide-icon name="menu" class="size-6" ></x-lucide-icon>
    </button>

    {{-- Logo/Brand --}}
    <a class="brand" href="{{ home_url('/') }}">
        {!! $siteName !!}
    </a>

    {{-- Navegación principal (desktop) --}}
    @if (has_nav_menu('primary_navigation'))
        <nav class="desk-nav hidden h-full items-center justify-center text-xs font-bold uppercase md:flex"
            aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            {!! wp_nav_menu([
                'theme_location' => 'primary_navigation',
                'menu_class' => 'nav',
                'echo' => false,
            ]) !!}
        </nav>
    @endif

    {{-- WooCommerce Cart --}}
    @if (class_exists('WooCommerce'))
        <div class="flex items-center gap-4 text-xs font-bold uppercase">
            <a class="cart-contents relative rounded-full border-2 border-white/10 p-2 hover:border-white"
                href="{{ wc_get_cart_url() }}" title="Ver carrito">
                <x-lucide-icon name="shopping-bag" />

                <span
                    class="cart-count absolute -right-1 -top-1 rounded-full bg-active px-1 text-center text-ligth-active">
                    {{ WC()->cart->get_cart_contents_count() }}
                </span>
            </a>
        </div>
    @endif
</div>

<style>
    /* ==========================================================================
       1. NAV HEADER (Contenedor Principal)
       ========================================================================== */
    .nav-header {
        background: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, 0.10);
    }

    .nav-header.scrolled {
        background-color: var(--color-dark);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    /* ==========================================================================
       2. DESKTOP NAVIGATION (Estructura)
       ========================================================================== */
    .desk-nav .menu-primary-menu-container {
        height: 100%;
    }

    .desk-nav .nav {
        display: flex;
        gap: 1rem;
        height: 100%;
        margin: 0;
        padding: 0;
        list-style: none;
        color: white;
    }

    .desk-nav .nav li {
        position: relative;
        display: grid;
        height: 100%;
    }

    .desk-nav .nav>li>a {
        display: grid;
        place-items: center;
        height: 100%;
        padding: 0 1rem;
        text-decoration: none;
        color: inherit;
        transition: color 0.3s;
    }

    /* ==========================================================================
       3. ELEMENTOS CON HIJOS (Flechas y Hovers)
       ========================================================================== */
    .desk-nav .nav .menu-item-has-children>a {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    /* Flecha indicadora */
    .desk-nav .nav .menu-item-has-children>a::after {
        content: "";
        width: 0;
        height: 0;
        border-width: 0 2px 2px 0;
        display: inline-block;
        padding: 2px;
        transform: rotate(45deg);
        transition: transform 0.3s ease;
    }

    /* Rotación de flecha y apertura de submenú */
    .desk-nav .nav .menu-item-has-children:hover>a::after {
        transform: rotate(225deg);
    }

    .desk-nav .nav li:hover>.sub-menu {
        display: flex;
        flex-direction: column;
    }

    /* ==========================================================================
       4. SUB-MENÚ (Dropdown)
       ========================================================================== */


    .desk-nav .sub-menu {
        position: absolute;
        display: none;
        min-width: max-content;
        background-color: var(--color-dark);
        list-style: none;
        padding: 0;
    }

    .nav-header .sub-menu {
        top: 75%;
        left: 10%;
    }

    .nav-header.scrolled .sub-menu {
        top: 100%;
    }


    .desk-nav .sub-menu li {
        border-bottom: 1px solid rgba(255, 255, 255, 0.10);
    }

    .desk-nav .sub-menu li a {
        display: flex;
        padding: 1rem 3rem 1rem 1rem;
        text-decoration: none;
        color: white;
    }

    /* ==========================================================================
       5. ESTADOS (Hover, Active, Current)
       ========================================================================== */

    /* Hover general para items que no son el actual */
    .desk-nav .nav>li:not(.current-menu-item)>a:hover {
        color: var(--ligth-active);
    }

    /* Hovers específicos del submenú */
    .desk-nav .sub-menu li a:hover {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.03);
    }

    /* Item actual (General) */
    .desk-nav .current-menu-item {
        color: var(--active);
    }

    /* Item actual (Específico dentro de submenú) */
    .desk-nav .sub-menu .current-menu-item {
        color: #ffffff;
        background: rgba(255, 255, 255, 0.05);
        border-left: 4px solid var(--active, #fff);
    }
</style>
