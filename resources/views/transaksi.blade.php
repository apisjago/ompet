<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Transaction History</h1>

    @if($mutasi->isEmpty())
        <p>No transactions yet.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mutasi as $item)
                    <tr>
                        <td>{{ $item->created_at->format('d M Y H:i') }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->debit > 0 ? 'Rp ' . number_format($item->debit, 0, ',', '.') : '-' }}</td>
                        <td>{{ $item->credit > 0 ? 'Rp ' . number_format($item->credit, 0, ',', '.') : '-' }}</td>
                        <td>
                            @if($item->status == 'done')
                                <span>Done</span>
                            @elseif($item->status == 'rejected')
                                <span>Rejected</span>
                            @else
                                <span>Process</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
