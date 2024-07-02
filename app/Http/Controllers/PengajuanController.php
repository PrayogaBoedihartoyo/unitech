<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use App\Models\Metode;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::with(['user.divisi', 'metode'])->get();
        $users = User::all();
        $metodes = Metode::all();
        $pengajuan = $pengajuans->first();
        return view('pengajuan.index', compact('pengajuans', 'users', 'metodes', 'pengajuan'));
    }

    public function create()
    {
        $users = User::all();
        $metodes = Metode::all();
        return view('pengajuan.create', compact('users', 'metodes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'nominal' => 'required|numeric',
            'metode_id' => 'required',
        ]);

        $pengajuan = Pengajuan::create($request->only(['user_id', 'nominal', 'metode_id']));
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan dana berhasil ditambahkan.');
    }

    public function edit(Pengajuan $pengajuan)
    {
        $users = User::all();
        $metodes = Metode::all();
        return view('pengajuan.edit', compact('pengajuan', 'users', 'metodes'));
    }

    public function update(Request $request, Pengajuan $pengajuan)
    {
        $request->validate([
            'user_id' => 'required',
            'nominal' => 'required|numeric',
            'metode_id' => 'required',
        ]);

        $pengajuan->update($request->all());
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan dana berhasil diperbarui.');
    }

    public function destroy(Pengajuan $pengajuan)
    {
        $pengajuan->delete();
        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan dana berhasil dihapus.');
    }
}
