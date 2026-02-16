<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;

class LaporanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date'=> 'required',
            'address'=>'required|string',
            'isi_laporan'=>'required',
            'gambar_bukti'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $nama_gambar = null;
        if ($request->hasFile('gambar_bukti')) {
            $file = $request->file('gambar_bukti');
            $nama_gambar = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $nama_gambar);
        }

        Laporan::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'address' => $request->address,
            'isi_laporan' => $request->isi_laporan,
            'gambar_bukti' => $nama_gambar,
        ]);
        return redirect()->route('laporan_saya')->with('success', 'Laporan berhasil dibuat!');
    }
    public function index()
{
    $laporans = Laporan::where('user_id', Auth::id())->latest()->get();
    
    return view('laporan_saya', compact('laporans'));
}
}
