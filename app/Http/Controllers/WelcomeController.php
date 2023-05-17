<?php

namespace App\Http\Controllers;

use App\Models\Booked_tickets;
use App\Models\Guests;
use App\Models\Tickets;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Validator;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'tickets' => Tickets::all()
        ]);
    }

    public function getDetails($id)
    {
        $data = Tickets::where('id',$id)->first();
        return response()->json($data);
    }

    public function store(Request $request)
    {

        $tid = substr(md5(microtime()),rand(0,26),5);

        try{
            Booked_tickets::create([
                'tid' => $request->tiket,
                'booking_code' => $tid,
                'name' => $request->name,
                'email' => $request->email,
                'id_number' => $request->id_number,
                'ttl' => $request->ttl,
                'kewarganegaraan' => $request->kewarganegaraan,
                'no_hp' => $request->no_hp
            ]);
        }catch(ModelNotFoundException $e){
            dd($e);
        }

        $post      = Tickets::find($request->tiket);
        $post->qty = $post->qty - 1;
        $post->save();

        return view('welcome',[
            'data' => $tid,
            'tickets' => Tickets::all()
        ]);

    }

}
