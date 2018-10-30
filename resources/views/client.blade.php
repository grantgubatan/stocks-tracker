@extends('layouts.app')

@section('content')

<div class="container page-wrapper chiller-theme toggled">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <h1>MANAGE CLIENT</h1>
        </div>
        <br>

        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3>{{$client->fullname}}</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Stocks Owned: {{$client->trades->count()}}</h5>
                  <p class="card-text">Occupation: {{$client->occupation}}</p>
                  <!-- Button trigger modal -->
                  <a href="{{url('create-trade/client/'. $client->id)}}" class="btn btn-secondary btn-sm">
                    Create Trade
                  </a>

                  @include('partials.clientCreateTrade')

                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewClientProfile">
                    View Profile
                  </button>
                  @include('partials.viewClientProfile')
                </div>
              </div>
            </div>
        </div>

        <br>


        <div class="row">
          <div class="table-responsive">
            <table class="table table-striped" id="trades-table">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Stock Ticker</th>
                  <th>Volume</th>
                  <th>View Stock Status</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($client->trades as $trade)
                      <tr>
                        <td>{{$trade->company}}</td>
                        <td>{{$trade->ticker}}</td>
                        <td>{{$trade->volume}}</td>
                        <td>
                          <a href="{{url('trade/'.$trade->id)}}" class="btn btn-secondary">Stock Status</a>
                        </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </main>
<!-- page-content" -->
</div>

<script type="text/javascript">

$(document).ready(function() {
    $('#trades-table').DataTable({
    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>'
});
} );


</script>
@endsection
