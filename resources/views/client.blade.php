@extends('layouts.app')

@section('content')

<div class="container page-wrapper chiller-theme toggled" id="app-6">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <h1 class="blue-header"> <i data-feather="user-check"></i> MANAGE CLIENT</h1>
        </div>
        <br>

        <div class="row">
            <div class="col-12">
              <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                <div class="card-header">
                  <h3>{{$client->fullname}}</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">
                    Account Balance:
                    <span class="account_balance" v-cloak>@{{account_balance}}</span>
                  </h5>
                  <p class="card-text">Occupation: {{$client->occupation}}</p>
                  <p class="card-text">Stocks Owned: {{$client->trades->count()}}</p>
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


                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editBalance">
                    Edit Balance
                  </button>
                  @include('partials.editBalance')
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
                  <th>Commands</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($client->trades as $trade)
                      <tr>
                        <td>{{$trade->company}}</td>
                        <td>{{$trade->ticker}}</td>
                        <td>{{$trade->volume}}</td>
                        <td>
                          <a href="{{url('trade/'.$trade->id)}}" class="btn btn-secondary">Trade Status</a>


                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTrade{{$trade->id}}">
                            Delete Trade
                          </button>


                          <!-- Modal -->
                          <div class="modal fade" id="deleteTrade{{$trade->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form class="" action="{{url('trade-delete')}}" method="POST">
                                  @csrf
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Trade - {{$trade->company}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="">
                                      <h2>Are you sure?</h2>
                                      <input type="hidden" name="id" value="{{$trade->id}}" class="form-control">
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary btn-sm">Confirm Deletion</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
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

function formatDollar(num) {
  var p = num.toFixed(2).split(".");
  return "$" + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
      return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
  }, "") + "." + p[1];
}

var app6 = new Vue({
el: '#app-6',
data: {
  account_balance: formatDollar(parseFloat("{{$client->account_balance}}")),
}
});

$(document).ready(function() {
    $('#trades-table').DataTable({
    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>'
    });



});


</script>
@endsection
