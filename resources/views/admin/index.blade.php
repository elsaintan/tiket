@extends('layouts.app')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pemesanan Tiket</h1>
    </div>
    <div class="table-responsive col-lg-10">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No KTP</th>
                    <th scope="col">Kode Booking</th>
                    <th scope="col">Tiket</th>
                    <th scope="col">Email</th>
                    <th scope="col">Kewarganegaraan</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->id_number }}</td>
                        <td>{{ $ticket->booking_code }}</td>
                        <td>{{ $ticket->booking_code }}</td>
                        <td>{{ $ticket->email }}</td>
                        <td>{{ $ticket->kewarganegaraan }}</td>
                        <td>{{ $ticket->ttl }}</td>
                        <td>{{ $ticket->no_hp }}</td>
                        <td>{{ $ticket->is_checked }}</td>
                        <td>
                            <a href="/dashboard/tickets/{{ $ticket->slug }}" class="badge bg-info"><span
                                    data-feather="eye"></span></a>
                            <a href="/dashboard/tickets/{{ $ticket->slug }}/edit" class="badge bg-warning"><span
                                    data-feather="edit"></span></a>
                            <form action="/dashboard/tickets/{{ $ticket->slug }}" method="ticket" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
