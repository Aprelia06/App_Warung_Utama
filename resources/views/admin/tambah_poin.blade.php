@extends('layouts.template')

@section('content')

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Cari User...",
            allowClear: true
        });
    });
</script>
@endsection



<div class="container mt-5">
    <h2>Tambah Saldo</h2>

    {{-- Alert sukses --}}
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Alert error --}}
    @if($errors->any())
        <div class="alert alert-danger" id="error-alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah Poin --}}
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('admin.tambahPoin') }}" method="POST" class="row align-items-end g-3">
                @csrf

                <div class="col-md-5">
                <label for="userID" class="form-label">Pilih User</label>
                <select name="userID" class="form-select select2" required>
                    <option value="" disabled selected>-- Pilih User --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->userID }}">{{ $user->name }} (Poin: {{ $user->point }})</option>
                    @endforeach
                </select>
            </div>
                
                {{-- <div class="col-md-5">
                    <label for="userID" class="form-label">Pilih User</label>
                    <select name="userID" class="form-select" required>
                        <option value="" disabled selected>-- Pilih User --</option>
                        @foreach($users as $user)
                            <option value="{{ $user->userID }}">{{ $user->name }} (Poin: {{ $user->point }})</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="col-md-4">
                    <label for="point" class="form-label">Jumlah Poin</label>
                    <input type="number" name="point" class="form-control" min="1" required placeholder="Masukkan Poin">
                </div>

                <div class="col-md-3">
                    <label class="form-label">&nbsp;</label>
                    <button type="submit" class="btn btn-primary w-100">Tambah Poin</button>
                </div>
            </form>
        </div>
    </div>

    <hr>

    {{-- List semua user + poin --}}
    <h4>List User & Poin</h4>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Poin</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->point }}</td>
                            <td>
                                {{-- Tombol Reset Poin --}}

                                <form action="{{ route('admin.resetPoin', $user->userID) }}" method="POST" onsubmit="return confirm('Yakin ingin mereset poin pengguna ini?');">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning btn-sm">Reset Poin</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript untuk menghilangkan notifikasi -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const successAlert = document.getElementById('success-alert');
        const errorAlert = document.getElementById('error-alert');
        
        [successAlert, errorAlert].forEach(function(alert) {
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';
                    setTimeout(() => alert.remove(), 500);
                }, 5000);
            }
        });
    });
</script>



@endsection
