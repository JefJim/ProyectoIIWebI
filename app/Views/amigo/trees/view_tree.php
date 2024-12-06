<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Detalles del Árbol</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Barra de Navegación -->
        <?= view('amigo/includes/nav') ?>

        <!-- Contenido -->
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h1 class="text-2xl font-bold text-green-900">Detalles del Árbol</h1>
                </div>

                <div class="border-t border-gray-200">
                    <dl class="divide-y divide-gray-200">
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-green-900">Especie</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= esc($arbol['especie_nombre']) ?></dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-green-900">Ubicación</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= esc($arbol['ubicacion']) ?></dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-green-900">Estado</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"><?= ucfirst(esc($arbol['estado'])) ?></dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-green-900">Precio</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">$<?= esc($arbol['precio']) ?></dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:px-6">
                            <dt class="text-sm font-medium text-green-900">Foto</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <img src="<?= base_url('uploads/trees/' . esc($arbol['foto'])) ?>" alt="Foto del árbol" class="w-48 rounded">
                            </dd>
                        </div>
                    </dl>
                </div>

                <div class="px-4 py-4 sm:px-6 flex justify-end">
                    <a href="/amigo/mis-arboles" 
                       class="bg-green-600 hover:bg-green-700 text-white font-medium rounded-md px-4 py-2 text-sm">
                        Volver a Mis Árboles
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
