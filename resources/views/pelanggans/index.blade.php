@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Daftar Pelanggan</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pelanggans.create') }}" class="btn btn-primary mb-3">Buat Pelanggan Baru</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->pelanggan_id }}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->no_telp }}</td>
                    <td>
                        <a href="{{ route('pelanggans.edit', $pelanggan->pelanggan_id) }}" class="btn btn-info btn-sm">Edit</a>
                        <form action="{{ route('pelanggans.destroy', $pelanggan->pelanggan_id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
