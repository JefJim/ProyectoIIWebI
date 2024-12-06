<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Agregar Especie</title>
</head>

<body class="h-full">

    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-lg w-full bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center text-green-900">Agregar Especie</h1>

            <form action="<?= base_url('admin/especies/crear') ?>" method="post" class="space-y-6 mt-4">
                <div>
                    <label for="nombre_comercial" class="block text-sm font-medium text-green-900">Nombre
                        Comercial:</label>
                    <input id="nombre_comercial" type="text" name="nombre_comercial" required
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>
                <div>
                    <label for="nombre_cientifico" class="block text-sm font-medium text-green-900">Nombre
                        Científico:</label>
                    <input id="nombre_cientifico" type="text" name="nombre_cientifico" required
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>
                <div class="flex justify-between items-center bg-green-900 p-4 text-white">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">
                        Guardar
                    </button>
                    <a href="/admin/especies" type="submit"
                        class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">
                        Cancelar
                    </a>
                </div>
            </form>

        </div>
    </div>
</body>

</html>