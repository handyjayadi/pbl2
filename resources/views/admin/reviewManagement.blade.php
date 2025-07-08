@include('templates.sidebaradmin')
@include('templates.headeradmin')

<div class="container grid px-6 py-8 mt-8 mx-auto">
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Manajemen Review</h4>

  <!-- Tabel Review -->
  <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
    <table class="w-full table-auto">
      <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-left">
          <th class="px-4 py-3">No</th>
          <th class="px-4 py-3">Nama</th>
          <th class="px-4 py-3">Review</th>
          <th class="px-4 py-3">Rating</th>
          <th class="px-4 py-3">Tanggal</th>
          <th class="px-4 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($reviews as $index => $review)
        <tr class="border-b dark:border-gray-700 text-gray-800 dark:text-gray-300">
          <td class="px-4 py-2">{{ $reviews->firstItem() + $index }}</td>
          <td class="px-4 py-2">{{ $review->user->name ?? 'Anonim' }}</td>
          <td class="px-4 py-2">{{ $review->komentar }}</td>
          <td class="px-4 py-2">{{ $review->rating }}/5</td>
          <td class="px-4 py-2">{{ $review->created_at->format('d M Y') }}</td>
          <td class="px-4 py-2">
            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('Yakin hapus review ini?')">
              @csrf
              @method('DELETE')
              <button class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                🗑️
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-6">
    {{ $reviews->links('pagination::tailwind') }}
  </div>
</div>

@include('templates.footeradmin')
