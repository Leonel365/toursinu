<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $user['tipo'] = 'index';
        $data['cabecera'] = view('templates/cabecera', $user);
       $data['pie'] = view('templates/footer');
       
        return view('index', $data);
    }
}
