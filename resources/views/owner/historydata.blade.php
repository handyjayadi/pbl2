@include('templates.navbar')

<div class="p-6 pt-16 mt-10 mx-16 px-16">
    <h2 class="text-2xl font-bold mb-4">Laporan Booking</h2>

    <!-- Filter Form -->
    <div class="bg-white shadow-md rounded p-4 mb-6">
        <form method="GET" action="{{ route('owner.bookings') }}" class="flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm font-medium">Bulan:</label>
                <select name="month" class="border rounded px-3 py-2 w-full">
                    @foreach(range(1,12) as $m)
                        <option value="{{ $m }}" {{ $month == $m ? 'selected' : '' }}>
                            {{ DateTime::createFromFormat('!m', $m)->format('F') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium">Tahun:</label>
                <input type="number" name="year" value="{{ $year }}" class="border rounded px-3 py-2 w-full" min="2020" max="2100">
            </div>
            <div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Filter
                </button>
            </div>
            <div class="ml-auto">
                <a href="{{ route('owner.bookings.pdf', ['month' => $month, 'year' => $year]) }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    Download PDF
                </a>
            </div>
        </form>
    </div>

    <!-- Card -->
    <div class="bg-white shadow-md rounded overflow-x-auto p-4">
        <table class="w-full text-sm text-left text-gray-700">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th class="px-4 py-2">No</th>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Tenda</th>
                    <th class="px-4 py-2">Check In</th>
                    <th class="px-4 py-2">Check Out</th>
                    <th class="px-4 py-2">Total Harga</th>
                    <th class="px-4 py-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $index => $booking)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $bookings->firstItem() + $index }}</td>
                    <td class="px-4 py-2">{{ $booking->user->name }}</td>
                    <td class="px-4 py-2 break-words max-w-[180px]">{{ $booking->user->email }}</td>
                    <td class="px-4 py-2">{{ $booking->tenda->nama }}</td>
                    <td class="px-4 py-2">{{ $booking->check_in }}</td>
                    <td class="px-4 py-2">{{ $booking->check_out }}</td>
                    <td class="px-4 py-2">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td>
                    <td class="px-4 py-2">{{ ucfirst($booking->status) }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center px-4 py-4">Tidak ada data untuk bulan ini.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $bookings->withQueryString()->links() }}
        </div>

    </div>
</div>

@include('templates.footer')
