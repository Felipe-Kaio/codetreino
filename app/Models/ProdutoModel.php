<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'preco' , 'descricao', 'estoque'];

    public function getProdutos($id = null)
    {
        $builder = $this->db->table('produtos')
            ->select('*')
            ->where('id', $id);

            $query = $builder->get();

            return $query->getResultArray();
    }
}
