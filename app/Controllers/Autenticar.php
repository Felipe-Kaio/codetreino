<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Exceptions\AlertError;

class Autenticar extends BaseController
{

    public function autenticar_login()
    {
        // Obtém os dados do formulário.
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        // Instancia o modelo de usuário.
        $usuarioModel = new UsuarioModel();
        $usuarioDados = $usuarioModel->where('email', $email)->first();

        // Verifica se os campos estão vazios.
        if (empty($email) || empty($senha)) {
            return redirect()->to(base_url('main/login'));
        }

        // Sanitiza e valida o email.
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->to(base_url('main/login'));
        }

        // Busca o usuário no banco de dados.
        $usuarioDados = $usuarioModel->getUsuario($email);

        // Verifica se o usuário existe e se a senha está correta.  
        if ($usuarioDados && password_verify($senha, $usuarioDados[0]['senha'])) {

            session()->set('usuarios', [
                'nome_usuario' => $usuarioDados[0]['nome'],
                'email_usuario' => $usuarioDados[0]['email']
            ]);
            // Login deu certo!

            // Redirecionado para a loja.
            session()->setFlashdata('tipo', 'bg-success');
            session()->setFlashdata('mensagem', 'Login realizado com sucesso!');
            return redirect()->to(base_url('main/loja'));
        } else {
            // Login deu errado!

            // Redirecionado novamente para o login.
            session()->setFlashdata('tipo', 'bg-danger');
            session()->setFlashdata('mensagem', 'Falha ao realizar o login!');
            return redirect()->to(base_url('main/login'));
        }
    }


    public function NovoCliente()
    {
        // Instancia o modelo de usuário.
        $usuarioModel = new UsuarioModel();

        // Valida os dados do formulário.
        if ($this->validarSenha('senha') == false) {
        }
        // Obtém os dados do formulário.
        $nome = $this->request->getPost('nome');
        $cpf = preg_replace('/\D/', '', $this->request->getPost('cpf'));
        $email = $this->request->getPost('email');
        $senha = password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT);
        $telefone = preg_replace('/\D/', '', $this->request->getPost('telefone'));

        // Prepara os dados para inserção.
        $dataUsuario = [
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,
            'senha' => $senha,
            'telefone' => $telefone
        ];

        // Tenta salvar o novo usuário.
        if ($usuarioModel->save($dataUsuario)) {
            // Login deu certo!

            // Redirecionado para o login.
            return redirect()->to(base_url('main/login'));
        } else {
            // Login deu errado!

            // Redirecionado novamente para o cadastro.
            return redirect()->to(base_url('main/cadastro'));
        }
    }


    public function validarSenha()
    {
        // Obtém a senha do formulário.
        $senha = $this->request->getPost('senha');

        // Verifica se a senha não está vazia e atende aos critérios de comprimento.
        if (!empty($senha)) {
            if (strlen($senha) < 8 || strlen($senha) > 64) {
                return false;
            }
            return true;
        }
        return false;
    }
}
