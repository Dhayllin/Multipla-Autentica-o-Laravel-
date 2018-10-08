<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;


class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');        
    }
    
    public function index(){
        return view('admins.index');
    }
    public function login(){
        return view('auth.login_admin');
    }

    public function postLogin(Request $request){
        
        
        $validator = Validator::make($request->all(), [
            'email'=>'required|email|min:10|max:150',
            'password'=>'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/login')
                        ->withErrors($validator)
                        ->withInput();
        }      

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('admin');
        }else{
            return redirect('admin/login')
                ->withErrors(['errors'=>'Erro ao fazer login.'])
                ->withInput();
        }
      
      
    }
}
