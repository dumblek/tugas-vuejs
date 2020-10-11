<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return $items;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama' => 'required',
            'stok' => 'required',
            'description' => 'required',
        ]);
        
        $item = Item::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'description' => $request->description,
        ]);

        return $item;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function plus(Request $request, $id)
    {
        $item = Item::find($id);
        $item->update(['stok' => $item->stok+1]);
        return $item;
    }

    public function minus(Request $request, $id)
    {
        $item = Item::find($id);
        $item->update(['stok' => $item->stok-1]);
        return $item;
    }

    public function update(Request $request, $id)
    {
        
        $item = Item::find($id);
        $item->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'description' => $request->description,
        ]);

        return $item;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);

        return "delete succes";
    }
}
