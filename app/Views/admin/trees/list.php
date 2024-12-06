<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Lista de Árboles</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <div class="flex justify-between items-align bg-green-900 p-3 text-white">
            <h1 class="text-xl font-bold">Lista de Árboles</h1>
            <a href="<?= base_url('admin/arboles/crear') ?>"
                class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm">Agregar Árbol</a>
            <a href="/admin/dashboard" type="submit"
                class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">
                Atrás
            </a>
        </div>
        <div class="relative overflow-x-auto mx-auto mt-4 max-w-7xl bg-white p-4 rounded-lg shadow-lg">
            <table class="w-full text-sm text-left text-green-900">
                <thead class="text-xs text-green-700 uppercase bg-green-50">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Especie</th>
                        <th class="px-6 py-3">Ubicación</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Precio</th>
                        <th class="px-6 py-3">Foto</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trees as $tree): ?>
                    <tr class="bg-white border-b hover:bg-green-50">
                        <td class="px-6 py-4"><?= esc($tree['id']) ?></td>
                        <td class="px-6 py-4"><?= esc($tree['especie']) ?></td>
                        <td class="px-6 py-4"><?= esc($tree['ubicacion']) ?></td>
                        <td class="px-6 py-4"><?= ucfirst(esc($tree['estado'])) ?></td>
                        <td class="px-6 py-4"><?= esc($tree['precio']) ?></td>
                        <td class="px-6 py-4">
                            <?php if ($tree['foto']): ?>
                            <img src="<?= base_url('uploads/trees/' . esc($tree['foto'])) ?>" alt="Foto"
                                class="h-16 w-16 object-cover rounded">
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="<?= base_url('admin/arboles/editar/' . esc($tree['id'])) ?>"
                                class="text-blue-600 hover:text-blue-800">Editar</a>
                            <a href="<?= base_url('admin/arboles/eliminar/' . esc($tree['id'])) ?>"
                                onclick="return confirm('¿Estás seguro de eliminar este árbol?')"
                                class="text-red-600 hover:text-red-800">Eliminar</a>
                            <a href="/admin/arboles/<?= esc($tree['id']) ?>/historial"
                                class="text-green-600 hover:text-green-800">Ver Historial</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>