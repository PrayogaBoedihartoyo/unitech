@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pengajuan Dana</h1>
    <a href="{{ route('pengajuan.create') }}" class="btn btn-primary mb-3">Tambah Pengajuan</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama Pemohon</th>
                <th>Divisi</th>
                <th>Nominal</th>
                <th>Metode</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengajuans as $pengajuan)
            <tr>
                <td>{{ $pengajuan->user->name }}</td>
                <td>{{ $pengajuan->user->divisi->nama_divisi }}</td>
                <td>Rp. {{ number_format($pengajuan->nominal, 0, ',', '.') }}</td>
                <td>{{ $pengajuan->metode->nama_metode }}</td>
                <td>
                    <a href="{{ route('pengajuan.edit', $pengajuan->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection