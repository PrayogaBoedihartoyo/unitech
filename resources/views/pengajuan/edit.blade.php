@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pengajuan Dana</h1>
    @if($pengajuan)
        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="user_id">Pemohon</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ optional($pengajuan->user)->id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} - {{ optional($user->divisi)->nama_divisi ?? 'N/A' }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nominal">Nominal</label>
                <input type="number" name="nominal" id="nominal" class="form-control" value="{{ $pengajuan->nominal ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="metode_id">Metode</label>
                <select name="metode_id" id="metode_id" class="form-control" required>
                    @foreach($metodes as $metode)
                        <option value="{{ $metode->id }}" {{ $pengajuan->metode_id == $metode->id ? 'selected' : '' }}>
                            {{ $metode->nama_metode }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    @else
        <p>Pengajuan dana tidak ditemukan.</p>
    @endif
</div>
@endsection