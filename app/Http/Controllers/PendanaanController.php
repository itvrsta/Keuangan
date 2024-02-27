<?php

namespace App\Http\Controllers;

use App\Models\Pendanaan;
use Illuminate\Http\Request;

class PendanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pendanaan.index', [
            'pendanaan' => Pendanaan::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pendanaan.create');
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

        $pendanaan = new Pendanaan();

        $pendanaan->tanggal = $request->tanggal;
        $pendanaan->uraian = $request->uraian;
        $pendanaan->nominal = $request->nominal;

        $pendanaan->save();

        session()->flash('success', 'Data berhasil ditambahkan.');

        return redirect()->route('pendanaan.index');
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
        $pendanaan = Pendanaan::find($id);

        return view('pendanaan.edit', [
        'pendanaan' =>$pendanaan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tanggal' =>['required'],
            'uraian' =>['required', 'min:3'],
            'nominal' =>['required'],
        ]);

        $pendanaan = Pendanaan::find($id);

        $pendanaan->tanggal = $request->tanggal;
        $pendanaan->uraian = $request->uraian;
        $pendanaan->nominal = $request->nominal;

        $pendanaan->save();
        session()->flash('info', 'Data berhasil diperbarui.');

        return redirect()->route('pendanaan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pendanaan = Pendanaan::find($id);
        $pendanaan->delete();
        session()->flash('danger', 'Data berhasil dihapus.');
        return redirect()->route('pendanaan.index');
    }
}
