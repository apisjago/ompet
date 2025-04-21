<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi - {{ $siswa->name }}</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: center; }
    </style>
</head>
<body>

    <h2>Laporan Transaksi</h2>
    <p>Nama: {{ $siswa->name }}</p>
    <p>Email: {{ $siswa->email }}</p>
    <p>Saldo Akhir: Rp{{ number_format($saldo, 0, ',', '.') }}</p>

    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mutasi as $m)
                <tr>
                    <td>{{ $m->created_at->format('d/m/Y') }}</td>
                    <td>{{ $m->description }}</td>
                    <td>Rp{{ number_format($m->debit, 0, ',', '.') }}</td>
                    <td>Rp{{ number_format($m->credit, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
