<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data['msg'] = '';

        if($this->request->getMethod() === "post"){
            $usuarioModel = model("usuarioModel");

            $usuarioCheck = $usuarioModel->check(
                $this->request->getPost('usuario'),
                $this->request->getPost('senha')
            );

            if (!$usuarioCheck){
                $data['msg'] = "usuário e/ou senha incorretos!";
            }else{
                //Salva os dados da sessão
                $this->session->set('nome', $usuarioCheck->nome);
                $this->session->set('perfil', $usuarioCheck->perfil);

                //redireciona o usuário para página restrita
                return redirect()->to('admin');

            }

        }



        return view('login', $data);
    }
}
