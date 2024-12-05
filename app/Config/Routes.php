<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Rutas generales
$routes->get('/', 'Home::index');



$routes->get('/test-db', 'Home::testDatabase');
$routes->get('/auth/login', 'Auth::login');
$routes->post('/auth/authenticate', 'Auth::authenticate');
$routes->get('/auth/logout', 'Auth::logout');

$routes->get('/signup', 'Auth::signup'); // Mostrar el formulario de registro
$routes->post('/signup', 'Auth::storeSignup'); // Procesar el registro

// Grupo de rutas para el administrador
$routes->group('admin', ['filter' => 'adminAuth'], function ($routes) {
    $routes->get('/', 'Admin::index'); // Ruta principal del administrador
    $routes->get('dashboard', 'Admin::dashboard');
    


    // CRUD de especies
    $routes->get('especies', 'Admin::listSpecies');
    $routes->get('especies/crear', 'Admin::createSpecies');
    $routes->post('especies/crear', 'Admin::storeSpecies');
    $routes->get('especies/editar/(:num)', 'Admin::editSpecies/$1');
    $routes->post('especies/editar/(:num)', 'Admin::updateSpecies/$1');
    $routes->get('especies/eliminar/(:num)', 'Admin::deleteSpecies/$1');

    // CRUD de árboles
    $routes->get('arboles', 'Admin::listTrees');
    $routes->get('arboles/crear', 'Admin::createTree');
    $routes->post('arboles/crear', 'Admin::storeTree');
    $routes->get('arboles/editar/(:num)', 'Admin::editTree/$1');
    $routes->post('arboles/editar/(:num)', 'Admin::updateTree/$1');
    $routes->get('arboles/eliminar/(:num)', 'Admin::deleteTree/$1');

    // CRUD de usuarios
    $routes->get('usuarios', 'Admin::listUsers');
    $routes->get('usuarios/crear', 'Admin::createUser');
    $routes->post('usuarios/crear', 'Admin::storeUser');
    $routes->get('usuarios/editar/(:num)', 'Admin::editUser/$1');
    $routes->post('usuarios/editar/(:num)', 'Admin::updateUser/$1');
    $routes->get('usuarios/eliminar/(:num)', 'Admin::deleteUser/$1');

    // Listar amigos
    $routes->get('amigos', 'Admin::listAmigos');
    // Ver árboles de un amigo
    $routes->get('amigos/(:num)/arboles', 'Admin::viewArbolesAmigo/$1');
});

// Grupo de rutas para el amigo
$routes->group('amigo', ['filter' => 'amigoAuth'], function ($routes) {
    $routes->get('dashboard', 'Amigo::dashboard'); // Página principal del amigo
    $routes->get('arboles', 'Amigo::listAvailableTrees'); // Árboles disponibles
    $routes->get('arboles/(:num)/comprar', 'Amigo::buyTree/$1'); // Comprar árbol
    $routes->post('arboles/(:num)/comprar', 'Amigo::storePurchase/$1'); // Guardar compra
    $routes->get('mis-arboles', 'Amigo::listMyTrees'); // Mis árboles
    $routes->get('mis-arboles/(:num)', 'Amigo::viewTree/$1'); // Detalles del árbol
    $routes->get('amigo/mis-arboles/(:num)/historial', 'Amigo::viewHistorial/$1');
    $routes->get('mis-arboles/(:num)/historial', 'Amigo::viewHistorial/$1');
});

$routes->get('admin/arboles/(:num)', 'Admin::viewTree/$1'); // Ver detalles del árbol

$routes->post('/admin/arboles/(:num)/historial/guardar', 'Admin::saveHistorial/$1');

$routes->get('/admin/arboles/(:num)/historial/agregar', 'Admin::updateHistorialForm/$1');
$routes->post('/admin/arboles/(:num)/historial/agregar', 'Admin::saveHistorial/$1');

$routes->get('/admin/arboles/(:num)/historial', 'Admin::viewHistorial/$1');

// rutas de operador
$routes->group('operador', ['filter' => 'operadorAuth'], function ($routes) {
    $routes->get('dashboard', 'Operador::dashboard'); // Página principal del operador
    $routes->get('usuarios/crear', 'Admin::createUser');
    $routes->post('usuarios/crear', 'Admin::storeUser');
    $routes->get('usuarios/editar/(:num)', 'Admin::editUser/$1');
    $routes->post('usuarios/editar/(:num)', 'Admin::updateUser/$1');
    $routes->get('usuarios/eliminar/(:num)', 'Admin::deleteUser/$1');
});