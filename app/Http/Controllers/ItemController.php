<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
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
        //$items = Item::find(1);
        //dd($items->user->name);

        //return $items;
        return ItemResource::collection(Item::all());
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
            'measurement_id' => 'required',
            'price' => 'required',
        ]);

        $item = Item::create([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'description' => $request->description,
            'measurement_id' => $request->measurement_id,
            'price' => $request->price,
            'user_id' => Auth()->user()->id,
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
            'measurement_id' => $request->measurement_id,
            'price' => $request->price,
            'user_id' => Auth()->user()->id,
        ]);
        return "data berhasil ditambah";
        //return $item;
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
