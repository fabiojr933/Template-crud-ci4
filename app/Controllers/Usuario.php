<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario extends Controller
{
    private $usuario_model;

    function __construct()
    {
        $this->usuario_model = new UsuarioModel();
    }

    public function index()
    {
        echo View('login/index');
    }
    public function autenticar()
    {
        $request = request();

        $usuario = $this->usuario_model
            ->where('email', $request->getPost('email'))
            ->where('senha', $request->getPost('senha'))
            ->first();

        $session = session();
        if (!empty($usuario)) {
            $session->set('usuario', $usuario['nome']);
            $session->set('email',   $usuario['email']);
            $session->setFlashdata('alert', 'success_login');
            return redirect()->to('/inicio');
        } else {
            $session->setFlashdata('alert', 'error_login');
            return redirect()->to('/login');
        }
    }

    public function sair()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }

    public function trocaSenha()
    {
        echo View('templates/header');
        echo View('login/trocaSenha');
        echo View('templates/footer');
    }

    public function mudarSenha()
    {
        $request = request();
        $senha_atual    = $request->getPost('senha_atual');
        $senha_nova     =  $request->getPost('senha_nova');
        $senha_confirma = $request->getPost('senha_confirma');

        $session = session();
        $email = $session->get('email');

        $usuario = $this->usuario_model
            ->where('email',  $email)
            ->first();

        if ($senha_atual == $usuario['senha']) {
            if ($senha_nova == $senha_confirma) {
                $this->usuario_model
                    ->where('email', $email)
                    ->set('senha', $senha_nova)
                    ->update();
                $session->setFlashdata('alert', 'success_troca_senha');
                return redirect()->to('/usuario/trocar_senha');
            } else {
                $session->setFlashdata('alert', 'erro_troca_senha');
                return redirect()->to('/usuario/trocar_senha');
            }
        } else {
            $session->setFlashdata('alert', 'erro_troca_senha2');
            return redirect()->to('/usuario/trocar_senha');
        }
    }
}
