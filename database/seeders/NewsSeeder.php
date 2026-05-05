<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title' => 'Jadwal Fogging Serentak Pekan Depan',
                'type' => 'pengumuman',
                'content' => 'Dalam rangka mencegah penyebaran Demam Berdarah Dengue (DBD), Dinas Kesehatan bekerja sama dengan seluruh aparat desa akan melaksanakan kegiatan fogging serentak mulai hari Senin, 10 Mei 2026. Warga diimbau untuk menutup rapat penyimpanan air dan membersihkan saluran pembuangan.'
            ],
            [
                'title' => 'Pendaftaran Beasiswa Prestasi Tingkat Kecamatan',
                'type' => 'berita',
                'content' => 'Pemerintah kecamatan resmi membuka pendaftaran Beasiswa Prestasi 2026 untuk jenjang SMA dan Perguruan Tinggi. Pendaftaran dibuka hingga 30 Juni 2026 dengan kuota terbatas. Segera siapkan dokumen persyaratan Anda di kantor kelurahan terdekat.'
            ],
            [
                'title' => 'Himbauan Keamanan Lingkungan Menjelang Hari Raya',
                'type' => 'pengumuman',
                'content' => 'Menjelang Hari Raya, tingkat kerawanan pencurian rumah kosong cenderung meningkat. Seluruh warga yang akan melaksanakan mudik diwajibkan melapor kepada Ketua RT masing-masing selambat-lambatnya H-3 keberangkatan agar jadwal siskamling dapat disesuaikan.'
            ],
            [
                'title' => 'Perbaikan Gorong-Gorong Jalan Merdeka',
                'type' => 'berita',
                'content' => 'Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) sedang melakukan perbaikan gorong-gorong dan drainase di sepanjang Jalan Merdeka untuk mengatasi genangan air saat hujan deras. Proyek diperkirakan selesai dalam waktu dua minggu.'
            ],
            [
                'title' => 'Layanan Vaksinasi Rabies Gratis',
                'type' => 'pengumuman',
                'content' => 'Dinas Peternakan dan Kesehatan Hewan menyelenggarakan kegiatan vaksinasi rabies gratis untuk hewan peliharaan warga. Kegiatan ini akan dilaksanakan di Balai Desa pada akhir pekan ini, mulai pukul 08:00 hingga 14:00 WIB.'
            ],
        ];

        foreach ($news as $item) {
            News::create([
                'title' => $item['title'],
                'slug' => Str::slug($item['title']),
                'content' => $item['content'],
                'type' => $item['type'],
            ]);
        }
    }
}
