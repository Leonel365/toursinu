<?php

namespace App\Controllers;

class Lugares extends BaseController
{
    public function index()
    {
        $user['tipo'] = 'index';
        $data['cabecera'] = view('templates/cabecera', $user);
        $data['pie'] = view('templates/footer');
       
        return view('lugares', $data);
    }

    public function login()
    {
        $user['tipo'] = 'index';
        $data['cabecera'] = view('templates/cabecera', $user);
        $data['pie'] = view('templates/footer');

       return view('login/login', $data);
    }

    public function validar_Login()
    {
        $user['tipo'] = 'index';
        $data['cabecera'] = view('templates/cabecera', $user);
        $data['pie'] = view('templates/footer');

       return view('login/validar_login', $data);
    }
}