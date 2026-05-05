<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data E-Aspirasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            text-transform: uppercase;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
        }
        .report-title {
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            text-transform: uppercase;
        }
        .report-date {
            text-align: center;
            font-size: 12px;
            margin-bottom: 20px;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th {
            background-color: #f2f2f2;
            padding: 8px;
            text-align: center;
        }
        td {
            padding: 8px;
            vertical-align: top;
        }
        .text-center {
            text-align: center;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
            padding-right: 50px;
        }
        .footer p {
            margin: 0 0 60px 0;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>PEMERINTAH KOTA ADMINISTRATIF</h1>
        <h2>LAYANAN E-ASPIRASI MASYARAKAT</h2>
        <p>Jl. Contoh Pusat Pemerintahan No. 1, Kota Administratif, Kode Pos 12345</p>
        <p>Telp: (021) 1234567 | Email: admin@e-aspirasi.go.id | Website: www.e-aspirasi.go.id</p>
    </div>

    <div class="report-title">
        REKAPITULASI DATA PENGADUAN DAN ASPIRASI MASYARAKAT
    </div>
    <div class="report-date">
        Tanggal Laporan Dicetak: {{ \Carbon\Carbon::now()->format('d F Y, H:i') }}
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="10%">Tracking ID</th>
                <th width="15%">Tanggal Laporan</th>
                <th width="15%">Pelapor</th>
                <th width="10%">Klasifikasi</th>
                <th width="25%">Judul / Detail Laporan</th>
                <th width="10%">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengaduans as $index => $aduan)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td class="text-center">{{ $aduan->tracking_id }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($aduan->created_at)->format('d/m/Y H:i') }}</td>
                <td>
                    @if($aduan->is_anonymous)
                        <i>Anonim</i>
                    @else
                        {{ $aduan->user->name ?? 'User Dihapus' }}
                    @endif
                </td>
                <td class="text-center">{{ ucfirst($aduan->classification) }}</td>
                <td>
                    <strong>{{ $aduan->title }}</strong><br>
                    {{ Str::limit($aduan->description, 100) }}
                </td>
                <td class="text-center">{{ ucfirst($aduan->status) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data laporan yang sesuai dengan kriteria.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        <p>Mengetahui,</p>
        <p><strong>Kepala Bagian Pelayanan Publik</strong></p>
    </div>

</body>
</html>
