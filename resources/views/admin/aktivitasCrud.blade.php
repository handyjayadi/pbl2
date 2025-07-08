
@include('templates.sidebaradmin')
@include('templates.headeradmin')

<div class="container grid px-6 py-8 mt-8 mx-auto">
  <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">Manajemen Aktivitas</h4>

  <!-- Tombol Tambah -->
  <div class="flex justify-end mb-4">
    <button onclick="openModal('create')" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">
      + Tambah Aktivitas
    </button>
  </div>

  <!-- Tabel -->
  <div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-lg shadow mt-6">
    <table class="w-full table-auto">
      <thead>
        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-left">
          <th class="px-4 py-3">No</th>
          <th class="px-4 py-3">Nama</th>
          <th class="px-4 py-3">Deskripsi</th>
          <th class="px-4 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($aktivitas as $index => $item)
          <tr class="border-b dark:border-gray-700 text-gray-800 dark:text-gray-300">
            <td class="px-4 py-2">{{ $aktivitas->firstItem() + $index}}</td>
            <td class="px-4 py-2">{{ $item->name }}</td>
            <td class="px-4 py-2">{{ $item->descaktivitas }}</td>
            <td class="px-4 py-2 flex space-x-2">
             <button onclick="openEditModal({{$item}})" class="class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg></button>
              <form action="{{ route('aktivitas.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus aktivitas ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete"><svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                  </svg></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-6">
  {{ $aktivitas->links('pagination::tailwind') }}
</div>

</div>

<!-- Modal Tambah/Edit -->
<div id="aktivitasModal" class="fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center hidden">
  <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-xl p-6">
    <h2 id="modalTitle" class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200">Tambah Aktivitas</h2>
    
    <form id="aktivitasForm" method="POST">
      @csrf
      <input type="hidden" name="_method" id="formMethod" value="POST">
      <input type="hidden" name="id" id="aktivitasId">

      <label for="name" class="text-gray-700 dark:text-gray-300">Nama Aktivitas</label>
      <input type="text" name="name" id="name" placeholder="Nama Aktivitas"
             class="w-full px-2 py-2 mb-4 border-b border-gray-400 bg-transparent focus:outline-none" required>

      <label for="descaktivitas" class="text-gray-700 dark:text-gray-300">Deskripsi</label>
      <textarea name="descaktivitas" id="descaktivitas" placeholder="Deskripsi Aktivitas"
                class="w-full px-2 py-2 mb-4 border-b border-gray-400 bg-transparent focus:outline-none"
                rows="4" required></textarea>

      <div class="flex justify-end space-x-2">
        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
        <button type="submit" class="px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700">Simpan</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openModal(mode) {
    document.getElementById('aktivitasModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = mode === 'create' ? 'Tambah Aktivitas' : 'Edit Aktivitas';
    document.getElementById('aktivitasForm').action = mode === 'create' ? "{{ route('aktivitas.store') }}" : '';
    document.getElementById('formMethod').value = mode === 'create' ? 'POST' : 'PUT';

    // Kosongkan form
    document.getElementById('aktivitasId').value = '';
    document.getElementById('name').value = '';
    document.getElementById('descaktivitas').value = '';
  }

  function openEditModal(item) {
    openModal('edit');
    document.getElementById('aktivitasForm').action = `/aktivitas/${item.id}`;
    document.getElementById('formMethod').value = 'PUT';
    document.getElementById('aktivitasId').value = item.id;
    document.getElementById('name').value = item.name;
    document.getElementById('descaktivitas').value = item.descaktivitas;
  }

  function closeModal() {
    document.getElementById('aktivitasModal').classList.add('hidden');
  }
</script>

@include('templates.footeradmin')
