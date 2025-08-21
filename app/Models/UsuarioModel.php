<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{



    protected $table = 'usuarios';

    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'cpf', 'email', 'senha', 'telefone'];

    protected $validationRules =  [
        'nome' => 'required|max_length[30]|alpha_numeric_space|min_length[3]',
        'cpf' => 'required|max_length[14]|is_unique[users.cpf]|min_length[14]',
        'email' => [
            'rules' => 'required|max_length[40]|valid_email|is_unique[users.email]',
            'erros' => [
                'required' => 'Preencha o seu email corretamente!'
            ]
        ],
        'senha' =>  'required|max_length[12]|alpha_numeric_space|min_length[4]',
        'telefone' => 'required|max_length[14]|min_length[14]'

    ];

    public function getUsuario($email)
    {
        $builder = $this->db->table('usuarios')
            ->select('*')
            ->where('email', $email);


        $query = $builder->get();

        return $query->getResultArray();
    }

    public function setUsuario() {}
}
