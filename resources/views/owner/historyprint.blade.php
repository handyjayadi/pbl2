<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Booking</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse;  }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; word-break: break-all; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Laporan Booking Bulan {{ $month }} Tahun {{ $year }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tenda</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $index => $booking)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->user->email }}</td>
                <td>{{ $booking->tenda->nama }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->check_in)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($booking->check_out)->format('d-m-Y') }}</td>
                <td>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                <td>{{ ucfirst($booking->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
