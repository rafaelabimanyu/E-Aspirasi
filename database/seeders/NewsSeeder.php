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
                'content' => "Dalam rangka mencegah penyebaran Demam Berdarah Dengue (DBD) yang mulai meningkat seiring datangnya musim penghujan, Dinas Kesehatan Kota bekerja sama dengan seluruh aparatur desa akan melaksanakan kegiatan fogging serentak.\n\nKegiatan ini direncanakan akan mulai dilaksanakan pada hari Senin, 10 Mei 2026, mencakup seluruh wilayah kecamatan yang masuk dalam zona rawan. Masyarakat diharapkan kerjasamanya untuk memberikan akses bagi petugas fogging agar dapat menyemprot area-area yang berpotensi menjadi sarang nyamuk.\n\nSelain fogging, warga juga sangat diimbau untuk kembali menggiatkan program 3M Plus, yaitu menguras tempat penampungan air, menutup rapat-rapat penyimpanan air, dan mendaur ulang barang bekas. Kesadaran masyarakat adalah kunci utama dalam memberantas siklus perkembangbiakan nyamuk Aedes aegypti."
            ],
            [
                'title' => 'Pendaftaran Beasiswa Prestasi Tingkat Kecamatan',
                'type' => 'berita',
                'content' => "Pemerintah kecamatan dengan bangga kembali membuka pendaftaran Beasiswa Prestasi Tahun 2026 yang ditujukan untuk memfasilitasi pelajar berprestasi dari jenjang Sekolah Menengah Atas (SMA) hingga Perguruan Tinggi.\n\nProgram beasiswa ini merupakan wujud nyata kepedulian pemerintah terhadap peningkatan mutu sumber daya manusia di tingkat daerah. Pendaftaran resmi dibuka mulai hari ini dan akan ditutup pada 30 Juni 2026. Mengingat kuota yang disediakan cukup terbatas, para calon pendaftar diharapkan segera mempersiapkan seluruh dokumen persyaratan yang diperlukan.\n\nSyarat utama pendaftaran meliputi fotokopi rapor/transkrip nilai terakhir yang telah dilegalisir, surat keterangan tidak mampu (bagi jalur afirmasi), serta portofolio piagam penghargaan bagi jalur prestasi non-akademik. Informasi lebih rinci serta formulir pendaftaran dapat diambil langsung di kantor kelurahan terdekat setiap jam kerja."
            ],
            [
                'title' => 'Himbauan Keamanan Lingkungan Menjelang Libur Panjang',
                'type' => 'pengumuman',
                'content' => "Menjelang libur panjang akhir tahun, tingkat kerawanan keamanan dan ketertiban masyarakat, khususnya kasus pencurian rumah kosong, memiliki tren yang cenderung meningkat. Oleh karena itu, Kepolisian Sektor setempat mengeluarkan edaran resmi terkait peningkatan sistem keamanan lingkungan (Siskamling).\n\nSeluruh warga masyarakat yang berencana untuk meninggalkan rumah dalam waktu lama (mudik atau berlibur) diwajibkan untuk melaporkan kepergiannya kepada Ketua RT atau petugas keamanan di lingkungan masing-masing selambat-lambatnya H-3 sebelum keberangkatan. Hal ini penting agar jadwal patroli siskamling dapat disesuaikan untuk memantau rumah-rumah kosong tersebut secara lebih intensif.\n\nDi samping itu, warga juga diingatkan untuk selalu mencabut seluruh colokan peralatan elektronik yang tidak digunakan, mencabut selang regulator gas kompresor, dan memastikan seluruh akses masuk (pintu dan jendela) terkunci dengan baik sebelum meninggalkan rumah. Kerjasama kolektif warga sangat dibutuhkan untuk menciptakan lingkungan yang aman dan kondusif."
            ],
            [
                'title' => 'Perbaikan Gorong-Gorong Jalan Merdeka',
                'type' => 'berita',
                'content' => "Sebagai respon atas keluhan warga mengenai genangan air yang selalu terjadi saat curah hujan tinggi, Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) saat ini tengah melaksanakan proyek perbaikan besar-besaran terhadap infrastruktur gorong-gorong dan drainase di sepanjang Jalan Merdeka.\n\nProyek ini difokuskan pada pelebaran dan pendalaman saluran air yang sebelumnya mengalami pendangkalan akibat penumpukan sedimen lumpur dan sampah plastik. Selain itu, gorong-gorong lama juga diganti dengan struktur beton precast yang memiliki daya tahan serta kapasitas alir yang jauh lebih besar.\n\nPekerjaan ini diperkirakan akan berlangsung selama kurang lebih dua minggu ke depan. Selama masa perbaikan, akan diberlakukan rekayasa lalu lintas buka-tutup jalur. Oleh karena itu, bagi masyarakat pengguna jalan yang biasa melintasi Jalan Merdeka, disarankan untuk mencari rute alternatif guna menghindari kemacetan. Pemerintah daerah memohon maaf atas ketidaknyamanan yang terjadi selama proses pembangunan ini."
            ],
            [
                'title' => 'Layanan Vaksinasi Rabies Gratis',
                'type' => 'pengumuman',
                'content' => "Sebagai langkah proaktif dalam mempertahankan status daerah bebas rabies, Dinas Peternakan dan Kesehatan Hewan kembali menyelenggarakan program layanan vaksinasi rabies secara gratis bagi hewan peliharaan warga, khususnya anjing, kucing, dan kera.\n\nKegiatan vaksinasi massal ini akan dilangsungkan di Balai Desa pusat pada akhir pekan ini, tepatnya hari Sabtu dan Minggu, mulai pukul 08:00 hingga 14:00 WIB. Tim dokter hewan yang bertugas juga akan memberikan layanan konsultasi kesehatan hewan ringan serta penyuluhan mengenai bahaya penyakit zoonosis kepada para pemilik hewan peliharaan.\n\nSyarat untuk mengikuti vaksinasi ini cukup mudah; hewan peliharaan harus berada dalam kondisi sehat (tidak sedang demam, flu, atau diare), berusia minimal 3 bulan, dan bagi hewan betina disyaratkan sedang tidak dalam kondisi bunting. Warga diimbau untuk membawa hewan peliharaannya menggunakan kandang atau tali penuntun yang kuat demi keamanan bersama."
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
