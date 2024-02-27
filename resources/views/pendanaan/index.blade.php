@extends('templates.default')

@php
    $title = 'Pendanaan';
    $preTitle = 'Semua Data';
@endphp

@push('page-action')
    <a href="{{ route('pendanaan.create')}}" class="btn btn-primary">Tambah Data</a>
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
         @foreach ($pendanaan as $pendanaan)
             <tr>
                <td>{{$pendanaan->id }}</td>
                <td>{{$pendanaan->tanggal }}</td>
                <td>{{$pendanaan->uraian }}</td>
                <td>{{$pendanaan->nominal }}</td>
                <td>
                    <a href="{{ route('pendanaan.edit', $pendanaan->id)}}">Edit</a>
                    <form action="{{ route('pendanaan.destroy', $pendanaan->id)}}" method="POST">
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
