<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class OperadorAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $user = $session->get('user');

        // Verificar si el usuario está autenticado y si es un amigo
        if (!$user || $user['rol'] !== 'operador') {
            return redirect()->to('/auth/login')->with('error', 'Acceso denegado. Por favor, inicia sesión como operador.');
        }
    }   

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No se necesita implementar nada aquí
    }
}
