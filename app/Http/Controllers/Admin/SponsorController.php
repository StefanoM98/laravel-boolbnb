<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $apartment_id = $request->query('apartment_id');

        $sponsors = Sponsor::all();

        return view('admin.sponsors.index', compact('sponsors', 'apartment_id'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsor $sponsor, Request $request)
    {
        $apartment_id = $request->query('apartment_id');

        $user = Auth::user();

        $today = Carbon::today();

        // Se non mi arriva l'ID dell'appartamento e devo quindi visualizzare tutti gli appartamenti da sponsorizzare
        if ($apartment_id == null) {

            // Recupero solo gli appartamenti NON sponsorizzati
            $apartments = Apartment::where('user_id', $user->id)
                ->whereDoesntHave('sponsors', function ($query)  use ($today) {
                    $query->where('end_date', '>', $today)
                        ->orWhereNull('end_date');
                })->get();
            return view('admin.sponsors.show', compact('apartments', 'sponsor'));
        } else {

            $apartment = Apartment::findOrFail($apartment_id);

            $sponsor = Sponsor::findOrFail($sponsor->id);

            // Controllo apartment_id nell'url
            if ($user->id === $apartment->user_id) {
                return view('admin.sponsors.show', compact('apartment', 'sponsor'));
            }
            abort(403, "accesso non autorizzato");
        }
    }

}
