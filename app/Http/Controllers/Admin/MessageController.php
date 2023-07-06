<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment, Request $request, User $user)
    {
        $user = Auth::user();

        $apartment_id = $request->input('apartment_id');

        $messages = Message::whereHas('apartment', function ($query) use ($user) {
            $query->where('user_id', '=', $user->id);
        })->orderBy('created_at', 'desc');

        if ($apartment_id) {
            $messages = $messages->where('apartment_id', '=', $apartment_id);
        }

        $messages = $messages->paginate(10);

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment, Message $message)
    {
        $user = Auth::user();
        // gestire notifiche dei messaggi non visualizzati
        if (!$message->state_message) {
            $message['state_message'] = true;
            $message->save();
        }
        
        $myApartments = [];
        $apartments = Apartment::where('user_id', $user->id)->get()->toArray();
        foreach ($apartments as $apartment) {
            $myApartments[] = $apartment['id'];
        }


        if (in_array($message->apartment_id, $myApartments)) {
            return view('admin.messages.show', compact('message'));
        } else {
            abort(403, 'you are not authorized');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
