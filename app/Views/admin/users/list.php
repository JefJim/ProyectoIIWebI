<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Lista de Administradores y Operadores</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Barra de Navegación -->
        <?= $this->include('admin/includes/nav') ?>

        <!-- Contenido -->
        <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-green-900">Lista de Administradores y Operadores</h1>
                <a href="<?= base_url('admin/usuarios/crear') ?>"
                    class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-white text-sm">
                    Agregar Usuario
                </a>
                <a href="/admin/dashboard" type="submit"
                    class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-sm text-white">
                    Atrás
                </a>
            </div>

            <div class="relative overflow-x-auto bg-white p-6 rounded-lg shadow-lg">
                <table class="w-full text-sm text-left text-green-900">
                    <thead class="text-xs text-green-700 uppercase bg-green-50">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Nombre</th>
                            <th class="px-6 py-3">Apellido</th>
                            <th class="px-6 py-3">Email</th>
                            <th class="px-6 py-3">Rol</th>
                            <th class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr class="bg-white border-b hover:bg-green-50">
                            <td class="px-6 py-4"><?= esc($user['id']) ?></td>
                            <td class="px-6 py-4"><?= esc($user['nombre']) ?></td>
                            <td class="px-6 py-4"><?= esc($user['apellido']) ?></td>
                            <td class="px-6 py-4"><?= esc($user['email']) ?></td>
                            <td class="px-6 py-4"><?= ucfirst(esc($user['rol'])) ?></td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="<?= base_url('admin/usuarios/editar/' . $user['id']) ?>"
                                    class="text-blue-600 hover:text-blue-800">
                                    Editar
                                </a>
                                |
                                <a href="<?= base_url('admin/usuarios/eliminar/' . $user['id']) ?>"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')"
                                    class="text-red-600 hover:text-red-800">
                                    Eliminar
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