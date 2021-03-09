@extends('layouts.app')

@section('title')
    Mobil | Assessment Jendela360
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-primary mt-3">
        <div class="card-header text-center"><h4>Daftar Data Mobil</h4></div>
        <div class="card-body">
            <a href="{{ route('cars.create') }}" class="btn btn-primary">Tambah Data Mobil</a>

            @if (session()->has("success"))
            <div class="alert alert-success mt-3">
                    <li>{{ session()->get("success") }}</li>
            </div>
            @endif

            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hovered table-striped table-md">
                  <tr>
                    <th width="4%">#</th>
                    <th>Nama Mobil</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th width="15%">Action</th>
                  </tr>
                  @php $i = ($cars->currentPage() - 1) * $cars->perpage() + 1; @endphp
                  @forelse($cars as $car)
                  <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{ $car->name }}</td>
                      <td>{{ $car->price }}</td>
                      <td>{{ $car->stock }}</td>
                      <td>
                          <form action="{{ route('cars.destroy', $car->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-success" >Edit</a>
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

            {!!$cars->links() !!}
              </nav>
            </div>
        </div>
    </div>
</div>
@endsection
