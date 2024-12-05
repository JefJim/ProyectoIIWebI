<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Registro de Amigo - GreenLifeInc</title>
</head>

<body class="h-full">
    <div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-center text-green-900">Registro de Amigo</h1>
            <p class="text-center text-green-700 mb-4">Completa el formulario para registrarte.</p>
            
            <!-- Mostrar errores -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="text-red-500 text-sm text-center">
                    <ul>
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="/signup" method="post" class="space-y-6">
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-green-900">Nombre:</label>
                    <input id="nombre" type="text" name="nombre" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>

                <!-- Apellido -->
                <div>
                    <label for="apellido" class="block text-sm font-medium text-green-900">Apellido:</label>
                    <input id="apellido" type="text" name="apellido" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label for="email" class="block text-sm font-medium text-green-900">Correo Electrónico:</label>
                    <input id="email" type="email" name="email" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-green-900">Teléfono:</label>
                    <input id="telefono" type="text" name="telefono" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>

                <!-- Dirección -->
                <div>
                    <label for="direccion" class="block text-sm font-medium text-green-900">Dirección:</label>
                    <input id="direccion" type="text" name="direccion" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>

                <!-- País -->
                <div>
                    <label for="pais" class="block text-sm font-medium text-green-900">País:</label>
                    <input id="pais" type="text" name="pais" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>

                <!-- Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-green-900">Contraseña:</label>
                    <input id="password" type="password" name="password" required minlength="8" 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>

                <!-- Botón de envío -->
                <div class="flex justify-center">
                    <button type="submit" 
                        class="w-full inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
