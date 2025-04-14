@extends('layouts.template')

@section('content')
<div class="container mt-5">
<h1>Ubah Pelanggan</h1>
<form action="{{ route('pelanggans.update', $pelanggans->pelanggan_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="{{ $pelanggans->nama }}" required>
    </div>

    <div class="form-group">
        <label for="no_telp">No Telp</label>
        <input type="number" name="no_telp" id="no_telp" class="form-control" value="{{ $pelanggans->no_telp}}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection