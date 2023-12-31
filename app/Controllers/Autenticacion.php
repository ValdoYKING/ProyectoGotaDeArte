<?php

namespace App\Controllers;

use App\Models\usuariosModel;
use App\Models\datosPersonalesModel;

class Autenticacion extends BaseController
{
    private $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new usuariosModel();
        helper(['url', 'form']);
    }
    /* ------------------------------- USUARIOS ------------------------------- */
    public function loginUsuario(): string
    {
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Iniciar sesión',
        ];
        $data = $dataContenido;
        return view('Autenticacion/login', $data);
    }

    public function autenticarInicioUsuario()
    {
        $correoUsername = $this->request->getPost('email-username');
        $contrasenia = $this->request->getPost('password');

        $usuario = $this->usuariosModel->where('correo', $correoUsername)->first();

        if ($usuario && property_exists($usuario, 'contrasenia') && property_exists($usuario, 'salt') && password_verify($contrasenia . $usuario->salt, $usuario->contrasenia) && $usuario->fk_rol === '1' && $usuario->estatus_user === '1') {
            $session = session();
            $session->set('user_id', $usuario->id);
            return redirect()->to('/inicio');
        } else {
            return redirect()->to('/login')->with('error', 'Credenciales incorrectas o no tienes el rol adecuado. Por favor, inténtalo de nuevo.');
        }
    }

    public function ingresarNuevoUsuario(): string
    {
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Registrate',
        ];
        $data = $dataContenido;
        return view('Autenticacion/registrarNuevo', $data);
    }

    public function registrarUsuario()
    {
        $nombre = $this->request->getPost('Nombre');
        $apellidos = $this->request->getPost('Apellidos');
        $correo = $this->request->getPost('email-username');
        $contrasenia = $this->request->getPost('password');
        $aceptaTerminos = $this->request->getPost('term_cond');

        $existingUser = $this->usuariosModel->where('correo', $correo)->first();

        if ($existingUser) {
            return redirect()->to('/registrar')->with('error', 'El correo ya está registrado');
        }

        $salt = base64_encode(random_bytes(16));
        $contraseniaConSalt = $contrasenia . $salt;
        $hashedPassword = password_hash($contraseniaConSalt, PASSWORD_DEFAULT);

        if ($aceptaTerminos) {
            $dataUsuarios = [
                'correo' => $correo,
                'contrasenia' => $hashedPassword,
                'salt' => $salt,
                'fk_rol' => 1,
                'estatus_user' => '1',
            ];
            $this->usuariosModel->insert($dataUsuarios);

            $usuarioId = $this->usuariosModel->getInsertID();

            $datosPersonalesModel = new datosPersonalesModel();
            $dataDatosPersonales = [
                'nombre' => $nombre,
                'a_paterno' => $apellidos,
                'a_materno' => '',
                'fk_usuario' => $usuarioId,
            ];
            $datosPersonalesModel->insert($dataDatosPersonales);

            return redirect()->to('/login')->with('message', 'Usuario creado con éxito, por favor inicia sesión.');
        } else {
            return redirect()->to('/registrar');
            // Puedes redirigir a una página de error o mostrar un mensaje al usuario
        }
    }

    public function salirUsuario()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    /* ARTISTA */

    public function loginArtista(): string
    {
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Iniciar sesión',
        ];
        $data = $dataContenido;
        return view('Autenticacion/loginArtista', $data);
    }

    public function autenticarInicioArtista()
    {
        $correoUsername = $this->request->getPost('email-username');
        $contrasenia = $this->request->getPost('password');

        $usuario = $this->usuariosModel->where('correo', $correoUsername)->first();

        if ($usuario && property_exists($usuario, 'contrasenia') && property_exists($usuario, 'salt') && password_verify($contrasenia . $usuario->salt, $usuario->contrasenia) && $usuario->fk_rol === '2' && $usuario->estatus_user === '1') {
            $session = session();
            $session->set('user_id', $usuario->id);
            return redirect()->to('Artista/publicacionesArtista');
        } else {
            return redirect()->to('/login_art')->with('error', 'Credenciales incorrectas o no tienes el rol adecuado. Por favor, inténtalo de nuevo.');
        }
    }

    public function ingresarArtista(): string
    {
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Registrate',
        ];
        $data = $dataContenido;
        return view('Autenticacion/registrarArtista', $data);
    }

    public function registrarUsuarioArtista()
    {
        $nombre = $this->request->getPost('Nombre');
        $apellidos = $this->request->getPost('Apellidos');
        $correo = $this->request->getPost('email-username');
        $contrasenia = $this->request->getPost('password');
        $aceptaTerminos = $this->request->getPost('term_cond');

        $existingUser = $this->usuariosModel->where('correo', $correo)->first();

        if ($existingUser) {
            return redirect()->to('/registrar_art')->with('error', 'El correo ya está registrado');
        }

        $salt = base64_encode(random_bytes(16));
        $contraseniaConSalt = $contrasenia . $salt;
        $hashedPassword = password_hash($contraseniaConSalt, PASSWORD_DEFAULT);

        if ($aceptaTerminos) {
            $dataUsuarios = [
                'correo' => $correo,
                'contrasenia' => $hashedPassword,
                'salt' => $salt,
                'fk_rol' => 2,
                'estatus_user' => '1',
            ];
            $this->usuariosModel->insert($dataUsuarios);

            $usuarioId = $this->usuariosModel->getInsertID();

            $datosPersonalesModel = new datosPersonalesModel();
            $dataDatosPersonales = [
                'nombre' => $nombre,
                'a_paterno' => $apellidos,
                'a_materno' => '',
                'fk_usuario' => $usuarioId,
            ];
            $datosPersonalesModel->insert($dataDatosPersonales);

            return redirect()->to('/login_art')->with('message', 'Usuario creado con éxito, por favor inicia sesión.');
        } else {
            return redirect()->to('/registrar_art');
            // Puedes redirigir a una página de error o mostrar un mensaje al usuario
        }
    }

    public function salirArtista()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login_art');
    }

    /* ADMINISTRADOR */

    public function loginAdmin(): string
    {
        $dataContenido = [
            'titulo' => 'GOTA DE ARTE | Iniciar sesión',
        ];
        $data = $dataContenido;
        return view('Autenticacion/loginAdmin', $data);
    }

    public function autenticarInicioAdmin()
    {
        $correoUsername = $this->request->getPost('email-username');
        $contrasenia = $this->request->getPost('password');

        $usuario = $this->usuariosModel->where('correo', $correoUsername)->first();

        if ($usuario && property_exists($usuario, 'contrasenia') && property_exists($usuario, 'salt') && password_verify($contrasenia . $usuario->salt, $usuario->contrasenia) && $usuario->fk_rol === '3' && $usuario->estatus_user === '1') {
            $session = session();
            $session->set('user_id', $usuario->id);
            return redirect()->to('/publicacionesLista');
        } else {
            return redirect()->to('/login_admin')->with('error', 'Credenciales incorrectas o no tienes el rol adecuado. Por favor, inténtalo de nuevo.');
        }
    }
    public function salirAdmin()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login_admin');
    }
}
