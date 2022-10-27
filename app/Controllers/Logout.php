<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
    public function index()
    {
        //Destruir a sessão
        $this->session->destroy();
        //Voltar para Login
        return redirect()->to('login');
    }
}
