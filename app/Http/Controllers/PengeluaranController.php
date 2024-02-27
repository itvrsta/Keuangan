<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengeluaran.index', [
            'pengeluaran' => Pengeluaran::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tanggal' =>['required'],
            'uraian' =>['required', 'min:3'],
            'nominal' =>['required'],
        ]);

        $pengeluaran = new Pengeluaran();

        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->uraian = $request->uraian;
        $pengeluaran->nominal = $request->nominal;

        $pengeluaran->save();

        session()->flash('success', 'Data berhasil ditambahkan.');

        return redirect()->route('pengeluaran.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id);

        return view('pengeluaran.edit', [
        'pengeluaran' =>$pengeluaran,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' =>['required'],
            'uraian' =>['required', 'min:3'],
            'nominal' =>['required'],
        ]);

        $pengeluaran = Pengeluaran::find($id);

        $pengeluaran->tanggal = $request->tanggal;
        $pengeluaran->uraian = $request->uraian;
        $pengeluaran->nominal = $request->nominal;

        $pengeluaran->save();
        session()->flash('info', 'Data berhasil diperbarui.');

        return redirect()->route('pengeluaran.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $pengeluaran->delete();
        session()->flash('danger', 'Data berhasil dihapus.');
        return redirect()->route('pengeluaran.index');
    }
}
