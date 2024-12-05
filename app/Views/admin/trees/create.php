<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Agregar Árbol</title>
</head>

<body class="h-full">
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-lg w-full bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center text-green-900">Agregar Árbol</h1>
            <form action="<?= base_url('admin/arboles/crear') ?>" method="post" enctype="multipart/form-data" class="space-y-6 mt-4">
                <div>
                    <label for="especie_id" class="block text-sm font-medium text-green-900">Especie:</label>
                    <select id="especie_id" name="especie_id" required class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                        <?php foreach ($species as $s): ?>
                            <option value="<?= esc($s['id']) ?>"><?= esc($s['nombre_comercial']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="ubicacion" class="block text-sm font-medium text-green-900">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" required class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>
                <div>
                    <label for="estado" class="block text-sm font-medium text-green-900">Estado:</label>
                    <select id="estado" name="estado" required class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                        <option value="disponible">Disponible</option>
                        <option value="vendido">Vendido</option>
                    </select>
                </div>
                <div>
                    <label for="precio" class="block text-sm font-medium text-green-900">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" required class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>
                <div>
                    <label for="foto" class="block text-sm font-medium text-green-900">Foto:</label>
                    <input type="file" id="foto" name="foto" class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
