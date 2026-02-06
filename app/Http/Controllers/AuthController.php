<?php

namespace App\Http\Controllers;

use App\Models\Review;
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
            ],[
            'login.exists'=>'This login does not exist',
            ]);
        $successful= Auth::attempt(['login'=>$r->login,'password'=>$r->pass],$r->rememberMe);
        if ($successful) {
            return redirect('/');
        }
        return redirect('/login')->withErrors(['password.check'=>'Password incorrect']);
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
        return redirect('admin');
        }
        return view('cabinet', $data);
    }
    public function admin() {
        $data['title'] = "Some Shop";
        return view('admin/cabinet', $data);
    }
    public function changePass() {
        $data['title'] = "Some Shop";
        return view ('changePassword', $data);
    }
    public function changePassHandle(Request $r) {
        $validateData = $r->validate(
            [
                'pass' => ['required', 'confirmed','min:3'],
            ],[
            'pass.confirmed'=>'Пароль должны совпадать',
            ]);
        if (Hash::check($r->old_pass, Auth::user()->password)) {
            User::find(Auth::id())->update(['password'=>Hash::make($r->pass)]);
            return redirect('/cabinet')->with('success', ['pass'=>'Password succesfully changed']);
        }
            return back()->withErrors(['password.check'=>'Old password incorrect']);
    }

    public function saved(){
        $data['title'] = 'some shop';
        $data['saved'] = Auth::user()->products;
        return view('saved', $data);
    }
}
