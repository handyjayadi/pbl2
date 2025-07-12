<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body { font-family: sans-serif; }
        .header { text-align: center; margin-bottom: 30px; }
        .info, .details { margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ccc; }
        .total { font-weight: bold; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Invoice Pemesanan</h2>
    </div>

    <div class="info">
        <p><strong>Nama:</strong> {{ $booking->nama }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
        <p><strong>Order ID:</strong> {{ $booking->order_id }}</p>
        <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
    </div>

    <div class="details">
        <table>
            <tr>
                <th>Tenda</th>
                <th>Jumlah</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Total Harga</th>
            </tr>
            <tr>
                <td>{{ $booking->tenda->nama }}</td>
                <td>{{ $booking->jumlah }}</td>
                <td>{{ $booking->check_in }}</td>
                <td>{{ $booking->check_out }}</td>
                <td>Rp{{ number_format($booking->total_harga, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
