<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Iniciar Sesión - GreenLifeInc</title>
</head>

<body class="h-full">
    <div class="flex items-center justify-center min-h-screen px-4 py-12 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-lg shadow-lg">
            <div class="text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/2220/2220061.png" alt="Logo" width="100" height="100" class="mx-auto mb-4">
                <h1 class="text-2xl font-bold text-green-900">Bienvenido a Green Life Inc<br />Por favor, inicia sesión.</h1>
            </div>
            <?php if (session()->getFlashdata('error')): ?>
                <p class="text-red-500 text-sm"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>
            <form action="<?= base_url('auth/authenticate') ?>" method="post" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-medium text-green-900">Correo Electrónico:</label>
                    <input type="email" name="email" id="email" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-green-900">Contraseña:</label>
                    <input type="password" name="password" id="password" required 
                        class="mt-1 block w-full px-3 py-2 rounded-md border-0 shadow-sm ring-1 ring-inset ring-green-300 focus:ring-2 focus:ring-green-600 sm:text-sm">
                </div>
                <div class="flex justify-between items-center space-x-2">
                    <!-- Botón de Iniciar Sesión -->
                    <button type="submit" 
                        class="w-full inline-flex justify-center rounded-md border border-transparent bg-green-600 py-2 px-4 text-sm font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Iniciar Sesión
                    </button>

                    <!-- Botón de Registro -->
                    <a href="<?= base_url('signup') ?>" 
                        class="w-full inline-flex justify-center rounded-md border border-green-600 bg-white py-2 px-4 text-sm font-medium text-green-600 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Registrarse
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
