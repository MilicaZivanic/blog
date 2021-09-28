<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        return view('pages.users.my-profile')->with('user', User::with('posts')->with('comments')->with('role')->where('id', session()->get('user')->id)->first());
    }

    public function update_profile(Request $request){
        $request->validate([
            'name' => 'required',
        ]);
        $id = session()->get('user')->id;
        $password = Hash::make($request->password);
        try
        {
            User::where('id', $id)->update([
                'name' => $request->input('name')
            ]);
            if($request->has('password')){
                User::where('id', $id)->update([
                    'password' => $password
                ]);
            }
            DB::commit();

            return redirect()->route('my-profile')->with('success', 'Profile edited successfully!');
        }
        catch(Exception $e)
        {
            DB::rollBack();
            return redirect()->route('my-profile')->with('errorMessage', 'An error occurred!');
        }
    }
}
