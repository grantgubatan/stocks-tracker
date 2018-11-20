@extends('layouts.app')

@section('content')

<div class="container page-wrapper chiller-theme toggled" id="app-6">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <h1>Manage Trades</h1>
        </div>

      <div class="row">
        <!-- Button trigger modal -->
        <!-- <a class="btn btn-secondary btn-sm" href="{{url('create-trade')}}">
          Create Trade
        </a> -->
      </div>

      <hr>

        <div class="row">
          <div class="table-responsive">
            <table class="table table-striped" id="trades-table">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Stock Ticker</th>
                  <th>Stock Price</th>
                  <th>Volume</th>
                  <th>Initial Investment</th>
                  <th>Current Stock Value</th>
                  <th>Profit / Loss</th>
                  <th>Gain Percentage</th>
                  <th>Buy Date</th>
                  <th>View Stock Status</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($trades as $trade)
                      <tr>
                        <td>{{$trade->company}}</td>
                        <td>{{$trade->ticker}}</td>
                        <td>${{$trade->stock_price}}</td>
                        <td>{{$trade->volume}}</td>
                        <td>${{$trade->initial_investment_value}}</td>
                        <td>${{$trade->current_value}}</td>
                        <td class="profit" data-value="{{$trade->profit}}">{{$trade->profit}}</td>
                        <td class="gain_percentage" data-value="{{$trade->gain_percentage}}">{{$trade->gain_percentage}}%</td>
                        <td>{{ \Carbon\Carbon::parse($trade->created_at)->format('m/d/Y')}}</td>
                        <td>
                          <a href="{{url('trade/'.$trade->id)}}" class="btn btn-secondary">Trade Status</a>
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
function isIterable(obj) {
// checks for null and undefined
if (obj == null) {
  return false;
}
return typeof obj[Symbol.iterator] === 'function';
}

function formatDollar(num) {
  var p = num.toFixed(2).split(".");
  return "$" + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
      return  num=="-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
  }, "") + "." + p[1];
}
$(document).ready(function()
{
    $('#trades-table').DataTable(
    {
      "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>'
    });


    $(".profit").each(function( index )
    {
      var profit = $(this).data('value');

      if(profit < 0)
      {
        $(this).css("background", "#ffbdbd");

      }
      else {
          $(this).css("background", "#caffbd");
      }

    });


    $(".gain_percentage").each(function( index )
    {
      var gain_percentage = $(this).data('value');

      if(gain_percentage < 0)
      {
        $(this).css("background", "#ffbdbd");

      }
      else {
          $(this).css("background", "#caffbd");
      }

    });

});
</script>
@endsection
