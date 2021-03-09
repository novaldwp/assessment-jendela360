@extends('layouts.app')

@section('title')
    Penjualan | Assessment Jendela360
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-primary mt-3">
        <div class="card-header text-center"><h4>Tambah Data Penjualan Mobil</h4></div>
        <div class="card-body">
            <div class="col-md-12">
                <form action="{{ route('car-selling.store') }}" method="POST" class="needs-validation">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="control-label col-md-2 text-right">Nama Pembeli</label>
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
                        <label for="name" class="control-label col-md-2 text-right">E-mail Pembeli</label>
                        <div class="col-md-9">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" required>
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="control-label col-md-2 text-right">No. Handphone Pembeli</label>
                        <div class="col-md-9">
                            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone') }}" required>
                            @error('phone')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="control-label col-md-2 text-right">Pilihan Mobil</label>
                        <div class="col-md-9">
                            <select name="car_id" id="car_id" class="form-control">
                                <option selected disabled></option>
                                @forelse($cars as $car)
                                    <option value="{{ $car->id }}" {{ $car->id == old('car_id') ? "selected" : ""}}>{{ $car->name }}</option>
                                @empty
                                    <option value="{{ route('cars.create') }}" id="add-cars">Belum ada data mobil, klik untuk tambah data mobil</option>
                                @endforelse
                            </select>
                            @error('car_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-2"></div>
                        <button type="submit" class="btn btn-primary ml-3">Simpan</button>
                        <a href="{{ route('car-selling.index') }}" class="btn btn-default ml-3">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection
