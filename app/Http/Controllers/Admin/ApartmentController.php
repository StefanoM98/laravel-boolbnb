<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartments = Apartment::all();
        return view('admin.apartments.index' , compact('apartments'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::all();
        return view('apartments.create' , compact('apartments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $apartment = Apartment::create($data);

        if ($request->has('apartments')) {
            $apartment->apartments()->attach($data['apartments']);
            
        }
        return redirect()->route('apartments.index')->with('message',"$apartment->title Il tuo immobile è stato caricato con successo ") ;
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::findOrFail($id);
        return view('apartments.show' , compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartments = Apartment::all();
        $apartment = Apartment::findOrFail($id);
        return view('apartments.edit' , compact('apartments'));
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
        $data = $request->all();
        $apartment = Apartment::findOrFail($id);

        if ($request->has('apartments')) {
            $apartment->apartments()->sync($data['apartments']);
        }else{
            $apartment->apartments()->detach();
        }
        $apartment->update($data);
        return redirect()->route('apartments.show' , compact('apartment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $apartment = Apartment::findOrFail($id);
      $apartment->apartment()->detach();
      $apartment->delete();
      return redirect()->route('apartment.index');
    }
}
