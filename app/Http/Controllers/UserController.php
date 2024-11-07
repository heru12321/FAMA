<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        $arr['user'] = User::first();
        return view('profile', $arr);
    }

    public function edit(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
        ],
        [
            'nama.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong',
        ]);
        $user = User::where('id', $request->user_id)->first();

        if($request->password){
            //Handle jika konfirm password tidak sama
            if($request->password !== $request->password_confirm){
                return redirect()->back()->with('error', 'Terjadi Kesalahan!');
            }

            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->with('error', 'Terjadi Kesalahan!');
            }
        }

        return redirect()->back()->with('success', 'User Berhasil diupdate!');
    }
}
