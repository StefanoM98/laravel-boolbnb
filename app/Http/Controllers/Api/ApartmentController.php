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

        // if (request()->input('address')) {





        // $apartments = Apartment::all()
        //     ->with(['sponsors' => function ($query) {
        //         $query->where('expiring_date', '>=', Date('Y-m-d H:m:s'))->orderBy('expiring_date', 'asc');
        //     }])
        //     ->with('services')
        //     ->where('city', 'like', '%' . $address . '%')
        //     ->where("visibility", "1")
        //     // CASE WHEN - THEN - ELSE - END
        //     // ->orderByRaw('CASE WHEN apartment_sponsor.expiring_date >= ? THEN 0 ELSE 1 END, apartment_sponsor.expiring_date ASC', [Date('Y-m-d H:m:s')])
        //     ->orderBy('updated_at', 'DESC')
        //     // PAGINAZIONE DA REINSERIRE DOPO AVER RISOLTO BUG FILTRI
        //     ->paginate(50);
        // ->get();
        // }
        // else {

        //     // ---- QUERY SQL ---- //
        //     // SELECT *
        //     // FROM `apartments`
        //     // LEFT JOIN `apartment_sponsor` ON `apartments`.`id` = `apartment_sponsor`.`apartment_id`
        //     // WHERE `apartment_sponsor`.`expiring_date` >= NOW()
        //     // ORDER BY `apartments`.`updated_at` DESC ;
        //     // -------- //

        //     // Query appartamenti
        //     $apartments = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
        //         ->select('apartments.*')
        //         ->with(['sponsors' => function ($query) {
        //             $query->where('expiring_date', '>=', Date('Y-m-d H:m:s'))
        //                 ->orderBy('expiring_date', 'asc');
        //         }])
        //         ->with('services')
        //         ->where("visibility", "1")
        //         // CASE WHEN - THEN - ELSE - END
        //         ->orderByRaw('CASE WHEN apartment_sponsor.expiring_date >= ? THEN 0 ELSE 1 END, apartment_sponsor.expiring_date ASC', [Date('Y-m-d H:m:s')])
        //         ->orderBy('updated_at', 'DESC')
        //         // PAGINAZIONE DA REINSERIRE DOPO AVER RISOLTO BUG FILTRI
        //         ->paginate(50);
        //     // ->get();

        // }

        $address = 'Roma';

        $apartments = Apartment::where('city', 'like', '%' . $address . '%')
            ->orWhere('address', 'like', '%' . $address . '%')
            ->get();


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
            'results' => $apartment
        ]);
    }

    public function sponsoredApartments()
    {
        $apartments = Apartment::whereHas('sponsors', function ($query) {
            $query->where('end_date', '>=', Date('Y-m-d H:m:s'))
                ->orderBy('end_date', 'DESC');
        })->paginate(20);

        foreach ($apartments as $apartment) {
            // Aggiungo chiave sponsored così da poter ordinare per appartamenti sponsorizzati
            $apartment['sponsored'] = true;
        }
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'List of sponsored apartments',
            'results' => $apartments,
        ]);
    }
}
