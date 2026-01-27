<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        $data['title'] = "Some Shop";
        return view ('login', $data);
    }
    public function loginHandle(Request $r) {
        $validateData = $r->validate(
            [
                'login' => ['required', 'exists:users', 'max:15'],
                'pass' => ['required', 'confirmed','min:3'],
            ],[
            'pass.confirmed'=>'Пароль должны совпадать',
            ]);
        if (Auth::attempt(['login'=>$r->login,'password'=>$r->pass],$r->rememberMe)) {
            return redirect('/');
        }
        return redirect('/login');
    }
    public function logout() {
        Auth::logout();
        return redirect('/');
    }
    public function register() {
        $data['title'] = "Some Shop";
        return view ('register', $data);
    }
    public function registerHandle(Request $r) {
        $data['title'] = "Some Shop";
        $validateData = $r->validate(
            [
                'login' => ['required', 'unique:users', 'max:15'],
                'email' => ['required'],
                'pass' => ['required', 'confirmed','min:3'],
            ],[
            'pass.confirmed'=>'Пароль должны совпадать',
            ]);
        $u = User::create(["login"=>$r->login, 'email'=>$r->email,"password"=>Hash::make($r->pass)]);
        Auth::login($u);
        return redirect('/');
    }
    public function cabinet() {
        $data['title'] = "Some Shop";
        if (Auth::user()->admin) {
        return view('cabinet_admin', $data);
        }
        return view('cabinet', $data);
    }
}
