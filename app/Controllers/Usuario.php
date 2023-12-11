<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Usuario extends Controller
{
    private $usuario_model;
/*
    function __construct()
    {
        $this->usuario_model = new UsuarioModel();
    }
*/
    public function index()
    {
        echo View('login/index');
    }
}
