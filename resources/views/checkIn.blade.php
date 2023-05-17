@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Check In</h1>
    </div>
    <form method="POST" action="/dashboard/get/details" class="mb-5">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control kode" id="kode" name="kode" placeholder="Kode Booking">
        </div></br>
        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
    </form>


    <div class="tablePrint">
        <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data</h1>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Kode Booking</th>
                    <th scope="col">Tiket</th>
                    <th scope="col">Email</th>
                    <th scope="col">Kewarganegaraan</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Status</th>
                </tr>

                @if (isset($ticket))
            <tbody>
                <tr>
                    <td>{{ $ticket->name }}</td>
                    <td>{{ $ticket->id_number }}</td>
                    <td>{{ $ticket->booking_code }}</td>
                    <td>{{ $ticket->booking_code }}</td>
                    <td>{{ $ticket->email }}</td>
                    <td>{{ $ticket->kewarganegaraan }}</td>
                    <td>{{ $ticket->no_hp }}</td>
                    <td>{{ $ticket->is_checked }}</td>
                </tr>
            </tbody>
        @else
            @endif


            </thead>

        </table>
    </div>
@endsection
