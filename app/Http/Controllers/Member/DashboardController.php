<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $shortlink=User::where('role_id', '2')->paginate(3);
        return view('member.dashboard',compact('shortlink'));
    }
}
