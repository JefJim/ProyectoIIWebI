<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Lista de Especies</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <div class="flex justify-between items-center bg-green-900 p-4 text-white">
            <h1 class="text-xl font-bold">Lista de Especies</h1>
            <a href="<?= base_url('admin/especies/crear') ?>" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm">Agregar Especie</a>
        </div>
        <div class="relative overflow-x-auto mx-auto mt-4 max-w-5xl bg-white p-4 rounded-lg shadow-lg">
            <table class="w-full text-sm text-left text-green-900">
                <thead class="text-xs text-green-700 uppercase bg-green-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Nombre Comercial</th>
                        <th scope="col" class="px-6 py-3">Nombre Científico</th>
                        <th scope="col" class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($species as $s): ?>
                    <tr class="bg-white border-b hover:bg-green-50">
                        <td class="px-6 py-4"><?= $s['id'] ?></td>
                        <td class="px-6 py-4"><?= $s['nombre_comercial'] ?></td>
                        <td class="px-6 py-4"><?= $s['nombre_cientifico'] ?></td>
                        <td class="px-6 py-4 space-x-2">
                            <a href="<?= base_url('admin/especies/editar/' . $s['id']) ?>" class="text-blue-600 hover:text-blue-800">Editar</a>
                            <a href="<?= base_url('admin/especies/eliminar/' . $s['id']) ?>" onclick="return confirm('¿Estás seguro de eliminar esta especie?')" class="text-red-600 hover:text-red-800">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
