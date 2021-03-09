@extends('layouts.app')

@section('title')
    Dashboard | Assessment Jendela360
@endsection

@section('content')
<div class="col-md-12">
    <div class="card card-primary mt-3">
        <div class="card-header text-center"><h4>Data Penjualan Hari Ini</h4></div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hovered table-striped table-md">
                  <tr>
                    <th>Mobil Yang Paling Banyak Dijual</th>
                    <th>Penjualan Hari Ini</th>
                    <th>Total Penjualan Hari Ini</th>
                  </tr>
                  @if($sellingtoday)
                  <tr>
                      <td>{{ $sellingtoday->cars->name }}</td>
                      <td>{{ $sellingtoday->total_selling}} ( {{ $totalDiffAmount > 0 ? "+":"-"}}{{ $totalDiffAmount }}% )</td>
                      <td>Rp. {{ number_format($sellingtoday->cars->price * $sellingtoday->total_selling, 0) }} ( {{ $totalDiffPrice > 0 ? "+":"-"}}{{ $totalDiffPrice }}% )</td>
                  </tr>
                  @else
                  <tr>
                      <td colspan="3" class="text-center">No Data Available</td>
                  </tr>
                  @endif
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">

              </nav>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card card-primary mt-3">
        <div class="card-header text-center"><h4>Data 7 Hari Terakhir</h4></div>
        <div class="card-body">
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-hovered table-striped table-md">
                  <tr>
                    <th>Mobil Yang Paling Banyak Dijual</th>
                    <th>Penjualan Hari Ini</th>
                    <th>Total Penjualan Hari Ini</th>
                  </tr>
                  @if($sellingweek)
                  <tr>
                      <td>{{ $sellingweek->cars->name }}</td>
                      <td>{{ $sellingweek->total_selling}}</td>
                      <td>Rp. {{ number_format($sellingweek->cars->price * $sellingweek->total_selling, 0) }}</td>
                  </tr>
                  @else
                  <tr>
                      <td colspan="5" class="text-center">No Data Available</td>
                  </tr>
                  @endif
                </table>
              </div>
            </div>
            <div class="card-footer text-right">
              <nav class="d-inline-block">

              </nav>
            </div>
        </div>
    </div>
</div>
@endsection
