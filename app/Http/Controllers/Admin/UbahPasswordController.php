<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Kata sandi berhasil diubah','Success');
                Auth::logout();
                return redirect()->back();
            } else {
                Toastr::error('Kata sandi baru tidak boleh sama dengan kata sandi lama!!', 'ERROR', ["positionClass" => "toast-bottom-right"]);
                return redirect()->back();
            }
        } else {
            Toastr::error('Kata sandi lama tidak cocok!', 'ERROR', ["positionClass" => "toast-bottom-right"]);
            return redirect()->back();
        }

    }

}
