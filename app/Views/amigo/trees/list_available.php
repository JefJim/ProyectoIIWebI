<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Árboles Disponibles</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Barra de Navegación -->
        <?= view('amigo/includes/nav') ?>

        <!-- Contenido -->
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h1 class="text-2xl font-bold text-green-900">Árboles Disponibles</h1>
                </div>

                <div class="relative overflow-x-auto bg-gray-50 rounded-lg shadow-sm p-4">
                    <table class="w-full text-sm text-left text-gray-900">
                        <thead class="text-xs text-green-700 uppercase bg-green-50">
                            <tr>
                                <th class="px-6 py-3">Foto</th>
                                <th class="px-6 py-3">Especie</th>
                                <th class="px-6 py-3">Ubicación</th>
                                <th class="px-6 py-3">Precio</th>
                                <th class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arboles as $arbol): ?>
                                <tr class="bg-white border-b hover:bg-green-50">
                                    <td class="px-6 py-4">
                                        <img src="<?= base_url('uploads/' . esc($arbol['foto'])) ?>" alt="Foto del árbol" class="w-24 rounded">
                                    </td>
                                    <td class="px-6 py-4"><?= esc($arbol['especie_nombre']) ?></td>
                                    <td class="px-6 py-4"><?= esc($arbol['ubicacion']) ?></td>
                                    <td class="px-6 py-4">$<?= esc($arbol['precio']) ?></td>
                                    <td class="px-6 py-4">
                                        <a href="/amigo/arboles/<?= esc($arbol['id']) ?>/comprar" 
                                           class="bg-green-600 hover:bg-green-700 text-white font-medium rounded-md px-4 py-2 text-sm">
                                            Comprar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
