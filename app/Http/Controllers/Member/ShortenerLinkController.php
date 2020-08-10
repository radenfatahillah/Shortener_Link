<?php

namespace App\Http\Controllers\Member;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ShortLink;

class ShortenerLinkController extends Controller
{
    public function index()
    {
        $shortlink=ShortLink::where('user_id',Auth::user()->id)->get();
        return view ('member.shortenerlink.index',['shortlink'=>$shortlink]);
    }

    public function destroy($id)
    {
        $shortlink = ShortLink::find($id);
        $shortlink->delete();
        return redirect()->route('member.shortenerlinkindex');
    }
}
