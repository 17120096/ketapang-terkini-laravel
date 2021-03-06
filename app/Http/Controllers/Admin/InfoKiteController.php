<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InfoKiteRequest;
use App\InfoKite;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InfoKiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = InfoKite::all();

        return \view('pages.admin.home.info-kite', [
            'items' => $items
        ]);
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
    public function store(InfoKiteRequest $request)
    {
        //
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
        $item = InfoKite::findOrFail($id);
        return \view('pages.admin.home.crud.edit-info', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InfoKiteRequest $request, $id)
    {
        $data = $request->all();
        $item = InfoKite::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $filename = $request->gambar->getClientOriginalName();
            $data['gambar'] = $request->gambar->storeAs('assets/info-kite', $filename, 'public');
        } else {
            $data['gambar'] = $item->gambar;
        }
        $item->update($data);
        return redirect('admin/info-kite')->with('toast_success', 'Info Berhasil Diubahtoast_!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
