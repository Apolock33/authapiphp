<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:3',
            'nivel' => 'required|string'
        ]);

        $usuario = Usuario::create([
            'nome' => $request->nome, // corrigido
            'email' => $request->email,
            'senha' => Hash::make($request->senha), // hash da senha
            'nivel' => $request->nivel,
        ]);

        return response()->json([
            'success' => [
                'message' => 'Usuário registrado com sucesso',
                'usuario' => $usuario
            ]
        ], 201);
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $token = $usuario->createToken('api_token')->accessToken;

        return response()->json([
            'token' => $token,
            'usuario' => $usuario
        ]);
    }

    public function me(Request $request)
    {
        $usuario = $request->user();
        return response()->json([
            'success' => [
                'mensage' => 'Dados do usuário autenticado',
                'usuario' => $usuario
            ]
        ]);
    }

    public function testeAuthNivel(Request $request)
    {
        return response()->json([
            'success' => [
                'mensage' => 'Acesso autorizado para o nível requerido',
                'usuario' => $request->user()
            ]
        ]);
    }
}
