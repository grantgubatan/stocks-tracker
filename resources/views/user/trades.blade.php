@extends('layouts.app')

@section('content')

<div class="container page-wrapper chiller-theme toggled">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <h1>Manage Trades</h1>
        </div>

      <div class="row">
        <!-- Button trigger modal -->
        <a class="btn btn-secondary btn-sm" href="{{url('create-trade')}}">
          Create Trade
        </a>
      </div>

      <hr>

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
                  @foreach (Auth::user()->client->trades as $trade)
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
