<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario extends Controller
{
    private $session;
    private $usuario_model;

    function __construct()
    {
        $this->session = session();
        $this->usuario_model = new UsuarioModel();
    }

    public function index()
    {
        echo View('login/index');
    }
    public function autenticar()
    {
        $request = request();
        $senha = $request->getPost('senha');
        if (is_string($senha)) {
            $senhaMD5 = md5($senha);
            $usuario = $this->usuario_model
                ->where('email', $request->getPost('email'))
                ->where('senha', $senhaMD5)
                ->first();


            if (!empty($usuario)) {
                $this->session->setFlashdata(
                    'alert',
                    [
                        'tipo'  => 'erro',
                        'cor'   => 'primary',
                        'titulo' => 'Bem vindo'
                    ]
                );
                $this->session->set('usuario', $usuario['nome']);
                $this->session->set('id_usuario',   $usuario['id_usuario']);
                $this->session->set('email',   $usuario['email']);
                return redirect()->to('/inicio');
            } else {
                $this->session->setFlashdata(
                    'alert',
                    [
                        'tipo'  => 'erro',
                        'cor'   => 'danger',
                        'titulo' => 'Email ou a senha estão incorretos!'
                    ]
                );
                return redirect()->to('/login');
            }
        }
    }

    public function registrar()
    {
        echo View('login/registrar');
    }

    public function store()
    {

        $request = request();
        $senha = $request->getPost('senha');
        if (is_string($senha)) {
            $senha = md5($senha);
            $dados = [
                'nome'  => $request->getPost('nome'),
                'senha' => $senha,
                'email' => $request->getPost('email'),
            ];
            $existe = $this->usuario_model->where('email', $dados['email'])->first();
            if ($existe) {
                $this->session->setFlashdata(
                    'alert',
                    [
                        'tipo'  => 'erro',
                        'cor'   => 'danger',
                        'titulo' => 'Email esse email ja esta cadastrado!'
                    ]
                );
                return redirect()->to('/login');
            } else {
                $this->usuario_model->insert($dados);
                $this->session->setFlashdata(
                    'alert',
                    [
                        'tipo'  => 'erro',
                        'cor'   => 'primary',
                        'titulo' => 'Usuario cadastrado com sucesso!!'
                    ]
                );
                return redirect()->to('/login');
            }
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
        $senha_nova     = $request->getPost('senha_nova');
        $senha_confirma = $request->getPost('senha_confirma');

        $session = session();
        $email = $session->get('email');

        $usuario = $this->usuario_model
            ->where('email',  $email)
            ->first();



        $senha = $request->getPost('senha_atual');

        if (is_string($senha)) {
            $senhaMD5 = md5($senha);
            is_string($senha_nova) ? md5($senha_nova) : '';

            if ($senhaMD5 == $usuario['senha']) {
                if ($senha_nova == $senha_confirma) {
                    $r = $this->usuario_model
                        ->where('email', $email)
                        ->set('senha',  is_string($senha_nova) ? md5($senha_nova) : '')
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
}
