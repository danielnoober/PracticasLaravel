<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
  public function listar(){
    //$usuarios=User::select('id','name','email','password')->get();
    $usuarios=User::all();
    //return $usuarios;
    return view('usuarios.lista_usuarios',compact('usuarios'));
  }
  public function crear(){
    return view('usuarios.registrar');
  }
  public function registrar(Request $request){
    //return $request;
    $request->validate([
      'password' => [
          'required',
          'string',
          'min:8',
          'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d]).+$/',
          'confirmed'
      ],
  ], [
      'password.regex' => 'La contraseña debe tener al menos una mayúscula, un número y un carácter especial.',
  ]);
    $registro=new User();
    $registro->name=ucwords($request->name);
    $registro->email=$request->email;
    $registro->password=bcrypt($request->password);
    $registro->save();
    return redirect()->route('lista_usuarios');
    //return view('usuarios.registrar');
  }
  public function actualizar($id){
    $usuarios=User::find($id);
    return view('usuarios.actualizar',compact('usuarios'));
  }
}
