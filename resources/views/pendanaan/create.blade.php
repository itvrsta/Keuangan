@extends('templates.default')

@php
    $title = 'Pendanaan';
    $preTitle = 'Tambah Data';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('pendanaan.store')}}" class="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label class="form-label">tanggal</label>
              <input type="text" name="tanggal" class="form-control 
              @error('tanggal')
                  is-invalid
              @enderror"
              placeholder="Tulis tanggal">
              @error('tanggal')
              <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">uraian</label>
                <input type="text" name="uraian" class="form-control 
                @error('uraian')
                    is-invalid
                @enderror"
                placeholder="Tulis uraian">
                @error('uraian')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="mb-3">
                <label class="form-label">nominal</label>
                <input type="text" name="nominal" class="form-control 
                @error('nominal')
                    is-invalid
                @enderror"
                placeholder="Tulis nominal">
                @error('nominal')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <div class="nb-3">
                <input type="submit" value="Simpan" class="submit btn btn-primary">
              </div>
        </form>
    </div>
</div>
@endsection