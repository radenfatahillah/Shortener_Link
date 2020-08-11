<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ShortLink;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $member = User::where('role_id', '2')->get();
        $url_public = ShortLink::where('user_id', '3')->get();
        $url_member = ShortLink::where('user_id', '2')->get();
        $url_admin=ShortLink::where('user_id', Auth::id())->get();

        $shortLinks =  Auth::user()->shortlink()->latest()->paginate(1);
        return view('admin.dashboard',compact('member','url_public','url_member','url_admin','shortLinks'));
    }


}
