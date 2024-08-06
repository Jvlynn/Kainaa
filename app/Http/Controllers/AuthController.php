<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ],
            [
                'required' => ':attribute wajib diisi',
            ]
        );
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }
        if (Auth::attempt($validate->validated())) {
            return redirect('/home');
        }
        throw ValidationException::withMessages([
            'password' => 'email atau password salah'
        ]);
    }

    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'email' => 'required|email|unique:users',
                'name' => 'required|unique:users|min:3|max:16',
                'password' => 'required|min:8',
                'passwordc' => 'required|same:password'

            ],
            [
                'required'=> ':attribute wajib diisi',
                'passwordc.required' => 'konfirmasi password wajib diisi',
                'min' => ':attribute minimal :min karakter',
                'max' => ':attribute maksimal :max',
                'same' => 'konfirmasi password harus sama'
            ]
        );
        if ($validate->fails()) {
            return back()->withInput()->withErrors($validate);
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        return redirect('/login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
