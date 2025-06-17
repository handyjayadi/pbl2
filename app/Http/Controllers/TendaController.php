<?php
    
namespace App\Http\Controllers;
use App\Models\Tenda;
use Illuminate\Http\Request;


class TendaController extends Controller
{
    public function index()
    {
        $tenda = Tenda::latest()->get();
        return view('admin.tendaCrud', compact('tenda'));
    }

     public function tenda()
    {
        $tenda = Tenda::latest()->get();
        return view('tenda', compact('tenda'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        $foto = $request->file('foto')->store('tendas', 'public');

        Tenda::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        $tenda = Tenda::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|integer',
        ]);

        if ($request->hasFile('foto')) {
            $request->validate(['foto' => 'image|mimes:jpg,jpeg,png|max:2048']);
            $data['foto'] = $request->file('foto')->store('tendas', 'public');
        }

        $tenda->update($data);
        return back();
    }

    public function destroy($id)
    {
        Tenda::destroy($id);
        return back();
    }
}
