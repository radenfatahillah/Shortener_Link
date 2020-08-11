<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShortLink;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $shortlink=ShortLink::where('user_id',Auth::user()->id)->paginate(3);
        return view('member.dashboard',compact('shortlink'));
    }
}
