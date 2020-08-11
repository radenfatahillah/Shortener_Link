<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShortLink;

class ShortenerLinkMemberController extends Controller
{
    public function index()
    {
        $shortlink=ShortLink::where('user_id','!=', 1)->get();
        return view ('admin.shortenerlinkmember.index',['shortlink'=>$shortlink]);
    }

    public function destroy($id)
    {
        $shortlink = ShortLink::find($id);
        $shortlink->delete();
        return redirect()->route('admin.shortenerlinkindexmember');
    }
}
