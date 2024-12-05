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
        <div class="flex justify-between items-center bg-green-900 p-4 text-white">
            <h1 class="text-xl font-bold">Historial del Árbol</h1>
            <a href="<?= base_url('admin/arboles') ?>" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm">Volver a Lista</a>
        </div>
        <div class="relative overflow-x-auto mx-auto mt-4 max-w-5xl bg-white p-4 rounded-lg shadow-lg">
            <table class="w-full text-sm text-left text-green-900">
                <thead class="text-xs text-green-700 uppercase bg-green-50">
                    <tr>
                        <th class="px-6 py-3">Fecha</th>
                        <th class="px-6 py-3">Tamaño</th>
                        <th class="px-6 py-3">Foto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($historial)): ?>
                        <?php foreach ($historial as $entry): ?>
                            <tr class="bg-white border-b hover:bg-green-50">
                                <td class="px-6 py-4"><?= esc($entry['fecha']) ?></td>
                                <td class="px-6 py-4"><?= esc($entry['tamano']) ?></td>
                                <td class="px-6 py-4">
                                    <?php if (!empty($entry['foto'])): ?>
                                        <img src="<?= base_url('uploads/' . esc($entry['foto'])) ?>" alt="Foto del árbol" class="h-16 w-16 object-cover rounded">
                                    <?php else: ?>
                                        <span class="text-gray-500">Sin foto</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">No hay actualizaciones registradas para este árbol.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
