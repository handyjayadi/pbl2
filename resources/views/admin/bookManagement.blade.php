@include('templates.sidebaradmin')
@include('templates.headeradmin')

<div class="container grid px-6 py-8 mt-8 mx-auto">
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Manajemen Transaksi</h4>

  <!-- Filter -->
  <form method="GET" class="flex flex-wrap gap-4 items-center mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/email..."
      class="px-4 py-2 border rounded-md w-64 mr-2" />

    <input type="date" name="tanggal" value="{{ request('tanggal') }}"
      class="px-4 py-2 border rounded-md mr-2" />

    <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 mr-2">
      Filter
    </button>
    <a href="{{ route('admin.bookManagement') }}" class="px-4 py-2 border rounded-md mr-2 bg-purple-600 text-white">Reset</a>
  </form>

  <!-- Tabel -->
  <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
    <table class="w-full table-auto">
      <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-left">
          <th class="px-4 py-3">No</th>
          <th class="px-4 py-3">Nama</th>
          <th class="px-4 py-3">Email</th>
          <th class="px-4 py-3">Tenda</th>
          <th class="px-4 py-3">Jumlah</th>
          <th class="px-4 py-3">Check In</th>
          <th class="px-4 py-3">Check Out</th>
          <th class="px-4 py-3">Total</th>
          <th class="px-4 py-3">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transaksi as $i => $item)
          <tr class="border-b dark:border-gray-700 text-gray-800 dark:text-gray-300">
            <td class="px-4 py-2">{{ $transaksi->firstItem() + $i }}</td>
            <td class="px-4 py-2">{{ $item->nama }}</td>
            <td class="px-4 py-2">{{ $item->email }}</td>
            <td class="px-4 py-2">{{ $item->tenda->nama ?? '-' }}</td>
            <td class="px-4 py-2">{{ $item->jumlah }}</td>
            <td class="px-4 py-2">{{ $item->check_in }}</td>
            <td class="px-4 py-2">{{ $item->check_out }}</td>
            <td class="px-4 py-2">Rp{{ number_format($item->total_harga, 0, ',', '.') }}</td>
            <td class="px-4 py-2">
              
              <span class="px-2 py-1 rounded text-black {{ 
                $item->status === 'paid' ? 'bg-green-500' : (
                $item->status === 'pending' ? 'bg-yellow-500' : 'bg-red-500') }}">
                {{ ucfirst($item->status) }}
              </span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  <div class="mt-6">
    {{ $transaksi->links('pagination::tailwind') }}
  </div>
</div>

@include('templates.footeradmin')
