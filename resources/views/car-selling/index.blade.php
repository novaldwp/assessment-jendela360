@extends('layouts.app')

@section('title')
    Penjualan | Assessment Jendela360
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-primary mt-3">
        <div class="card-header text-center"><h4>Daftar Data Penjualan Mobil</h4></div>
        <div class="card-body">
            <a href="{{ route('car-selling.create') }}" class="btn btn-primary">Tambah Data Penjualan Mobil</a>

            @if (session()->has("success"))
            <div class="alert alert-success mt-3">
                    <li>{{ session()->get("success") }}</li>
            </div>
            @endif

            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hovered table-striped table-md">
                  <tr>
                    <th width="4%">#</th>
                    <th>Nama Pembeli</th>
                    <th>Email Pembeli</th>
                    <th>No. Handphone</th>
                    <th>Mobil</th>
                    <th>Harga</th>
                    <th width="15%">Action</th>
                  </tr>
                  @php $i = ($carsellings->currentPage() - 1) * $carsellings->perpage() + 1; @endphp
                  @forelse($carsellings as $car)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $car->name }}</td>
                      <td>{{ $car->email }}</td>
                      <td>{{ $car->phone }}</td>
                      <td>{{ $car->cars->name }}</td>
                      <td>{{ $car->cars->price }}</td>
                      <td>
                          <form action="{{ route('car-selling.destroy', $car->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('car-selling.edit', $car->id) }}" class="btn btn-success" >Edit</a>
                              <button class="btn btn-danger" onClick="return confirm('Are you sure?')">Delete</button>
                          </form>
                      </td>
                  </tr>
                  @empty
                  <tr>
                      <td colspan="5" class="text-center">No Data Available</td>
                  </tr>
                  @endforelse
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">

            {!!$carsellings->links() !!}
              </nav>
            </div>
        </div>
    </div>
</div>
@endsection
