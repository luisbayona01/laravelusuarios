<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;

class UsuariosController extends Controller {

    public function showUsers() {
     /*usuando  eloquent  para llamar todos los datos */
        $usuarios = Usuarios::all();
        return $usuarios;
    }

    public function registerUsers(Request $request) {

        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');

         /*validando  que  no hayan datos  duplicados*/
        $data = Usuarios::where('cedula', '=', $cedula)->orWhere('correo', '=', $correo)->get();
        if (count($data) != 0) {
            $respuesta = "este correo o cedula ya estan registrados ";
        } else {



            $usuarios = new Usuarios;

            $usuarios->nombres = $nombres;
            $usuarios->apellidos = $apellidos;
            $usuarios->cedula = $cedula;
            $usuarios->correo = $correo;
            $usuarios->telefono = $telefono;
            if ($usuarios->save()) {

                $respuesta = "operacion  exitosa";
            }
        }
        return $respuesta;
    }

    public function updateUsers(Request $request) {
        $id = $request->input('id');
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');

        $Usuarios = Usuarios::find($id);
        $Usuarios->nombres = $nombres;
        $Usuarios->apellidos = $apellidos;
        $Usuarios->cedula = $cedula;
        $Usuarios->correo = $correo;
        $Usuarios->telefono = $telefono;
        if ($Usuarios->save()) {

            $respuesta = "operacion  exitosa";
        }
        return $respuesta;
    }

    public function deleteUsers(Request $request) {
      
      $id= $request->input('id');
      $usuarios = Usuarios::findOrFail($id);
      
      if($usuarios->delete()){
        $respuesta = "operacion  exitosa";
      }
       return $respuesta;
    }

    public function showeditUsers(Request $request) {
        $id = $request->input('id');
        $Usuarios = Usuarios::find($id);
        return view('edituser', compact('Usuarios'));
    }

}
