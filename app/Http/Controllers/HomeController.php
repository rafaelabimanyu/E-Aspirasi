<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Pengaduan;

class HomeController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(3)->get();
        $totalSelesai = Pengaduan::where('status', 'selesai')->count();
        $totalProses = Pengaduan::whereIn('status', ['pending', 'diverifikasi', 'diproses'])->count();
        
        return view('welcome', compact('news', 'totalSelesai', 'totalProses'));
    }

    public function show($slug)
    {
        $newsItem = News::where('slug', $slug)->firstOrFail();
        return view('news.show', compact('newsItem'));
    }
}
