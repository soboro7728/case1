<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('register');
    }
    public function confirm(RegisterRequest $request){
        $contact = $request->only(['name', 'email', 'password']);
        return view('confirm', compact('contact'));
    }
    public function completion(Request $request){
        $completion = $request->only(['name', 'email', 'password']);
        User::create($completion);
        return view('completion');
    }

}

