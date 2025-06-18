<html>
<head>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h2 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #333; padding: 6px; font-size: 12px; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h2>Laporan Peminjaman Bulan {{ now()->format('F Y') }}</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Peminjam</th>
                <th>Alat</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @forelse($loansThisMonth as $loan)
            <tr>
                <td>{{ $loan->user->name ?? '-' }}</td>
                <td>{{ $loan->tool->name ?? '-' }}</td>
                <td>{{ $loan->start_date }}</td>
                <td>{{ $loan->end_date }}</td>
                <td>{{ ucfirst($loan->status) }}</td>
            </tr>
        @empty
            <tr><td colspan="5">Tidak ada data peminjaman bulan ini.</td></tr>
        @endforelse
        </tbody>
    </table>
    <p style="text-align:right;font-size:11px;">Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>
</body>
</html>
