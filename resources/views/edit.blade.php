@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit</h1>
    </div>
    <div class="col-md-12">
        <form method="POST" action="/dashboard/all-post/" class="mb-5">
            @method('put')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $booked_tiket->nama }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label>No KTP / ID Number</label>
                <input type="text" name="id_number" class="form-control" placeholder="ID Number">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tgl Lahir</label>
                    <input type="date" name="ttl" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label>Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">No HP</label>
                    <input type="text" name="no_hp" class="form-control" id="inputZip">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Ticket ticket</label>
                    <select id="tiket" class="form-control" name="tiket">
                        @foreach ($tickets as $ticket)
                            <option value="{{ $ticket->id }}">{{ $ticket->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Price</label>
                    <input type="text" class="form-control" id="price" name="price" readonly>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </form>
    </div>
@endsection
