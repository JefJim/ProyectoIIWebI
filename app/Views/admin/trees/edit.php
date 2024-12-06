<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar Árbol</title>
</head>

<body class="h-full">
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-lg w-full bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center text-green-900">Editar Árbol</h1>
            <form action="<?= base_url('admin/arboles/editar/' . $tree['id']) ?>" method="post"
                enctype="multipart/form-data" class="space-y-6 mt-4">
                <!-- Especie -->
                <div>
                    <label for="especie_id" class="block text-sm font-medium text-green-900">Especie:</label>
                    <select id="especie_id" name="especie_id" required
                        class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                        <?php foreach ($species as $s): ?>
                        <option value="<?= esc($s['id']) ?>" <?= $s['id'] == $tree['especie_id'] ? 'selected' : '' ?>>
                            <?= esc($s['nombre_comercial']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Ubicación -->
                <div>
                    <label for="ubicacion" class="block text-sm font-medium text-green-900">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion" value="<?= esc($tree['ubicacion']) ?>" required
                        class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>

                <!-- Estado -->
                <div>
                    <label for="estado" class="block text-sm font-medium text-green-900">Estado:</label>
                    <select id="estado" name="estado" required
                        class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                        <option value="disponible" <?= $tree['estado'] == 'disponible' ? 'selected' : '' ?>>Disponible
                        </option>
                        <option value="vendido" <?= $tree['estado'] == 'vendido' ? 'selected' : '' ?>>Vendido</option>
                    </select>
                </div>

                <!-- Precio -->
                <div>
                    <label for="precio" class="block text-sm font-medium text-green-900">Precio:</label>
                    <input type="number" id="precio" name="precio" step="0.01" value="<?= esc($tree['precio']) ?>"
                        required
                        class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                </div>

                <!-- Foto -->
                <div>
                    <label for="foto" class="block text-sm font-medium text-green-900">Foto:</label>
                    <input type="file" id="foto" name="foto"
                        class="block w-full rounded-md border-0 py-2 text-green-900 shadow-sm ring-1 ring-green-300 focus:ring-2 focus:ring-green-600">
                    <?php if ($tree['foto']): ?>
                    <img src="<?= base_url('uploads/trees/' . esc($tree['foto'])) ?>" alt="Foto actual del árbol"
                        class="h-16 w-16 object-cover mt-2 rounded">
                    <input type="hidden" name="existing_foto" value="<?= esc($tree['foto']) ?>">
                    <?php endif; ?>
                </div>

                <!-- Botón de Actualizar -->
                <div class="flex justify-between items-align bg-green-900 p-3 text-white">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">Actualizar</button>
                    <a href="/admin/arboles" type="submit"
                        class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">
                        Cancelar
                    </a>
                </div>

            </form>
        </div>
    </div>
</body>

</html>