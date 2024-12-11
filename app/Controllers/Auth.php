<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        // Mostrar la vista de login
        return view('auth/login');
    }

    public function authenticate()  // Método para autenticar a un usuario
{
    $session = session();
    $userModel = new User();

    // Obtener los datos del formulario
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Buscar al usuario por correo electrónico
    $user = $userModel->where('email', $email)->first();

    // Validar usuario y contraseña
    if ($user && md5($password) === $user['contrasena']) {
        // Guardar datos del usuario en la sesión
        $session->set('user', [
            'id' => $user['id'],
            'nombre' => $user['nombre'],
            'rol' => $user['rol']
        ]);

        // Redirigir según el rol
        if ($user['rol'] === 'admin') {
            return redirect()->to('/admin/dashboard');
        } elseif ($user['rol'] === 'operador') {
            return redirect()->to('/operador/dashboard'); // corresponde a Jeff
        } elseif ($user['rol'] === 'amigo') {
            return redirect()->to('/amigo');
        }
    }

    // Error de autenticación
    return redirect()->back()->with('error', 'Usuario o contraseña incorrectos.');
}


    public function signup() // Método para mostrar el formulario de registro
    {
        // Mostrar el formulario de registro
        return view('auth/signup');
    }

    public function storeSignup()
    {
        $userModel = new \App\Models\User();
        $session = session();

        // Validar datos del formulario
        $rules = [
            'nombre'    => 'required|min_length[3]|max_length[100]',
            'apellido'  => 'required|min_length[3]|max_length[100]',
            'email'     => 'required|valid_email|is_unique[usuarios.email]',
            'telefono'  => 'required|min_length[8]|max_length[15]',
            'direccion' => 'required',
            'pais'      => 'required',
            'password'  => 'required|min_length[8]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Guardar usuario con rol amigo
        $userModel->insert([
            'nombre'    => $this->request->getPost('nombre'),
            'apellido'  => $this->request->getPost('apellido'),
            'email'     => $this->request->getPost('email'),
            'telefono'  => $this->request->getPost('telefono'),
            'direccion' => $this->request->getPost('direccion'),
            'pais'      => $this->request->getPost('pais'),
            'contrasena' => md5($this->request->getPost('password')),
            'rol'       => 'amigo', // Rol predeterminado
        ]);

        // Redirigir al inicio de sesión
        $session->setFlashdata('success', 'Registro exitoso. Por favor, inicia sesión.');
        return redirect()->to('/auth/login');
    }


    public function logout() // Método para cerrar sesión
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth/login');
    }
}
