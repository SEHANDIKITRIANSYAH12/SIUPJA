<html>
<head>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .table th, .table td { border: 1px solid #333; padding: 8px; }
        .table th { background: #eee; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Bukti Sewa Alat</h2>
        <p>SIUPJASNEAT</p>
    </div>
    <table>
        <tr>
            <td><b>Nama Peminjam</b></td>
            <td>{{ $loan->user->name }}</td>
        </tr>
        <tr>
            <td><b>Nama Alat</b></td>
            <td>{{ $loan->tool->name }}</td>
        </tr>
        <tr>
            <td><b>Tanggal Pinjam</b></td>
            <td>{{ $loan->start_date }}</td>
        </tr>
        <tr>
            <td><b>Estimasi Kembali</b></td>
            <td>{{ $loan->end_date }}</td>
        </tr>
        <tr>
            <td><b>Status</b></td>
            <td>{{ ucfirst($loan->status) }}</td>
        </tr>
        <tr>
            <td><b>Keperluan</b></td>
            <td>{{ $loan->reason ?? '-' }}</td>
        </tr>
    </table>
    <br><br>
    <p>Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>
</body>
</html>
