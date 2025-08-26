<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Exceptions\AlertError;

class Autenticar extends BaseController
{

    public function autenticar_login()
    {

        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        $usuarioDados = $usuarioModel->where('email', $email)->findAll();

       
        if (empty($email) || empty($senha)) {
            session()->setFlashdata('erro', 'Email e senha são obrigatórios.');
            return redirect()->back()->withInput();
        }

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            session()->setFlashdata('erro', 'Email inválido.');
            return redirect()->back()->withInput();
        }

        $usuarioDados = $usuarioModel->getUsuario($email);

        if ($usuarioDados && password_verify($senha, $usuarioDados[0]['senha'])) {
            
            session()->set('usuarios', [
                'nome_usuario' => $usuarioDados[0]['nome'],
                'email_usuario' => $usuarioDados[0]['email']
            ]);

            session()->setFlashdata('sucesso', 'Usuário logado com sucesso!');
            return redirect()->to(base_url('main/loja'));
        } else {
            session()->setFlashdata('erro', 'Email ou senha inválidos.');
            return redirect()->back()->withInput();
        }
    }


    public function NovoCliente()
    {

        $usuarioModel = new UsuarioModel();

        if ($this->validarSenha('senha') == false) {
        }

        $nome = $this->request->getPost('nome');
        $cpf = preg_replace('/\D/', '', $this->request->getPost('cpf'));
        $email = $this->request->getPost('email');
        $senha = password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT);
        $telefone = preg_replace('/\D/', '', $this->request->getPost('telefone'));

        $dataUsuario = [
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,
            'senha' => $senha,
            'telefone' => $telefone
        ];

        if ($usuarioModel->save($dataUsuario)) {
            session()->setFlashdata('Sucesso', 'Usuário cadastrado com sucesso!');
            return redirect()->to(base_url('main/login'));
        } else {
            session()->setFlashdata('Erro', 'Usuário não pode ser cadastrado!');
        }
    }


    public function validarSenha()
    {
        $senha = $this->request->getPost('senha');

        if (!empty($senha)) {

            if (strlen($senha) < 4 || strlen($senha) > 15) {
                return false;
            }
            return true;
        }
        return false;
    }
}
