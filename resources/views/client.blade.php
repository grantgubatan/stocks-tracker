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
                  <h3>{{$client->salutation}}. {{$client->fullname}}</h3>
                </div>
                <div class="card-body">
                  <h5 class="card-title">
                    Account Balance:
                    <span class="account_balance" v-cloak>@{{account_balance}}</span>
                  </h5>
                  <p class="card-text">Occupation: {{$client->occupation}}</p>
                  <p class="card-text">Stocks Owned: {{$client->trades->count()}}</p>

                  <div class="row" style="text-align:center">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                      <!-- Button trigger modal -->
                      <a href="{{url('create-trade/client/'. $client->id)}}" class="btn btn-secondary btn-sm">
                        Create Trade (NASDAQ)
                      </a>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-3">
                      <a href="{{url('create-trade-non-nasdaq/client/'. $client->id)}}" class="btn btn-secondary btn-sm">
                        Create Trade (Non NASDAQ)
                      </a>

                      @include('partials.clientCreateTrade')

                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-3">
                      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#viewClientProfile">
                        View Profile
                      </button>
                      @include('partials.viewClientProfile')
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-3">
                      <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editBalance">
                        Edit Balance
                      </button>
                      @include('partials.editBalance')
                    </div>
                  </div>
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
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editTrade{{$trade->id}}">
                            Edit Trade
                          </button>


                          <!-- Modal -->
                          <div class="modal fade" id="editTrade{{$trade->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <form class="" action="{{url('trade-edit')}}" method="POST">
                                  @csrf
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Trade - {{$trade->company}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <div class="">
                                      <h2>Are you sure?</h2>
                                      <input type="hidden" name="id" value="{{$trade->id}}" class="form-control">

                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Company</label>
                                        <div class="col-8">
                                          <input id="company" name="company" placeholder="Company" value="{{$trade->company}}" class="form-control here" type="text">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Ticker</label>
                                        <div class="col-8">
                                          <input id="ticker" name="ticker" placeholder="Ticker" value="{{$trade->ticker}}" class="form-control here" type="text">
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Stock Price</label>

                                        <!-- <div class="col-8">
                                          <input id="stock_price" name="stock_price" placeholder="Stock Price" :value="close" class="form-control here" :data-sp="close_raw" type="text" disabled>
                                        </div> -->

                                        <div class="col-8">
                                          <input id="stock_price" name="stock_price" placeholder="Stock Price" value="{{$trade->initial_stock_price}}" class="form-control here" type="text">
                                        </div>
                                      </div>


                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Buy Date</label>
                                        <div class="col-8">
                                          @if ($trade->buy_date !== null)
                                            <input id="buy_date" name="buy_date" placeholder="Buy Date" class="form-control here" type="date" value="{{$trade->buy_date->format('Y-m-d')}}">
                                          @else
                                          <input id="buy_date" name="buy_date" placeholder="Buy Date" class="form-control here" type="date">
                                          @endif
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Due Date</label>
                                        <div class="col-8">
                                          @if ($trade->due_date !== null)
                                            <input id="due_date" name="due_date" placeholder="Due Date" class="form-control here" type="date" value="{{$trade->due_date->format('Y-m-d')}}">
                                          @else
                                          <input id="due_date" name="due_date" placeholder="Due Date" class="form-control here" type="date">
                                          @endif
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Quantity</label>
                                        <div class="col-8">
                                          <input id="qty" name="qty" placeholder="Quantity" class="form-control here" value="{{$trade->volume}}" type="number" min="1" required>
                                        </div>
                                      </div>

                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Stock Value</label>
                                        <div class="col-8">
                                          <input id="stock_value" name="stock_value" value="{{$trade->initial_investment_value}}" placeholder="Stock Value" class="form-control here" type="text" required>
                                        </div>
                                      </div>


                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Stock Status</label>
                                        <div class="col-8">
                                          <select class="form-control" id="stock_status" name="stock_status">
                                            <option value="">Select Status</option>
                                            <option value="Overdue" {{ ( $trade->status == 'Overdue') ? 'selected' : '' }}>Overdue</option>
                                            <option value="Outstanding" {{ ( $trade->status == 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                            <option value="Settled" {{ ( $trade->status == 'Settled') ? 'selected' : '' }}>Settled</option>
                                            <option value="Sell Order" {{ ( $trade->status == 'Sell Order') ? 'selected' : '' }}>Sell Order</option>
                                          </select>
                                        </div>
                                      </div>


                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-secondary btn-sm">Confirm Changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>


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


        <br>
        <div class="row">
          <h3>Transaction History</h3>

          <div class="table-responsive">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Add Transaction History
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Transaction History for {{$client->fullname}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form class="" action="{{url('add-th')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                      <input type="hidden" name="client_id"  value="{{$client->id}}">
                      <div class="">
                        <label for="">Stock</label>
                        <input type="text" class="form-control" placeholder="Stock" name="stock" required>
                      </div>

                      <div class="">
                          <label for="">Profit/Loss</label>
                          <input type="text" name="profit" class="form-control" placeholder="Profit Loss" value="">
                      </div>

                      <div class="">
                        <label for="">Stock Status</label>
                        <select class="form-control" id="stock_status" name="stock_status">
                          <option value="">Select Status</option>
                          <option value="Overdue">Overdue</option>
                          <option value="Outstanding">Outstanding</option>
                          <option value="Settled">Settled</option>
                          <option value="Sell Order">Sell Order</option>
                        </select>
                      </div>

                      <div class="">
                        <label for="name" class="col-4 col-form-label">Buy Date</label>
                        <input id="buy_date" name="buy_date" placeholder="Buy Date" class="form-control here" type="date">
                      </div>

                      <div class="">
                        <label for="name" class="col-4 col-form-label">Sell Date</label>
                        <input id="sell_date" name="sell_date" placeholder="Buy Date" class="form-control here" type="date">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <hr>
            <table class="table table-striped" id="trades-table2">
              <thead>
                <tr>
                  <td>Stock</td>
                  <td>Profit / Loss</td>
                  <td>Buy Date</td>
                  <td>Sell Date</td>
                  <th>Stock Status</th>
                  <th>Commands</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($client->trade_histories as $th)
                      <tr>
                        <td>{{$th->stock}}</td>
                        <td>{{$th->profit}}</td>
                        <td>{{  $th->buy_date === null ? "--" : \Carbon\Carbon::parse($th->buy_date)->format('m/d/Y') }}</td>
                        <td>{{  $th->sell_date === null ? "--" : \Carbon\Carbon::parse($th->sell_date)->format('m/d/Y') }}</td>
                        <td>{{$th->stock_status}}</td>
                        <td>


                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editTH{{$th->id}}">
                            Edit
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="editTH{{$th->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Transaction History for {{$client->fullname}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form class="" action="{{url('edit-th')}}" method="POST">
                                  @csrf
                                  <div class="modal-body">
                                    <input type="hidden" name="th_id"  value="{{$th->id}}">
                                    <div class="">
                                      <label for="">Stock</label>
                                      <input type="text" class="form-control" placeholder="Stock" name="stock" value="{{$th->stock}}" required>
                                    </div>

                                    <div class="">
                                        <label for="">Profit/Loss</label>
                                        <input type="text" name="profit" class="form-control" placeholder="Profit Loss" value="{{$th->profit}}">
                                    </div>

                                    <div class="">
                                      <label for="">Stock Status</label>
                                      <select class="form-control" id="stock_status" name="stock_status">
                                        <option value="" >Select Status</option>
                                        <option value="Overdue" {{ ( $th->stock_status == 'Overdue') ? 'selected' : '' }}>Overdue</option>
                                        <option value="Outstanding" {{ ( $th->stock_status == 'Outstanding') ? 'selected' : '' }}>Outstanding</option>
                                        <option value="Settled" {{ ( $th->stock_status == 'Settled') ? 'selected' : '' }}>Settled</option>
                                        <option value="Sell Order" {{ ( $th->stock_status == 'Sell Order') ? 'selected' : '' }}>Sell Order</option>
                                      </select>
                                    </div>

                                    <div class="">
                                      <label for="name" class="col-4 col-form-label">Buy Date</label>
                                      @if ($th->buy_date !== null)
                                      <input id="buy_date" name="buy_date" placeholder="Buy Date" class="form-control here" type="date" value="{{$th->buy_date->format('Y-m-d')}}">
                                      @else
                                      <input id="buy_date" name="buy_date" placeholder="Buy Date" class="form-control here" type="date">
                                      @endif
                                    </div>

                                    <div class="">
                                      <label for="name" class="col-4 col-form-label">Sell Date</label>
                                      @if ($th->buy_date !== null)
                                      <input id="sell_date" name="sell_date" placeholder="Buy Date" class="form-control here" type="date" value="{{$th->buy_date->format('Y-m-d')}}">
                                      @else
                                      <input id="sell_date" name="sell_date" placeholder="Buy Date" class="form-control here" type="date">
                                      @endif
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirm Changes</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>


                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteTH{{$th->id}}">
                            Delete
                          </button>

                          <!-- Modal -->
                          <div class="modal fade" id="deleteTH{{$th->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Delete Transaction History for {{$client->fullname}}</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form class="" action="{{url('delete-th')}}" method="POST">
                                  @csrf
                                  <div class="modal-body">
                                    <input type="hidden" name="th_id"  value="{{$th->id}}">
                                    <h3>Are you sure to remove  this transaction history?</h3>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>


                        </td>
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

var client_id = "";
var company = "";
var ticker = "";
var qty = "";
var stock_value = "";
var buy_date = "";


function changeValue()
{
  $("#qty").bind('keyup input', function(){
    // stock_price = parseFloat($("#stock_price").attr("data-sp"));
    stock_price = parseFloat($("#stock_price").val());
    qty = $("#qty").val();
    stock_value = stock_price * qty;
    stock_value = stock_value.toFixed(2);
    // dollar_value = formatDollar(stock_value);
    $("#stock_value").val(stock_value);
    // $('#stock_value').attr('data-sv', stock_value);

  });
}

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

    $('#trades-table2').DataTable({
    "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>'
    });

    changeValue();

});


</script>
@endsection
