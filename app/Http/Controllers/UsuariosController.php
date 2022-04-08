<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\UsuarioModel;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function lista() {

        $usuarios = Usuario::all();
        $dados = ['usuarios' => $usuarios];
        
        return View('usuarios', $dados);
    }

    public function usuario_detalhes($id) {
       
        $usuario = Usuario::id($id);
        $data = ['usuario' => $usuario];
        
        return View('usuario-detalhes', $data);
    }
    

    public function store(Usuario $usuario, Request $request) {

        $usuario->nome =        $request->input('nome');
        $usuario->email =       $request->input('email');
        $usuario->password =    $request->input('password');
        $usuario->tipo =        $request->input('tipo');

        $usuario->save();    
        
        return redirect()->to('/usuarios'); 
    }

    // public function delete($id) {
       
    //     $usuario->id = $id;
    //     $usuario->save();  
    // }

    
}
