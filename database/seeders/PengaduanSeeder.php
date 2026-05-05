<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaduan;
use App\Models\User;

class PengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $masyarakat = User::where('role', 'masyarakat')->first();
        if (!$masyarakat) return;

        $pengaduans = [
            [
                'classification' => 'pengaduan',
                'title' => 'Kerusakan aspal di Jl. Sudirman',
                'description' => 'Terdapat lubang besar berdiameter sekitar 1 meter di Jalan Sudirman dekat perempatan lampu merah. Sangat berbahaya bagi pengendara motor terutama saat hujan karena tertutup genangan air.',
                'category' => 'Infrastruktur',
                'incident_date' => '2026-05-01',
                'location' => 'Jalan Sudirman RT 02 RW 05',
                'status' => 'pending',
                'is_anonymous' => false,
                'is_secret' => false,
            ],
            [
                'classification' => 'pengaduan',
                'title' => 'Penumpukan sampah di selokan blok C',
                'description' => 'Selokan di area perumahan blok C sudah tersumbat tumpukan sampah plastik dan sedimen lumpur selama dua minggu terakhir. Akibatnya, air selalu meluap ke jalanan setiap kali hujan turun agak deras.',
                'category' => 'Lingkungan',
                'incident_date' => '2026-05-03',
                'location' => 'Perumahan Indah Blok C',
                'status' => 'diverifikasi',
                'is_anonymous' => true,
                'is_secret' => false,
            ],
            [
                'classification' => 'aspirasi',
                'title' => 'Usulan perbaikan lampu taman kota',
                'description' => 'Mohon agar lampu di Taman Kota yang sudah mati segera diganti dan ditambah titik penerangannya. Kalau malam sangat gelap dan rawan disalahgunakan oleh anak-anak remaja untuk hal-hal negatif hingga larut malam.',
                'category' => 'Infrastruktur',
                'incident_date' => '2026-05-02',
                'location' => 'Taman Kota Alun-alun',
                'status' => 'diproses',
                'is_anonymous' => false,
                'is_secret' => true,
            ],
            [
                'classification' => 'informasi',
                'title' => 'Cara pendaftaran BPJS Kesehatan warga kurang mampu',
                'description' => 'Selamat pagi, saya ingin menanyakan syarat dan prosedur detail untuk pendaftaran BPJS PBI (Penerima Bantuan Iuran) melalui kantor kelurahan. Apa saja dokumen fisik yang perlu disiapkan?',
                'category' => 'Kesehatan',
                'incident_date' => '2026-05-04',
                'location' => 'Kelurahan Sukamaju',
                'status' => 'selesai',
                'is_anonymous' => false,
                'is_secret' => false,
            ],
            [
                'classification' => 'pengaduan',
                'title' => 'Parkir liar di depan halte bus halte RSUD',
                'description' => 'Terdapat banyak sekali ojek online dan taksi liar yang parkir sembarangan hingga memakan badan jalan di area halte bus tepat di depan rumah sakit. Penumpang angkutan umum jadi kesulitan saat hendak naik turun bus.',
                'category' => 'Keamanan',
                'incident_date' => '2026-05-05',
                'location' => 'Halte RSUD Kota',
                'status' => 'pending',
                'is_anonymous' => true,
                'is_secret' => false,
            ],
            [
                'classification' => 'pengaduan',
                'title' => 'Bau tidak sedap dari pabrik tahu',
                'description' => 'Pabrik tahu di ujung desa akhir-akhir ini membuang limbah cairnya langsung ke aliran sungai tanpa diolah. Baunya sangat menyengat dan mengganggu pernafasan warga sekitar.',
                'category' => 'Lingkungan',
                'incident_date' => '2026-05-04',
                'location' => 'Desa Suka Karya RT 01',
                'status' => 'diproses',
                'is_anonymous' => true,
                'is_secret' => true,
            ]
        ];

        foreach ($pengaduans as $index => $data) {
            $trackingId = 'EASP-' . date('Ymd') . '-' . str_pad($index + 1, 4, '0', STR_PAD_LEFT);
            $data['tracking_id'] = $trackingId;
            $data['user_id'] = $masyarakat->id;
            $pengaduan = Pengaduan::create($data);

            if ($data['status'] === 'selesai') {
                \App\Models\Tanggapan::create([
                    'pengaduan_id' => $pengaduan->id,
                    'user_id' => User::where('role', 'petugas')->first()->id,
                    'response' => 'Terima kasih atas pertanyaan Anda. Untuk pendaftaran BPJS PBI, silakan siapkan Fotokopi KK, KTP, dan Surat Keterangan Tidak Mampu (SKTM) dari RT/RW setempat, lalu serahkan ke loket 3 di Kantor Kelurahan pada hari kerja jam 08.00 - 14.00.'
                ]);
            }
        }
    }
}
