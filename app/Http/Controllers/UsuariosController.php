<?php

namespace App\Http\Controllers;

use App\Usuario;
use Exception;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        try {
            Usuario::create($request->all());
            $response["success"] = true;
            $response["message"] = "Usuário criado com successo";

        } catch (Exception $e) {
            $response["success"] = false;
            $response["message"] = "Ocorreu um erro, tente novamente";
            $response["error"] = $e->getMessage();
        }
            echo json_encode($response);
            return;
    }

    public function destroy(Request $request)
    {
        try {
        Usuario::destroy($request->id);
        $response["success"] = true;
        $response["message"] = "Usuário excluido com successo";

        } catch (Exception $e) {
            $response["success"] = false;
            $response["message"] = "Ocorreu um erro, tente novamente";
            $response["error"] = $e->getMessage();
        }

        echo json_encode($response);
        return;
    }

    public function show(Request $request)
    {
        $usuario = Usuario::findOrFail($request->id);
        return view('usuarios.show', compact('usuario'));
    }

    public function update(Request $request)
    {
        try {
            $usuario = Usuario::findOrFail($request->id);
            $usuario->fill($request->all())->save();

            $response["success"] = true;
            $response["message"] = "Usuário editado com successo";

        } catch (Exception $e) {
            $response["success"] = false;
            $response["message"] = "Ocorreu um erro, tente novamente";
            $response["error"] = $e->getMessage();
        }

        echo json_encode($response);
        return;
    }
}
