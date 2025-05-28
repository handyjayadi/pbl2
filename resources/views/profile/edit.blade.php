
@include('templates.navbar')
    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
   -->
  <div class="container mx-auto pt-24" >
        <form method="post" action="{{ route('profile.update') }}" class=" container max-w-7xl mx-auto p-6 m-6 bg-gray dark:bg-gray-200 rounded-lg shadow-md space-y-6">
                @csrf
                @method('patch')
                <h2 class="text-2xl font-bold mb-4">Edit Profil</h2>
                <p class="text-gray-600 dark:text-gray-800 mb-6">Perbarui informasi profil Anda di sini.</p>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Masukan Nama baru</label>
                    <input type="text" name="name" id="default-input" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-300 dark:border-gray-100 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
               
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Masukan Gmail baru</label>
                    <input type="text" name="email" id="default-input" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-300 dark:border-gray-100 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                     @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-start ">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">
                    Simpan
                </button>
                </div>

        </form>


        <form method="post" action="{{ route('password.update') }}" class=" container max-w-7xl mx-auto p-6 m-6 bg-gray dark:bg-gray-200 rounded-lg shadow-md space-y-6">
                @csrf
                @method('put')
                <h2 class="text-2xl font-bold mb-4">Edit Password</h2>
                <p class="text-gray-600 dark:text-gray-800 mb-6">Perbarui Password akun Anda di sini.</p>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Masukan Password lama</label>
                    <input type="password" name="current_password" id="default-input" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-300 dark:border-gray-100 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('current_password', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Masukan Password baru</label>
                    <input type="password" name="password" id="default-input" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-300 dark:border-gray-100 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('password', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Masukan Konfirmasi Password</label>
                    <input type="password" :value="old('name) $user->name" name="password_confirmation" id="default-input" class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/4 p-2.5 dark:bg-gray-300 dark:border-gray-100 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('password_confirmation', 'updatePassword')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-start">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">
                    Simpan
                </button>
                </div>

        </form>

        <form method="post" action="{{ route('profile.destroy') }}" class=" container max-w-7xl mx-auto p-6 m-6 bg-gray dark:bg-gray-200 rounded-lg shadow-md space-y-6">
                @csrf
                @method('delete')
                <h2 class="text-2xl font-bold mb-4">Hapus Akun</h2>
                <p class="text-gray-600 dark:text-gray-800 mb-6">Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, harap unduh data atau informasi apa pun yang ingin Anda simpan</p>
               
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Masukkan Password</label>
                <input type="password" name="password" id="password" required
                    class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg block w-3/4 p-2.5 dark:bg-gray-300 dark:border-gray-100 dark:text-black">
                     @error('password', 'userDeletion')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                <div class="flex justify-start ">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md">
                    Hapus
                </button>
                </div>

        </form>
</div>
@include('templates.footer')

