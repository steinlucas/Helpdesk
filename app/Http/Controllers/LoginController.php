<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cliente;

class LoginController extends Controller
{
    public function index()
    {
        return view("sessions.index");
    }

    public function login(Request $request)
    {
        if (!empty($request) AND (empty($request->username) OR empty($request->password))) {
            return redirect()->to(route('session.index'));
            exit;
        }

        $usuarios = Usuario::where('username', $request->username)->get();

        foreach ($usuarios as $usuario) {
            if (password_verify($request->password, $usuario->password) == true) {
                $clientes = Cliente::where('id', $usuario->idcliente)->get();

                session_start();

                foreach ($clientes as $cliente) {
                    if ($usuario->status != true || $cliente->status != true) {
                        return redirect()->to(route('session.index'));
                    }

                    $_SESSION['nomecliente'] = $cliente->nome;
                }

                $_SESSION['idusuario'] = $usuario->id;
                $_SESSION['username'] = $usuario->username;
                $_SESSION['nome'] = $usuario->nome;
                $_SESSION['status'] = $usuario->status;
                $_SESSION['idcliente'] = $usuario->idcliente;
                $_SESSION['tipousuario'] = $usuario->tipoUsuario;

                return redirect()->to(route('chamado.index'));
            }
        }

        return redirect()->to(route('session.index'));
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        return redirect()->to(route('session.index'));
        exit;
    }
}
