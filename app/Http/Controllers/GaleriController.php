<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Aktivitas;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::with('aktivitas')->get();
        $aktivitas = Aktivitas::all();
        return view('admin.galeriCrud', compact('galeri', 'aktivitas'));
    }
    public function galeriuser()
    {
        $aktivitas = Aktivitas::all();
        $galeri = Galeri::with('aktivitas')->get();
        return view('gallery', compact('galeri', 'aktivitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'aktivitas_id' => 'required|exists:aktivitas,id',
            'foto' => 'required|image|max:2048'
        ]);

        $path = $request->file('foto')->store('galeri', 'public');

        Galeri::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'aktivitas_id' => $request->aktivitas_id,
            'foto' => $path,
        ]);

        return redirect()->back()->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'aktivitas_id' => 'required|exists:aktivitas,id',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->only(['nama', 'deskripsi', 'aktivitas_id']);

        if ($request->hasFile('foto')) {
            if ($galeri->foto) {
                Storage::disk('public')->delete($galeri->foto);
            }
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $galeri->update($data);

        return redirect()->back()->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
        }
        $galeri->delete();

        return redirect()->back()->with('success', 'Galeri berhasil dihapus.');
    }
}
