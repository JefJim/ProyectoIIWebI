<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Árboles del Amigo</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Barra de Navegación -->
        <?= $this->include('operador/includes/nav') ?>

        <!-- Contenido -->
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-green-900 mb-4">Árboles del Amigo</h1>
            <div class="relative overflow-x-auto bg-white p-6 rounded-lg shadow-lg">
                <table class="w-full text-sm text-left text-green-900">
                    <thead class="text-xs text-green-700 uppercase bg-green-50">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Especie</th>
                            <th class="px-6 py-3">Ubicación</th>
                            <th class="px-6 py-3">Estado</th>
                            <th class="px-6 py-3">Precio</th>
                            <th class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arboles as $arbol): ?>
                            <tr class="bg-white border-b hover:bg-green-50">
                                <td class="px-6 py-4"><?= esc($arbol['id']) ?></td>
                                <td class="px-6 py-4"><?= esc($arbol['especie']) ?></td>
                                <td class="px-6 py-4"><?= esc($arbol['ubicacion']) ?></td>
                                <td class="px-6 py-4"><?= ucfirst(esc($arbol['estado'])) ?></td>
                                <td class="px-6 py-4"><?= esc($arbol['precio']) ?></td>
                                <td class="px-6 py-4 space-x-2">
                                    <!-- Acción para ver el historial -->
                                    <a href="<?= base_url('operador/'.esc($arbol['id']).'/historialOperator') ?>" class="text-blue-600 hover:text-blue-800">Ver Historial</a>
                                    <!-- Acción para agregar nueva actualización -->
                                    <a href="<?= base_url('operador/'.esc($arbol['id']).'/update_historial') ?>" class="text-green-600 hover:text-green-800">Agregar Actualización</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Botón Volver -->
            <div class="mt-6">
                <a href="/operador/arboles" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">
                    Volver a la Lista de Amigos
                </a>
            </div>
        </main>
    </div>
</body>

</html>
