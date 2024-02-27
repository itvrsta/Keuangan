@extends('templates.default')

@php
    $title = 'Pengeluaran';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('pengeluaran.create')}}" class="btn btn-primary">Tambah Data</a>
@endpush

@section('content')
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Id</th>
            <th>tanggal</th>
            <th>uraian</th>
            <th>nominal</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
         @foreach ($pengeluaran as $pengeluaran)
             <tr>
                <td>{{$pengeluaran->id }}</td>
                <td>{{$pengeluaran->tanggal }}</td>
                <td>{{$pengeluaran->uraian }}</td>
                <td>{{$pengeluaran->nominal }}</td>
                <td>
                    <a href="{{ route('pengeluaran.edit', $pengeluaran->id)}}">Edit</a>
                    <form action="{{ route('pengeluaran.destroy', $pengeluaran->id)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Hapus" class="btn btn-danger">
                    </form>
                </td>
             </tr>
         @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
