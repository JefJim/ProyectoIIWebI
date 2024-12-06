<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registrar Actualización</title>
</head>

<body class="h-full">
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-lg w-full bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center text-green-900">Registrar Actualización del Árbol</h1>
            <form action="/admin/arboles/<?= esc($arbol['id']) ?>/historial/guardar" method="post"
                enctype="multipart/form-data" class="space-y-6 mt-4">
                <!-- Campo oculto con el ID del árbol -->
                <input type="hidden" name="arbol_id" value="<?= esc($arbol['id']) ?>">

                <!-- Tamaño -->
                <div>
                    <label for="tamano" class="block text-sm font-medium text-green-900">Tamaño Actual:</label>
                    <input type="text" id="tamano" name="tamano" required
                        class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>

                <!-- Foto -->
                <div>
                    <label for="foto" class="block text-sm font-medium text-green-900">Subir Foto:</label>
                    <input type="file" id="foto" name="foto" accept="image/*" required
                        class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>

                <!-- Botón Guardar -->
                <div class="flex justify-between items-align bg-green-900 p-3 text-white">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">Guardar
                        Actualización</button>
                    <a href="/admin/amigos" type="submit"
                        class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>
</body>

</html>