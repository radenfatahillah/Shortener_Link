<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profil.index');
    }

    public function update(Request $request, $id) 
    {
        $user = User::findOrFail($id);
        $user->nama = $request->get('nama');
        $user->email = $request->get('email');
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('assets/images', $filename);
            $user->image = $filename;
        } 
        $user->updated_at = now();
        $user->save();
        return redirect()->back();
    }
}
