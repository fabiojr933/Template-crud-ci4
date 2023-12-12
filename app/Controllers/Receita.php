<?php

namespace App\Controllers;

use App\Models\ReceitaModel;
use CodeIgniter\Controller;

class Receita extends Controller
{
    private $session;
    private $receita_model;

    function __construct()
    {
        $this->session = session();
        $this->receita_model = new ReceitaModel();
    }

    public function index()
    {
        $data['receita'] = $this->receita_model
            ->findAll();

        echo View('templates/header');
        echo View('Receita/index', $data);
        echo View('templates/footer');
    }

    public function novo()
    {
        echo View('templates/header');
        echo View('Receita/novo');
        echo View('templates/footer');
    }

    public function store()
    {

        $request = request();
        $ativo = $request->getPost('ativo') == 'on' ? 'S' : 'N';
        $id_receita = $request->getPost('id_receita');
        $dados = array(
            'nome'  => $request->getPost('nome'),
            'ativo' => $ativo
        );

        //Update
        if (isset($id_receita)) {
            $this->session->setFlashdata(
                'alert',
                [
                    'tipo'  => 'sucesso',
                    'cor'   => 'primary',
                    'titulo' => 'Receita alterada com sucesso!'
                ]
            );
            $this->receita_model->where('id_receita', $id_receita)
                ->set($dados)
                ->update();
        } else {
            //insert  
            $this->session->setFlashdata(
                'alert',
                [
                    'tipo'  => 'sucesso',
                    'cor'   => 'primary',
                    'titulo' => 'Receita cadastrada com sucesso!'
                ]
            );
            $this->receita_model->insert($dados);
        }
        return redirect()->to('receita');
    }

    public function editar($id)
    {
        $data['receita'] = $this->receita_model
            ->where('id_receita', $id)
            ->first();

        echo View('templates/header');
        echo View('Receita/novo', $data);
        echo View('templates/footer');
    }

    public function excluir()
    {
        $request = request();
        $id = $request->getPost('id_receita');
        $this->receita_model->where('id_receita', $id)
            ->delete();

        $this->session->setFlashdata(
            'alert',
            [
                'tipo'  => 'sucesso',
                'cor'   => 'primary',
                'titulo' => 'Receita excluída com sucesso!'
            ]
        );
        return redirect()->to('/receita');
    }

    public function visualizar($id)
    {
        $receita = $this->receita_model
            ->where('id_receita', $id)
            ->first();
        $data['receita'] = $receita;

        echo View('templates/header');
        echo View('Receita/visualizar', $data);
        echo View('templates/footer');
    }
}
