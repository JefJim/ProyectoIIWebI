<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AmigoAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $user = $session->get('user');

        // Verificar si el usuario está autenticado y si es un amigo
        if (!$user || $user['rol'] !== 'amigo') {
            return redirect()->to('/auth/login')->with('error', 'Acceso denegado. Por favor, inicia sesión como amigo.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita implementar nada aquí
    }
}
