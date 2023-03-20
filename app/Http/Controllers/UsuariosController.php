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

    public function login() {

        $usuarios = Usuario::all();
        $dados = ['usuarios' => $usuarios];
        
        return View('/login', $dados);
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
        $usuario->image =       $request->input('image');
        $usuario->github =      $request->input('github');
        
        $usuario->save();    
        
        return redirect()->to('/usuarios'); 
    }

    public function delete(Request $request) {
        
        $usuario = new Usuario();

        $usuario->where('id', $request->query('id'))
            ->first()
            ->delete();

        return redirect()->to('/usuarios'); 
    }

    public function find(Request $request) {
        
        $usuario = new Usuario();

        $usuario_id = $usuario->where('id', $request->query('id'))->first();

        echo json_encode($usuario_id);
    }

    public function update(Request $request) {
        
        $usuario = new Usuario();

        $usuario->where('id', $request->input('id'))
                ->update(['nome'=> $request->input('nome'), 
                      'email'=> $request->input('email'),
                      'github'=> $request->input('github')]
                    );
        
        return redirect()->to('/usuarios');
    }
}
