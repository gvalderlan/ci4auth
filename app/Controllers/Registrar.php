<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;
use Exception;

class Registrar extends BaseController
{
    public function index()
    {

        $data['msg'] = '';
        if($this->request->getMethod() === 'post'){
            
            $usuarioModel = model("UsuarioModel");
            
            try{
                
                $usuarioData =  $this->request->getPost();
                $usuarioData['perfil'] = 'usuario';//perfil default
                
                if ($usuarioModel->save($usuarioData)){
                    $data['msg'] = 'Usuário criado com sucesso!';
                }else{
                    $data['msg'] = 'Erro ao criar usuário!';
                    $data['errors'] = $usuarioModel->errors();
                }
            }catch(Exception $e){
                $data['msg'] = 'Erro ao criar usuário: '.$e->getMessage();
            }

        }

        return view('registrar', $data);
    }
}
