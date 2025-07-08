@include('templates.sidebaradmin')
@include('templates.headeradmin')

<div class="container grid px-6 py-8 mt-8 mx-auto">
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Manajemen Galeri</h4>

  <!-- Tombol Tambah -->
  <div class="flex justify-end mb-4">
    <button onclick="openGaleriModal('create')" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
      + Tambah Galeri
    </button>
  </div>

  <!-- Tabel Galeri -->
  <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
    <table class="w-full table-auto">
      <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-left">
          <th class="px-4 py-3">No</th>
          <th class="px-4 py-3">Nama</th>
          <th class="px-4 py-3">Foto</th>
          <th class="px-4 py-3">Deskripsi</th>
          <th class="px-4 py-3">Kategori</th>
          <th class="px-4 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($galeri as $index => $item)
        <tr class="border-b dark:border-gray-700 text-gray-800 dark:text-gray-300">
          <td class="px-4 py-2">{{ $galeri->firstItem() + $index }}</td>
          <td class="px-4 py-2">{{ $item->nama }}</td>
          <td class="px-4 py-2">
            <img src="{{ asset('storage/' . $item->foto) }}" class="w-16 h-16 object-cover rounded" width="120">
          </td>
          <td class="px-4 py-2">{{ $item->deskripsi }}</td>
          <td class="px-4 py-2">{{ $item->aktivitas->name ?? '-' }}</td>
          <td class="px-4 py-2 flex space-x-2">
            <button onclick="openGaleriEditModal({{$item}})"
              class="px-2 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg></button>
            <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
              @csrf 
              @method('DELETE')
              <button type="submit" class="px-2 py-1 bg-red-500 text-black rounded hover:bg-red-600">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                  </svg>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
    <div class="mt-6">
    {{ $galeri->links('pagination::tailwind') }}
</div>
</div>

<!-- Modal Galeri -->
<div id="galeriModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-xl p-6">
    <h2 id="galeriModalTitle" class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">Tambah Galeri</h2>
    <form id="galeriForm" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" id="galeriFormMethod" value="POST">
      <input type="hidden" name="id" id="galeriId">

      <label for="nama">Nama</label>
      <input type="text" name="nama" id="galeriNama" class="w-full mb-4 px-2 py-2 border-b border-gray-400 bg-transparent focus:outline-none" required>

      <label for="deskripsi">Deskripsi</label>
      <textarea name="deskripsi" id="galeriDeskripsi" class="w-full mb-4 px-2 py-2 border-b border-gray-400 bg-transparent focus:outline-none" required></textarea>

      <label for="foto">Foto</label>
      <input type="file" name="foto" id="galeriFoto" class="w-full mb-4">

      <label for="aktivitas_id">Kategori</label>
      <select name="aktivitas_id" id="galeriAktivitas" class="w-full mb-4 px-2 py-2 border-b border-gray-400 bg-transparent focus:outline-none" required>
        <option value="">Pilih Kategori</option>
        @foreach ($aktivitas as $akt)
          <option value="{{ $akt->id }}">{{ $akt->name }}</option>
        @endforeach
      </select>

      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeGaleriModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openGaleriModal(mode) {
    document.getElementById('galeriModal').classList.remove('hidden');
    document.getElementById('galeriModalTitle').textContent = 'Tambah Galeri';
    document.getElementById('galeriForm').action = "{{ route('galeri.store') }}";
    document.getElementById('galeriFormMethod').value = 'POST';
    document.getElementById('galeriId').value = '';
    document.getElementById('galeriNama').value = '';
    document.getElementById('galeriDeskripsi').value = '';
    document.getElementById('galeriFoto').value = '';
    document.getElementById('galeriAktivitas').value = '';
  }

  function openGaleriEditModal(data) {
    openGaleriModal('edit');
    document.getElementById('galeriModalTitle').textContent = 'Edit Galeri';
    document.getElementById('galeriForm').action = `/galeri/${data.id}`;
    document.getElementById('galeriFormMethod').value = 'PUT';
    document.getElementById('galeriId').value = data.id;
    document.getElementById('galeriNama').value = data.nama;
    document.getElementById('galeriDeskripsi').value = data.deskripsi;
    document.getElementById('galeriAktivitas').value = data.Aktivitas_id;
  }

  function closeGaleriModal() {
    document.getElementById('galeriModal').classList.add('hidden');
  }
</script>

@include('templates.footeradmin')
