<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AuthController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(): \Illuminate\Contracts\View\View
    {
        return View::make('backend.auth.login');
    }

    public function save(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->request->all();
        $credentials = ['email' => $data['username'], 'password' => $data['password']];
        $result = array('status' => 0, "message" => "Giriş başarısız, lütfen tekrar deneyin.");
        if (Auth::attempt($credentials)) {
            $result = array('status' => 1, "message" => "Giriş başarılı, yönlendiriliyorsunuz.", "redirect" => "/admin");
        }

        return response()->json($result);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        return redirect('/admin')->with('info', 'Session closed');
    }
}
