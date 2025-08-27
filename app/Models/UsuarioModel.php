<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    // Nome da tabela no banco de dados.
    protected $table = 'usuarios';

    protected $primaryKey = 'id';

    protected $allowedFields = ['nome', 'cpf', 'email', 'senha', 'telefone'];

    // Regras de validação para os campos do formulário.
    protected $validationRules =  [
        'nome' => 'required|alpha_space|min_length[3]|max_length[50]',
        'cpf' => [
            'rules' => 'required|exact_length[14]|is_unique[usuarios.cpf]|validaCPF',
            'errors' => [
                'validaCPF' => 'CPF inválido.',
            ]
        ],
        'email' => [
            'rules' => 'required|valid_email|max_length[100]|is_unique[usuarios.email]',
            'errors' => [
                'required' => 'Preencha o seu e-mail corretamente.',
                'valid_email' => 'O e-mail informado não é válido.',
                'is_unique' => 'Este e-mail já está em uso.',
            ]
        ],
        'senha' => 'required|min_length[8]|max_length[64]|regex_match[/^(?=.*[A-Za-z])(?=.*\d).+$/]',
        'telefone' => 'required|regex_match[/^\(\d{2}\)\s?\d{4,5}-\d{4}$/]|max_length[15]',

    ];

    public function getUsuario($email)
    {
        // Constrói a consulta para buscar o usuário pelo email.
        $builder = $this->db->table('usuarios')
            ->select('*')
            ->where('email', $email);

        $query = $builder->get();

        return $query->getResultArray();
    }



    public function setUsuario($dataUsuario)
    {
        // Insere um novo usuário no banco de dados.
        if ($this->insert($dataUsuario)) {
            return true;
        } else {
            return false;
        }
    }
}
