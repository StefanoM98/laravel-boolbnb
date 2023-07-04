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

        // PRELEVO LE COORDINATE GEOGRAFICHE DALL'INDIRIZZO UTILIZZANDO LA LIBRERIA DI TOMTOM
        $tomtomApi = "q6xk75W68NwnmO3Kj5A9ZdBIBFmcbPBJ";
        $address = $data['address'] . ', ' . $data['city'] . ', ' . $data['state'];

        $url = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key=" . $tomtomApi;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        $coord = json_decode($response, true);

        // Estraggo le coordinate geografiche dal risultato
        $latitude = $coord['results'][0]['position']['lat'];
        $longitude = $coord['results'][0]['position']['lon'];

        curl_close($ch);
        $data['latitude'] = $latitude;
        $data['longitude'] = $longitude;

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
        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();
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
        if ($apartment->user_id !== auth()->user()->id) {
            return redirect()->route('admin.apartments.index')
                ->with('message', 'Non sei autorizzato a modificare questo appartamento.');
        }
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

        // PRELEVO LE COORDINATE GEOGRAFICHE DALL'INDIRIZZO UTILIZZANDO LA LIBRERIA DI TOMTOM
        $tomtomApi = "q6xk75W68NwnmO3Kj5A9ZdBIBFmcbPBJ";
        $address = $data['address'] . ', ' . $data['city'] . ', ' . $data['state'];

        $url = "https://api.tomtom.com/search/2/geocode/" . urlencode($address) . ".json?key=" . $tomtomApi;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        $coord = json_decode($response, true);

        // Estraggo le coordinate geografiche dal risultato
        $latitude = $coord['results'][0]['position']['lat'];
        $longitude = $coord['results'][0]['position']['lon'];

        curl_close($ch);
        $data['latitude'] = $latitude;
        $data['longitude'] = $longitude;

        $apartment->update($data);
        return redirect()->route('admin.apartments.show', compact('apartment', 'services'))->with('message', "L'appartamento" . $apartment->name . "è stato modificato con successo");
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
