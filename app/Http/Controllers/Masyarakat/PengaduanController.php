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
        $pengaduans = Pengaduan::where('user_id', Auth::id())->latest()->get();
        $news = \App\Models\News::latest()->take(2)->get();
        return view('masyarakat.pengaduan.index', compact('pengaduans', 'news'));
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

    public function storeTanggapan(Request $request, $id)
    {
        $request->validate([
            'response' => 'required|string',
        ]);

        $pengaduan = Pengaduan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        \App\Models\Tanggapan::create([
            'pengaduan_id' => $pengaduan->id,
            'user_id' => Auth::id(),
            'response' => $request->response,
        ]);

        return redirect()->back()->with('success', 'Tanggapan berhasil dikirim.');
    }
}
