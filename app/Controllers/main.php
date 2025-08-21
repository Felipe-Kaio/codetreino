<?php

namespace App\Controllers;

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
		return view('subpasta/compras/loja');
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
