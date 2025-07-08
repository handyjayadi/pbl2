@include('templates.sidebaradmin')
@include('templates.headeradmin')

<div class="container grid px-6 py-8 mt-8 mx-auto">
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Manajemen Tenda</h4>

  <!-- Tombol Tambah -->
  <div class="flex justify-end mb-4">
    <button onclick="openTendaModal('create')" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
      + Tambah Tenda
    </button>
  </div>

  <!-- Tabel Tenda -->
  <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow">
    <table class="w-full table-auto">
      <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-left">
          <th class="px-4 py-3">No</th>
          <th class="px-4 py-3">Nama</th>
          <th class="px-4 py-3">Foto</th>
          <th class="px-4 py-3">Deskripsi</th>
          <th class="px-4 py-3">Stok</th>
          <th class="px-4 py-3">Harga</th>
          <th class="px-4 py-3">Kapasitas</th>
          <th class="px-4 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tenda as $index => $item)
        <tr class="border-b dark:border-gray-700 text-gray-800 dark:text-gray-300">
          <td class="px-4 py-2">{{ $tenda->firstItem() + $loop->index}}</td>
          <td class="px-4 py-2">{{ $item->nama }}</td>
          <td class="px-4 py-2">
            <img src="{{ asset('storage/' . $item->foto) }}" class="w-16 h-16 object-cover rounded" width="120">
          </td>
          <td class="px-4 py-2">{{ $item->deskripsi }}</td>
          <td class="px-4 py-2">{{ $item->stok }}</td>
          <td class="px-4 py-2">Rp{{ number_format($item->harga) }}</td>
          <td class="px-4 py-2">{{ $item->kapasitas }} org</td>
          <td class="px-4 py-2 flex space-x-2">
            <button onclick='openTendaEditModal({{ $item }})'
              class="px-2 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500">
              ✏️
            </button>
            <form action="{{ route('tendas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">🗑️</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
  <div class="mt-6">
    {{ $tenda->links('pagination::tailwind') }}
</div>
</div>


<!-- Modal Tenda -->
<div id="tendaModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-xl p-6">
    <h2 id="tendaModalTitle" class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">Tambah Tenda</h2>
    <form id="tendaForm" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" id="tendaFormMethod" value="POST">
      <input type="hidden" name="id" id="tendaId">

      <label>Nama</label>
      <input type="text" name="nama" id="tendaNama" class="w-full mb-4 px-2 py-2 border-b bg-transparent focus:outline-none" required>

      <label>Deskripsi</label>
      <textarea name="deskripsi" id="tendaDeskripsi" class="w-full mb-4 px-2 py-2 border-b bg-transparent focus:outline-none" required></textarea>

      <label>Stok</label>
      <input type="number" name="stok" id="tendaStok" class="w-full mb-4 px-2 py-2 border-b bg-transparent focus:outline-none" required>

      <label>Harga</label>
      <input type="number" name="harga" id="tendaHarga" class="w-full mb-4 px-2 py-2 border-b bg-transparent focus:outline-none" required>

      <label>Kapasitas Orang</label>
      <input type="number" name="kapasitas" id="tendaKapasitas" class="w-full mb-4 px-2 py-2 border-b bg-transparent focus:outline-none" placeholder="Misal: 4 orang">


      <label>Foto</label>
      <input type="file" name="foto" id="tendaFoto" class="w-full mb-4">

      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeTendaModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openTendaModal(mode) {
    document.getElementById('tendaModal').classList.remove('hidden');
    document.getElementById('tendaModalTitle').textContent = 'Tambah Tenda';
    document.getElementById('tendaForm').action = "{{ route('tendas.store') }}";
    document.getElementById('tendaFormMethod').value = 'POST';
    document.getElementById('tendaNama').value = '';
    document.getElementById('tendaDeskripsi').value = '';
    document.getElementById('tendaStok').value = '';
    document.getElementById('tendaHarga').value = '';
    document.getElementById('tendaFoto').value = '';
  }

  function openTendaEditModal(data) {
    openTendaModal('edit');
    document.getElementById('tendaModalTitle').textContent = 'Edit Tenda';
    document.getElementById('tendaForm').action = `/tendas/${data.id}`;
    document.getElementById('tendaFormMethod').value = 'PUT';
    document.getElementById('tendaNama').value = data.nama;
    document.getElementById('tendaDeskripsi').value = data.deskripsi;
    document.getElementById('tendaStok').value = data.stok;
    document.getElementById('tendaHarga').value = data.harga;
    document.getElementById('tendaKapasitas').value = data.kapasitas;
  }

  function closeTendaModal() {
    document.getElementById('tendaModal').classList.add('hidden');
  }
</script>

@include('templates.footeradmin')
