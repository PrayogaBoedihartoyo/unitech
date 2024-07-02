@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Pengajuan Dana</h1>
    <form action="{{ route('pengajuan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_id">Pemohon</label>
            <select name="user_id" id="user_id" class="form-control" required>
            @foreach($users as $user)
                <option value="{{ $user->id }}">
                    {{ $user->name }} - 
                    {{ $user->divisi ? $user->divisi->nama_divisi : 'Tidak ada divisi' }}
                </option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nominal">Nominal</label>
            <input type="number" name="nominal" id="nominal" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="metode_id">Metode</label>
            <select name="metode_id" id="metode_id" class="form-control" required>
            @foreach($metodes as $metode)
                <option value="{{ $metode->id }}">{{ $metode->nama_metode }}</option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection