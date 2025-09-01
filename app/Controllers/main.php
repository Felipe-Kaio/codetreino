<?php

namespace App\Controllers;

use App\Models\ProdutoModel;

class main extends BaseController
{
	// ======================================================
	public function index()
	{
		return view('subpasta/homePage');
	}

	public function cadastro()
	{
		return view('subpasta/login_cadastro/cadastro');
	}
	public function login()
	{
		return view('subpasta/login_cadastro/login');
	}

	public function loja()
	{
		$produtoModel = new ProdutoModel();
        $produtos = $produtoModel->findAll(); // Busca todos os produtos

		return view('subpasta/compras/loja', ['produtos' => $produtos]);
	}

	public function carrinho()
	{
		return view('subpasta/compras/carrinho');
	}

	public function tlsbmais()
	{
		return view('subpasta/telas_texto/tlsbmais');
	}

	public function tlnoticias()
	{
		return view('subpasta/telas_texto/tlnoticias');
	}
	// ======================================================



}
