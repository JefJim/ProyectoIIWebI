<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Historial del Árbol</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Barra de Navegación -->
        <?= view('amigo/includes/nav') ?>

        <!-- Contenido -->
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h1 class="text-2xl font-bold text-green-900">Historial del Árbol</h1>
                </div>

                <div class="px-4 py-5 sm:px-6">
                    <h2 class="text-lg font-medium text-green-900 mb-4">Historial de Actualizaciones</h2>
                    <div class="relative overflow-x-auto bg-gray-50 rounded-lg shadow-sm">
                        <table class="w-full text-sm text-left text-gray-900">
                            <thead class="text-xs text-green-700 uppercase bg-green-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Fecha</th>
                                    <th scope="col" class="px-6 py-3">Tamaño</th>
                                    <th scope="col" class="px-6 py-3">Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($historial)): ?>
                                    <tr class="bg-white">
                                        <td colspan="3" class="px-6 py-4 text-center text-gray-700">
                                            No hay actualizaciones registradas.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($historial as $entry): ?>
                                        <tr class="bg-white border-b hover:bg-green-50">
                                            <td class="px-6 py-4"><?= esc($entry['fecha']) ?></td>
                                            <td class="px-6 py-4"><?= esc($entry['tamano']) ?></td>
                                            <td class="px-6 py-4">
                                                <?php if ($entry['foto']): ?>
                                                    <img src="<?= base_url('uploads/historial/' . esc($entry['foto'])) ?>" alt="Foto del árbol" class="w-20 rounded">
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="px-4 py-4 sm:px-6 flex justify-end">
                    <a href="/amigo/mis-arboles" class="bg-green-600 hover:bg-green-700 text-white font-medium rounded-md px-4 py-2 text-sm">
                        Volver a Mis Árboles
                    </a>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
