<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;



class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(10);
        return view("usuarios.index", compact("usuarios"));
    }

    public function create()
    {
        return view("usuarios.form");
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Generar una contraseña aleatoria
        $plainPassword = Str::random(12);

        // Crear al usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($plainPassword),
        ]);

        // Generar y guardar el token después de crear el usuario
        $token = Str::random(60);
        DB::table('password_resets')->updateOrInsert(
            ['email' => $user->email],
            ['token' => Hash::make($token), 'created_at' => now()]
        );

        // Generar el enlace con el token real
        $resetLink = route('usuarios.password.reset', ['email' => $user->email, 'token' => $token]);

        // Enviar el correo
        Mail::to($user->email)->send(new ResetPasswordMail($user, $resetLink));

        return redirect()->route("usuarios.index")->with('success', 'Usuario creado y correo enviado con el enlace para restablecer su contraseña.');
    }

    public function showResetForm(Request $request)
    {
        $email = $request->query('email');
        $token = $request->query('token');

        // Verificar si el email y el token están presentes
        if (!$email || !$token) {
            return redirect()->route('login')->with('error', 'Enlace inválido o expirado.');
        }

        // Verificar si el token es válido en la base de datos
        $record = DB::table('password_resets')->where('email', $email)->first();

        if (!$record || !Hash::check($token, $record->token)) {
            return redirect()->route('login')->with('error', 'Enlace inválido o expirado.');
        }

        return view('auth.passwords.reset', compact('email', 'token'));
    }
}
