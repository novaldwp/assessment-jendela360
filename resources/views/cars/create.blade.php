@extends('layouts.app')

@section('title')
    Tambah Mobil | Assessment Jendela360
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-primary mt-3">
        <div class="card-header text-center"><h4>Tambah Data Mobil</h4></div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('cars.store') }}" method="POST" class="needs-validation">
                    @csrf
                    {{-- {{ dd($errors) }} --}}
                    <div class="form-group row">
                        <label for="name" class="control-label col-md-2 text-right">Nama Mobil</label>
                        <div class="col-md-9">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="control-label col-md-2 text-right">Harga Mobil</label>
                        <div class="col-md-9">
                            <input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                            value="{{ old('price') }}" required>
                            @error('price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="control-label col-md-2 text-right">Stok Mobil</label>
                        <div class="col-md-9">
                            <input type="text" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror"
                            value="{{ old('stock') }}" required>
                            @error('stock')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <button type="submit" class="btn btn-primary ml-3">Simpan</button>
                        <a href="{{ route('cars.index') }}" class="btn btn-default ml-3">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- </section> --}}
@endsection
