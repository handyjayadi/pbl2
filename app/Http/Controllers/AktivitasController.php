<?php
    
// app/Http/Controllers/AktivitasController.php
namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;

class AktivitasController extends Controller
{
    public function index()
    {
        $aktivitas = Aktivitas::latest()->paginate(5);
        return view('admin.aktivitasCrud', compact('aktivitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'descaktivitas' => 'required',
        ]);

        Aktivitas::create($request->all());
        return redirect()->back()->with('success', 'Aktivitas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->update($request->all());
        return redirect()->back()->with('success', 'Aktivitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Aktivitas::destroy($id);
        return redirect()->back()->with('success', 'Aktivitas berhasil dihapus.');
    }
}
