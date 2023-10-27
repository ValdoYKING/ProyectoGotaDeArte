<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Verificar si el usuario está autenticado
        $session = session();
        if (!$session->has('user_id')) {
            // El usuario no está autenticado, redirigir a la página de inicio de sesión
            return redirect()->to('/login');
        }

        // Si el usuario está autenticado, permite que continúe la solicitud
        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No es necesario realizar ninguna acción después del procesamiento de la solicitud
    }
}
