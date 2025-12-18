<div class="flex items-center px-4 pt-18 pb-5 md:px-10 hero-background">

    <div class="space-y-10">

        <div class="space-y-4">

            <div class="font-karantina space-y-2">
                <h1 class="text-5xl uppercase md:text-7xl tracking-[0.08em]">
                    {!! $siteName !!}
                </h1>
                <h2 class="text-3xl text-active md:text-5xl tracking-[0.08em]">Barberia y Escuela de
                    barberia </h2>
            </div>


            <p class="prose text-white">
                "The Outsider" es una barbería y escuela de barbería ubicada en Teziutlán, Puebla, que se
                especializa en
                brindar cortes de cabello modernos y personalizados, diseños de cejas y otros servicios de estética
                masculina. Además de ofrecer una experiencia de alta calidad en barbería, también forma a futuros
                barberos
                con programas profesionales y actualizados, preparando a sus alumnos para destacar en el mundo de la
                barbería con las últimas tendencias y técnicas.
            </p>
        </div>


        <div class="flex gap-6">
            <x-button class="flex-1 uppercase">Reservar Cita</x-button>
            <x-button class="flex-1 uppercase" variant="secondary">Productos</x-button>
        </div>

        <div class="flex gap-6">
            <a class="bg-active p-2 rounded-full" href="#">
                <x-lucide-icon name='facebook' class="stroke-none"></x-lucide-icon>
            </a>
            <a class="bg-active p-2 rounded-full" href="#">
                <x-lucide-icon name='insta' class="stroke-none"></x-lucide-icon>
            </a>
            <a class="bg-active p-2 rounded-full" href="#">
                <x-lucide-icon name='tick-tock' class="stroke-none"></x-lucide-icon>
            </a>
        </div>
    </div>

</div>
