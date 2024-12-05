<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Editar Usuario</title>
</head>

<body class="h-full">
    <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-lg w-full bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-green-900 text-center mb-4">Editar Usuario</h1>

            <!-- Mostrar mensajes de error -->
            <?php if (session()->getFlashdata('error')): ?>
                <p class="text-red-500 text-sm text-center"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>

            <!-- Formulario para editar usuario -->
            <form action="<?= base_url('admin/usuarios/editar/' . $user['id']) ?>" method="post" class="space-y-4">
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-green-900">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" value="<?= $user['nombre'] ?>" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border border-green-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 shadow-sm">
                </div>

                <!-- Apellido -->
                <div>
                    <label for="apellido" class="block text-sm font-medium text-green-900">Apellido:</label>
                    <input type="text" name="apellido" id="apellido" value="<?= $user['apellido'] ?>" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border border-green-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 shadow-sm">
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-green-900">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" value="<?= $user['telefono'] ?>" 
                        class="mt-1 block w-full px-3 py-2 rounded-md border border-green-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 shadow-sm">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-green-900">Email:</label>
                    <input type="email" name="email" id="email" value="<?= $user['email'] ?>" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border border-green-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 shadow-sm">
                </div>

                <!-- Dirección -->
                <div>
                    <label for="direccion" class="block text-sm font-medium text-green-900">Dirección:</label>
                    <textarea name="direccion" id="direccion" rows="3" 
                        class="mt-1 block w-full px-3 py-2 rounded-md border border-green-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 shadow-sm"><?= $user['direccion'] ?></textarea>
                </div>

                <!-- País -->
                <div>
                    <label for="pais" class="block text-sm font-medium text-green-900">País:</label>
                    <input type="text" name="pais" id="pais" value="<?= $user['pais'] ?>" 
                        class="mt-1 block w-full px-3 py-2 rounded-md border border-green-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 shadow-sm">
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="contrasena" class="block text-sm font-medium text-green-900">Contraseña:</label>
                    <input type="password" name="contrasena" id="contrasena" 
                        class="mt-1 block w-full px-3 py-2 rounded-md border border-green-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 shadow-sm">
                    <!-- Campo oculto para mantener la contraseña existente -->
                    <input type="hidden" name="existing_password" value="<?= $user['contrasena'] ?>">
                </div>

                <!-- Rol -->
                <div>
                    <label for="rol" class="block text-sm font-medium text-green-900">Rol:</label>
                    <select name="rol" id="rol" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border border-green-300 focus:ring-2 focus:ring-green-600 focus:border-green-600 shadow-sm">
                        <option value="admin" <?= $user['rol'] === 'admin' ? 'selected' : '' ?>>Administrador</option>
                        <option value="operador" <?= $user['rol'] === 'operador' ? 'selected' : '' ?>>Operador</option>
                    </select>
                </div>

                <!-- Botón Actualizar -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-white text-sm">
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
