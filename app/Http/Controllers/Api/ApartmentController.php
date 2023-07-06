<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ApartmentController extends Controller
{
    public function index()
    {
        $sponsored_apartment_id = Apartment::whereHas('sponsors', function ($query) {
            $query->where('end_date', '>=', Date('Y-m-d H:m:s'));
        })->pluck('id');

        $array_id = [];
        foreach ($sponsored_apartment_id as $value) {
            $array_id[] = $value;
        }

        $apartments = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
            ->select('apartments.*')
            ->with(['sponsors' => function ($query) {
                $query->where('end_date', '>=', Date('Y-m-d H:m:s'))
                    ->orderBy('end_date', 'asc');
            }])
            ->with('services')
            ->where('visibility', '1')
            ->orderByRaw('CASE WHEN apartment_sponsor.end_date >= ? THEN 0 ELSE 1 END, apartment_sponsor.end_date ASC', [Date('Y-m-d H:m:s')])
            ->orderBy('updated_at', 'DESC')
            ->paginate(40);

        // if (request()->input('address')) {
        //     $address = request()->input('address');

        //     $apartments = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')->select('apartments.*')->with(['sponsors' => function ($query) {
        //         $query->where('end_date', '>=', Date('Y-m-d H:m:s'));
        //     }])->with('services')->where('address', 'like', '%' . $address . '%')->where('visibility', '1')->orderBy('update_at', 'DESC');
        // } else {
        //     $apartments = Apartment::leftJoin('apartment_sponsor', 'apartment_id', '=', 'apartment_sponsor.apartment_id')->select('apartments.*')->with(['sponsors' => function ($query) {
        //         $query->where('end_date', '>=', Date('Y-m-d H:m:s'));
        //     }])->with('services')->where('visibility', '1')->orderBy('update_at', 'DESC');
        // }

        // $apartments = Apartment::all();

        foreach ($apartments as $apartment) {
            $apartment->image = $apartment->getImageUri();
            if (in_array($apartment['id'], $array_id)) {
                $apartment['sponsored'] = true;
            } else {
                $apartment['sponsored'] = false;
            }
        }

        return response()->json([
            'success' => true,
            'results' => $apartments
        ]);

        // dd(response()->json([
        //     'success' => true,
        //     'result' => $apartment
        // ]));
    }

    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->with('services')->first();

        $apartment->image = $apartment->getImageUri();

        if (!$apartment) {
            return response(null, 404);
        }

        return response()->json([
            'success' => true,
            'result' => $apartment
        ]);
    }

    public function apartmentSponsor()
    {
        $apartments = Apartment::whereHas('sponsors', function ($query) {
            $query->where('end_date', '>=', Date('Y-m-d H:m:s'));
        })->paginate(20);

        foreach ($apartments as $apartment) {
        }
    }
}
