<nav class="bg-green-900">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <!-- Logo y Nombre -->
                <div class="flex flex-shrink-0 text-center">
                    <img class="h-8 w-8" src="https://cdn-icons-png.flaticon.com/512/2220/2220061.png" alt="Logo">
                    <a href="/operador/dashboard"
                        class="rounded-md px-3 py-2 text-sm font-medium text-white focus:ring">
                        Green Life Inc.
                    </a>
                </div>
                <!-- Menú Principal -->
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="/operador/dashboard"
                            class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-green-700 hover:text-white">
                            Dashboard
                        </a>
                        <a href="/operador/arboles"
                            class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-green-700 hover:text-white">
                            Amigos
                        </a>
                    </div>
                </div>
            </div>
            <!-- Botón de Cerrar Sesión -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <a href="/auth/logout"
                        class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-green-700 hover:text-white">
                        Cerrar Sesión
                    </a>
                </div>
            </div>
            <!-- Menú Móvil -->
            <div class="-mr-2 flex md:hidden">
                <button type="button"
                    class="relative inline-flex items-center justify-center rounded-md bg-green-800 p-2 text-green-400 hover:bg-green-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-green-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Abrir Menú Principal</span>
                    <!-- Icono Menú -->
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú Móvil -->
    <div class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <a href="/operador/dashboard"
                class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-green-700 hover:text-white">
                Dashboard
            </a>
            <a href="/operador/arboles"
                class="rounded-md px-3 py-2 text-sm font-medium text-white hover:bg-green-700 hover:text-white">
                Amigos
            </a>
            <a href="/auth/logout"
                class="block rounded-md px-3 py-2 text-base font-medium text-green-300 hover:bg-green-700 hover:text-white">
                Cerrar Sesión
            </a>
        </div>
    </div>
</nav>