<!DOCTYPE html>
<html>
<head>
    <title>Laporan Transaksi</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Transaksi 30 Hari Terakhir</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>User</th>
                <th>Credit</th>
                <th>Debit</th>
                <th>Status</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mutasi as $i => $m)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $m->user->name ?? '-' }}</td>
                    <td>RP. {{ number_format($m->credit) }}</td>
                    <td>Rp. {{ number_format($m->debit) }}</td>
                    <td>{{ ucfirst($m->status) }}</td>
                    <td>{{ $m->created_at->format('d M Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
