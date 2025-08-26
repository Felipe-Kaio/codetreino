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

        $usuarioDados = $usuarioModel->getUsuario($email);


        if (!isset($_POST['email'], $_POST['senha']) &&  (empty($email) && empty($senha))) {
            $email = trim($_POST['email']);
            $senha = $_POST['senha'];
            echo 'Email ou senha inválida';
        }

        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Email inválido");
        }

        if ($usuarioDados && password_verify($senha, $usuarioDados['0']['senha'])) {
            $_SESSION['nome'] = $usuarioDados[0]['nome'];
            $_SESSION['email'] = $usuarioDados[0]['email'];
            echo 'Login realizado com sucesso!';
        }

        if ($usuarioDados) {
            session()->set('usuarios', ['nome_usuario' => $usuarioDados['0']['nome'], 'email_usuario' => $usuarioDados['0']['email']]);

            return redirect()->to(base_url('main/loja'));
        } else {
            return redirect()->back()->with('erro', 'Email ou senha inválidos.');
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
            return redirect()->to(base_url('main/login'));
        } else {
            echo implode('<br>', $usuarioModel->errors());
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
