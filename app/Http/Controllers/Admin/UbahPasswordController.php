<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class UbahPasswordController extends Controller
{
    public function index()
    {
        return view('admin.ubahpassword.index');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
        'old_password' => 'required',
        // 'password' => 'required|confirmed',
        'password' => 'required', 'confirmed',
    ]);
    
    $v = Auth::user()->password;
        if (Hash::check($request->old_password, $v))
            {
                if (!Hash::check($request->password, $v))
                    {
                        $user = User::find(Auth::id());
                        $user->password = Hash::make($request->password);
                        $user->save();
                        return redirect()->back()->with('success','berhalil Dilakukan Perubahan Password');
                    } else {
                        return redirect()->back()->with('warning','Password baru tidak boleh sama dengan Password lama');
                    }
            }else {
                    return redirect()->back()->with('error','kofirmasi password salah');
                }
            }
}
