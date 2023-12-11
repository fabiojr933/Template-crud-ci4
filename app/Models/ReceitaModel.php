<?php

namespace App\Models;

use CodeIgniter\Model;

class ReceitaModel extends Model
{
    protected $table = 'receita';
    protected $primaryKey = 'id_receita';
    protected $allowedFields = [
        'id_receita',
        'nome',
        'ativo',
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
