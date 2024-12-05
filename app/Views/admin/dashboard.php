<!DOCTYPE html>
<html lang="es" class="h-full bg-green-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Dashboard</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <!-- Barra de Navegación -->
        <?= $this->include('admin/includes/nav') ?>

        <!-- Contenido del Dashboard -->
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold text-green-900">Dashboard</h1>
                <div class="mt-6 border-t border-green-100">
                    <dl class="divide-y divide-green-100">
                        <!-- Total Amigos Registrados -->
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-green-900">Amigos Registrados</dt>
                            <dd class="mt-1 text-sm leading-6 text-green-700 sm:col-span-2 sm:mt-0"><?= esc($totalAmigos) ?></dd>
                        </div>
                        <!-- Total Árboles Disponibles -->
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-green-900">Árboles Disponibles</dt>
                            <dd class="mt-1 text-sm leading-6 text-green-700 sm:col-span-2 sm:mt-0"><?= esc($totalArbolesDisponibles) ?></dd>
                        </div>
                        <!-- Total Árboles Vendidos -->
                        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                            <dt class="text-sm font-medium leading-6 text-green-900">Árboles Vendidos</dt>
                            <dd class="mt-1 text-sm leading-6 text-green-700 sm:col-span-2 sm:mt-0"><?= esc($totalArbolesVendidos) ?></dd>
                        </div>
                    </dl>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
