<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class KelolaMemberController extends Controller
{
    public function index()
    {
        $user=User::where('role_id','2')->get();
        return view ('admin.kelola_member.index',['user'=>$user]);
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.kelolamemberindex');
    }

}
