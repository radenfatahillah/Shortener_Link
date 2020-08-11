<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShortLink;
use Auth;

class ShortLinkController extends Controller
{
    public function short(Request $request){
        $original_link = ShortLink::whereOriginalLink($request->original_link)->first();

        if ($original_link == null) {
            $short_link = $this->generateShortURL();
            if (Auth::guest()) {
                ShortLink::create([
                    'original_link' => $request->original_link,
                    'short_link' => $short_link,
                    'user_id'=> 3
                ]);
            } else {
                ShortLink::create([
                    'original_link' => $request->original_link,
                    'short_link' => $short_link,
                    'user_id'=> Auth::id()
                ]);
            }
            $original_link = ShortLink::whereOriginalLink($request->original_link)->first();
        } 
        return view('short_url', compact('original_link'));
    }

    public function generateShortURL(){
        $result = base_convert(rand(1000, 99999), 10, 36);
        $data = ShortLink::whereOriginalLink($result)->first();

        if ($data != null) {
            $this->generateShortURL();
        }
        return $result;
    }

    public function shortLink($link){
        $original_link = ShortLink::whereShortLink($link)->first();
        return redirect($original_link->original_link);
    }
}
