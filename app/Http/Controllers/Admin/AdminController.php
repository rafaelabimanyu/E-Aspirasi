<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::with('user')->latest();

        // Filter by Classification
        if ($request->filled('classification') && $request->classification !== 'semua') {
            $query->where('classification', $request->classification);
        }

        // Filter by Status
        if ($request->filled('status') && $request->status !== 'semua') {
            $query->where('status', $request->status);
        }

        $pengaduans = $query->paginate(15)->withQueryString();

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,diverifikasi,diproses,selesai',
            'response' => 'nullable|string'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->status = $request->status;
        $pengaduan->save();

        if ($request->filled('response')) {
            Tanggapan::create([
                'pengaduan_id' => $pengaduan->id,
                'user_id' => Auth::id(),
                'response' => $request->response
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Status laporan ' . $pengaduan->tracking_id . ' berhasil diperbarui.');
    }
}
