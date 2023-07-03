<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApartmentRequest;
use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();
        return view('admin.apartments.index', compact('apartments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $apartments = Apartment::all();
        $services = Service::all();
        return view('admin.apartments.create', compact('apartments', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request, Apartment $apartment, Service $services)
    {
        $data = $request->all();
        $user = Auth::user();
        $data['user_id'] = $user->id;
        $data['slug'] = Str::slug($data['name'], '_');

        
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('image', $request->image);
            
            $data['image'] = $path;
        }
        
        $apartment = Apartment::create($data);
        
        if ($request->has('services')) {
            $apartment->services()->attach($request->services);
        }
        return redirect()->route('admin.apartments.index')->with('message', "$apartment->name Il tuo immobile è stato caricato con successo ");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        return view('admin.apartments.edit', compact('apartment', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment, Service $services)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['name'], '_');
        $apartment->services()->sync($request->services);

        if ($request->hasFile('image')) {
            if ($apartment->image) {
                Storage::delete($apartment->image);
            }
            $path = Storage::disk('public')->put('image', $request->image);

            $data['image'] = $path;
        }
        $apartment->update($data);
        return redirect()->route('admin.apartments.show', compact('apartment', 'services'))->with('message', "L'appartamento".$apartment->name."è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        $apartment->services()->detach();

        if ($apartment->image) {
            Storage::delete($apartment->image);
        }

        $apartment->delete();
        
        return redirect()->route('admin.apartments.index');
    }
}
