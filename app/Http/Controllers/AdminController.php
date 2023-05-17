<?php

namespace App\Http\Controllers;

use App\Models\Booked_tickets;
use App\Models\Tickets;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index', [
            'tickets' => Booked_tickets::all()
        ]);
    }

    public function laporan()
    {
        return view('laporan', [
            'tickets' => Booked_tickets::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Booked_tickets $b)
    {
        return view('edit',[
            'booked_tiket' => $b,
            'tickets' => Tickets::all()
        ]);
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
    public function destroy(Booked_tickets $b)
    {
        try{
            $b->delete();
        }catch(ModelNotFoundException $e){
            dd($e);
        }

        $post      = Tickets::find($b->tid);
        $post->qty = $post->qty + 1;
        $post->save();

        return redirect('/dashboard/tickets/')->with('success', 'Data has been deleted!');
    }

    public function getDetails(Request $request)
    {
        //dd($request);
        $data = Booked_tickets::where('booking_code', '10820')->firstOrFail();
        $update = Booked_tickets::where('booking_code', '10820')->firstOrFail();
        $update->is_checked = 1;
        $update->save();
        return view('checkIn',[
            'ticket' => $data
        ]);
    }
}
