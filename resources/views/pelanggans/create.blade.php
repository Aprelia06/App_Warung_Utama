@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Buat Pelanggan Baru</h1>
<form action="{{ route('pelanggans.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="no_telp">No Telp</label>
        <input type="number" name="no_telp" id="no_telp" class="form-control"></input type>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection