<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

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
            $_SESSION['nome'] = $usuarioDados['nome'];
            $_SESSION['email'] = $usuarioDados['email'];
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

        $nome = $this->request->getPost('nome');
        $cpf = preg_replace('/\D/', '', $this->request->getPost('cpf'));
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        $telefone = preg_replace('/\D/', '', $this->request->getPost('telefone'));

        $dataUsuario =[
            'nome' => $nome,
            'cpf' => $cpf,
            'email' => $email,  
            'senha' => $senha,
            'telefone' => $telefone
        ];

        $usuarioModel->save($dataUsuario);


        // $erros = [];

        // // Validação básica
        // if (empty($nome) || empty($cpf) || empty($email) || empty($telefone) || empty($senha)) {
        //     $erros[] = "Preencha todos os campos.";
        // }

        // if (strlen($senha) < 6) {
        //     $erros[] = "A senha deve ter pelo menos 6 caracteres.";
        // }

        // // Verifica se e-mail já existe
        //  $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE email = ?");
        // $stmt->bind_param("s", $email);
        // $stmt->execute();
        // $resultado = $stmt->get_result();

        // if ($resultado->num_rows > 0) {
        //     $erros[] = "Este e-mail já está cadastrado.";
        // }

        // // Verifica se CPF já existe
        // $stmt = $conexao->prepare("SELECT id FROM usuarios WHERE cpf = ?");
        // $stmt->bind_param("s", $cpf);
        // $stmt->execute();
        // $resultado = $stmt->get_result();

        // if ($resultado->num_rows > 0) {
        //     $erros[] = "Este CPF já está cadastrado.";
        // }

        // if (empty($erros)) {
        //     $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        //     // Insere no banco
        //     $stmt = $conexao->prepare("INSERT INTO usuarios (nome, cpf, email, telefone, senha) VALUES (?, ?, ?, ?, ?)");
        //     $stmt->bind_param("", $nome, $cpf, $email, $telefone, $senhaHash);

        //     if ($stmt->execute()) {
        //         // Redireciona pro login com sucesso
        //         base_url('home/login');
        //         exit();
        //     } else {
        //         $erros[] = "Erro ao cadastrar. Tente novamente mais tarde.";
        //     }
        // }

        // // Se tiver erro, salva numa sessão pra exibir depois (opcional)
        // if (!empty($erros)) {
        //     session_start();
        //     $_SESSION['cadastro_erros'] = $erros;
        // }
    }
}
