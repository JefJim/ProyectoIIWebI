<?= view('amigo/includes/nav') ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-lg leading-6 font-medium text-green-900">Bienvenido, <?= session()->get('user')['nombre'] ?></h1>
            <p class="mt-2 text-sm text-gray-600">
                Explora los árboles disponibles o revisa tus adquisiciones.
            </p>
        </div>
        <div class="px-4 py-4 sm:px-6 flex gap-4">
            <a href="/amigo/arboles" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Ver árboles disponibles
            </a>
            <a href="/amigo/mis-arboles" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                Mis árboles
            </a>
        </div>
    </div>
</div>
