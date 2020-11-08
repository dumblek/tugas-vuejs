<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;

class ProfilController extends Controller
{
    public function store(Request $request)
    {
        request()->validate([
            'fullname' => 'required',
            'address' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'phone_number' => 'required',
        ]);

        $item = Profil::create([
            'fullname' => $request->fullname,
            'address' => $request->address,
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'phone_number' => $request->phone_number,
            'photo' => $request->photo,
            'user_id' => Auth()->user()->id,
        ]);

        return $item;
    }

    public function show($id)
    {
        $profil = Profil::where('user_id',$id)->get();
        
        return $profil;
    }
}
