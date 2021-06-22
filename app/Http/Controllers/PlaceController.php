<?php

namespace App\Http\Controllers;
use App\Models\Places;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Places::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      /*  return Places::create([
            'name' => request('name'),
            'imageProfile'=> request('imageProfile'),
            'description'=> request('description'),
            'local'=> request('local'),
            'specialite'=> request('specialite'),
            'nbPlace'=> request('nbPlace'),
            'ouvert'=> request('ouvert'),
            'email'=> request('email'),
            'password'=> request('password'),
    ]
            
    );*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'local' => 'required',
            'specialite' => 'required',
            'nbPlace' => 'required',
            'ouvert' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
       return Places::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Places::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $place=Places::find($id);
        $place->update($request->all());
        return $place;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Places::destroy($id);
    }

    /**
     * Search for a name.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function searchByName($name)
    {
        return Places::where('name','like','%'.$name.'%')->get();
    }
}
