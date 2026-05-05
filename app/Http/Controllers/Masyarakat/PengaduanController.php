<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        // Example logic for returning view
        $pengaduans = Pengaduan::where('user_id', Auth::id())->latest()->get();
        return view('masyarakat.pengaduan.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('masyarakat.pengaduan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'incident_date' => 'required|date',
            'location' => 'required|string|max:255',
            'attachment' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('pengaduan_attachments', 'public');
        }

        // Generate Tracking ID: EASP-YYYYMMDD-XXXX
        $datePrefix = date('Ymd');
        $lastPengaduan = Pengaduan::whereDate('created_at', date('Y-m-d'))->orderBy('id', 'desc')->first();
        $sequence = $lastPengaduan ? (int) substr($lastPengaduan->tracking_id, -4) + 1 : 1;
        $trackingId = 'EASP-' . $datePrefix . '-' . str_pad($sequence, 4, '0', STR_PAD_LEFT);

        Pengaduan::create([
            'tracking_id' => $trackingId,
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
            'incident_date' => $validated['incident_date'],
            'location' => $validated['location'],
            'attachment' => $attachmentPath,
            'status' => 'pending',
        ]);

        return redirect()->route('masyarakat.pengaduan.index')->with('success', 'Pengaduan berhasil dikirim dengan Tracking ID: ' . $trackingId);
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::where('id', $id)->where('user_id', Auth::id())->with('tanggapans.user')->firstOrFail();
        return view('masyarakat.pengaduan.show', compact('pengaduan'));
    }
}
