@extends('templates.default')

@php
    $title = 'Pengeluaran';
    $preTitle = 'Edit pengeluaran';
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('pengeluaran.update', $pengeluaran->id)}}" class="" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label class="form-label">tanggal</label>
              <input type="text" name="tanggal" class="form-control
              @error('tanggal')
                  is-invalid
              @enderror" 
              placeholder="Tulis tanggal" value="{{ old('tanggal') ?? $pengeluaran->tanggal}}">
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
                placeholder="Tulis uraian" value="{{ old('uraian') ?? $pengeluaran->uraian}}">
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
                placeholder="Tulis nominak" value="{{ old('nominal') ?? $pengeluaran->nominal}}">
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