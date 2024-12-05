<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAuth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Verificar si el usuario está autenticado y es administrador
        if (!$session->get('user') || $session->get('user')['rol'] !== 'admin') {
            // Redirigir al login si no tiene acceso
            return redirect()->to('/auth/login')->with('error', 'No tienes permiso para acceder a esta sección.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita procesamiento posterior
    }
}
