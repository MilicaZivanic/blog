<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('pages.auth.register');
    }

    public function store(RegisterRequest $request){
        DB::beginTransaction();
        try
        {
            $password = Hash::make($request->password);
            $product = User::create($request->except('password') + ["password" => $password ]);
            DB::commit();

            return redirect()->route('register.index')->with('success', 'The user has been created. You can log in now.');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('register.index')->with('errorMessage', 'An error occurred!');
        }
    }
}
