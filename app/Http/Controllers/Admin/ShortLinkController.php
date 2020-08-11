<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use App\ShortLink;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortlink=ShortLink::where('user_id',Auth::user()->id)->latest()->paginate(5);
        return view ('admin.kelola_short_link.index', ['shortlink' => $shortlink]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute Harus Diisi',
            'unique' => 'URL Sudah Dilakukan "Short/Dipersingkat" Sebelumnya',
            'min' => ':attribute Harus Diisi Minimal :min Karakter'
        ];
        $this->validate($request, [
            'short_link',
            'user_id',
            'original_link'=> ['required', 'unique:short_links', 'min:3']
        ], $messages);

        $shortlink = new ShortLink();
        $shortlink->original_link = $request->original_link;
        $shortlink->user_id = Auth::id();
        $shortlink->short_link = Str::random(3);
        $shortlink->save();
        Toastr::success('Short URL : "'.  $shortlink->short_link .'" Berhasil Dibuat', 'URL', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }

    public function shortenLink($short_link)
    {
        $find = ShortLink::where('short_link', $short_link)->first();
        return redirect($find->original_link);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shortlink = ShortLink::find($id);
        return view ('admin.kelola_short_link.edit', compact('shortlink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => ':attribute Harus Diisi',
            // 'min' => ':attribute Harus Diisi Minimal :min Karakter',
            'unique' => 'URL Sudah Dilakukan "Short/Dipersingkat" Sebelumnya',
            'max' => ':attribute Harus Diisi Maksimal :max Karakter'
        ];
        $this->validate($request, [
            'original_link',
            'user_id',
            'short_link'=> ['required', 'unique:short_links', 'max:20']
        ], $messages);

        $shortlink = ShortLink::find($id);
        $shortlink->original_link = $request->original_link;
        $shortlink->user_id = Auth::id();
        $shortlink->short_link = $request->short_link;
        $shortlink->save();
        Toastr::success('Data URL Berhasil Edit', 'URL', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('admin.kelola_link.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shortlink = ShortLink::find($id);
        $shortlink->delete();
        Toastr::success('Data URL Berhasil Dihapus', 'URL', ["positionClass" => "toast-bottom-right"]);
        return redirect()->back();
    }
}
