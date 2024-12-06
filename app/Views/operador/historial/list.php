<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Amigos Registrados</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Barra de Navegación -->
        <?= $this->include('operador/includes/nav') ?>

        <!-- Contenido -->
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold text-green-900 mb-4">Amigos Registrados</h1>
            <div class="relative overflow-x-auto bg-white p-6 rounded-lg shadow-lg">
                <table class="w-full text-sm text-left text-green-900">
                    <thead class="text-xs text-green-700 uppercase bg-green-50">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Nombre</th>
                            <th class="px-6 py-3">Apellido</th>
                            <th class="px-6 py-3">Correo</th>
                            <th class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($amigos as $amigo): ?>
                            <tr class="bg-white border-b hover:bg-green-50">
                                <td class="px-6 py-4"><?= esc($amigo['id']) ?></td>
                                <td class="px-6 py-4"><?= esc($amigo['nombre']) ?></td>
                                <td class="px-6 py-4"><?= esc($amigo['apellido']) ?></td>
                                <td class="px-6 py-4"><?= esc($amigo['email']) ?></td>
                                <td class="px-6 py-4">
                                    <a href="<?= esc($amigo['id']) ?>/arboles" class="text-blue-600 hover:text-blue-800">
                                        Ver Árboles
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>

</html>