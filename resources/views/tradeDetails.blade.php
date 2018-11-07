@extends('layouts.app')

@section('content')
<style media="screen">
  .card {
    border: none;
    border-radius: 5px;
  }
</style>

@if($trade->status === "Bought")
<div class="container page-wrapper chiller-theme toggled" id="app-6">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <h1>{{$trade->company}}: {{$trade->ticker}}</h1>
              <h4>Owner: {{$trade->client->fullname}}</h4>
              <div class="">

                @if(Auth::user()->role == 'admin')
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#sellTrade{{$trade->id}}">
                  Sell Trade
                </button>
                @endif


                <!-- Modal -->
                <div class="modal fade" id="sellTrade{{$trade->id}}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form class="" action="{{url('trade-sell')}}" method="POST">
                        @csrf
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Sell Trade -  {{$trade->company}}?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="">
                            <h2>Are you sure?</h2>
                            <input type="hidden" name="id" value="{{$trade->id}}" class="form-control">
                            <input type="hidden" name="sold_value" :value="current_value_decim" class="form-control">
                            <input type="hidden" name="profit" :value="profit_decim" class="form-control">
                            <input type="hidden" name="gain_percentage" :value="gain_percentage_decim" class="form-control">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-secondary btn-sm">Confirm</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-6">
                  <h4>Current Stock Price</h4>
                  <p><span v-cloak>@{{close}}</span></p>
                </div>

                <div class="col-6">
                  <h4>Quantity</h4>
                  <p>{{$trade->volume}}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <h4>Initial Investment</h4>
                  <p class="initial_value">{{$trade->initial_investment_value}}</p>
                </div>

                <div class="col-6">
                  <h4>Current Investment Value</h4>
                  <p><span v-cloak>@{{current_value}}</span></p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <h4>Profit</h4>
                  <p><span v-cloak>@{{profit}}</span></p>
                </div>

                <div class="col-6">
                  <h4>Gain Percentage</h4>
                  <p class="colorize"><span v-cloak>@{{gain_percentage_decim}}%</span></p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <h1>Tabular Details</h1>
              <p>Buy Date: {{ \Carbon\Carbon::parse($trade->created_at)->format('m/d/Y')}}</p>



                        <div class="table-responsive text-center">

                          <div class="loader-div" style="margin-top:23px;">
                            <div id="loader" style="margin-top:23px;">

                            </div>
                          </div>

                          <table class="table table-striped" id="stock_data" hidden>
                            <thead>
                              <tr>
                                <th>Company Name</th>
                                <th>Stock Ticker</th>
                                <th>Quantity</th>
                                <th>Stock Price</th>
                                <th>Initial Investment</th>
                                <th>Current Value</th>
                                <th>Profit</th>
                                <th>Gain</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>{{$trade->company}}</td>
                                <td>{{$trade->ticker}}</td>
                                <td>{{$trade->volume}}</td>
                                <td><span v-cloak>@{{close}}</span></td>
                                <td class="initial_value">{{$trade->initial_investment_value}}</td>
                                <td><span v-cloak>@{{current_value}}</span></td>
                                <td><span v-cloak>@{{profit}}</span></td>
                                <td><span v-cloak>@{{gain_percentage_decim}}%</span></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <div class="row">
                          <!-- <iframe src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_d6831&symbol={{$trade->ticker}}%3A&interval=D&symboledit=1&saveimage=1&toolbarbg=f1f3f6&details=1&news=1&studies=%5B%5D&newsvendors=stocktwits%1Fheadlines&hideideas=1&theme=Light&style=1&timezone=Etc%2FUTC&studies_overrides=%7B%7D&overrides=%7B%7D&enabled_features=%5B%5D&disabled_features=%5B%5D&locale=en&utm_medium=widget&utm_campaign=chart&utm_term=AMZN%3A"
                          width="100%" height="600px" frameBorder="0"></iframe> -->
                        </div>
            </div>
          </div>


        </div>

        <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <h1>Trade History</h1>
              <div class="row">
                <div class="col-4">
                  <h3>Buy Date</h3>
                  <p>{{ \Carbon\Carbon::parse($trade->created_at)->format('m/d/Y')}}</p>
                </div>

                <div class="col-4">
                  <h3>Sell Date</h3>
                  <p>{{  $trade->sell_date === null ? "--" : \Carbon\Carbon::parse($trade->sell_date)->format('m/d/Y') }}</p>
                </div>

                <div class="col-4">
                  <h3>Stock Status</h3>
                  <p>{{$trade->status}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
  </main>
<!-- page-content" -->
</div>


<script type="text/javascript">
var initial_value = "";
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

$( document ).ready(function() {

    $.ajax({url: "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol="+"{{$trade->ticker}}"+"&apikey=KB8SMAYO3IWRKMPJ", success: function(result){

        $(".loader-div").hide();
        $("#stock_data").removeAttr('hidden');
        var stock_data_str = JSON.stringify(result);
        var stock_data = JSON.parse(stock_data_str);
        var lastKey;
        var iterator = 0;
        $.each( stock_data, function( key, value ) {
          $.each(value, function( key2, value2 ) {
              var length = value.length;
              if(!isIterable(value2) && iterator == 0)
              {

                // console.log(key2);
                // // 1. open: "219.9000"
                // // 2. high: "219.9700"
                // // 3. low: "219.1900"
                // // 4. close: "219.2300"
                // // 5. volume: "975125"
                // console.log("OPEN:"+value2["1. open"]);
                // console.log("HIGH:"+value2["2. high"]);
                // console.log("LOW:"+value2["3. low"]);
                // console.log("CLOSE:"+value2["4. close"]);
                // console.log("VOLUME:"+value2["5. volume"]);

                Vue.filter('currency', function (value) {
                    return '$' + parseFloat(value).toFixed(2);
                });
                current_value = value2["4. close"] * "{{$trade->volume}}";
                current_value_decim = value2["4. close"] * "{{$trade->volume}}";
                initial_investment_price = "{{$trade->initial_investment_value}}";
                profit = current_value.toFixed(2) - parseFloat(initial_investment_price).toFixed(2);
                gain_percentage = (profit / parseFloat(initial_investment_price).toFixed(2)) * 100;
                var app6 = new Vue({
                el: '#app-6',
                data: {
                  open: formatDollar(parseFloat(value2["1. open"])),
                  high: formatDollar(parseFloat(value2["2. high"])),
                  low: formatDollar(parseFloat(value2["3. low"])),
                  close: formatDollar(parseFloat(value2["4. close"])),
                  volume: formatDollar(parseFloat(value2["5. volume"])),
                  current_value: formatDollar(parseFloat(current_value)),
                  current_value_decim: current_value_decim.toFixed(2),
                  profit: formatDollar(profit),
                  profit_decim: profit.toFixed(2),
                  gain_percentage: gain_percentage,
                  gain_percentage_decim: gain_percentage.toFixed(2),

                }
              });

                iterator +=1;


              }
          });
        });

        initial_value = $(".initial_value").text();
        initial_value = formatDollar(parseFloat(initial_value));
        $(".initial_value").text(initial_value);

        if(gain_percentage == 0)
        {
          $(".colorize").addClass("zero");
        }
        else if(gain_percentage > 0)
        {
          $(".colorize").addClass("gain");
        }
        else if(gain_percentage < 0)
        {
          $(".colorize").addClass("loss");
        }
    }});
});
</script>

@else
<div class="container page-wrapper chiller-theme toggled">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <div class="row">

                <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
                  <div class="card-body">
                    <h1>{{$trade->company}}: {{$trade->ticker}}</h1>
                    <h4>Owner: {{$trade->client->fullname}}</h4>
                    <hr>
                    <div class="row">
                      <div class="col-6">
                        <h4>Initial Investment</h4>
                        <p>{{$trade->initial_investment_value}}</p>
                      </div>

                      <div class="col-6">
                        <h4>Sold Value</h4>
                        <p>{{$trade->sold_value}}</p>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-6">
                        <h4>Profit</h4>
                        <p id="profit" data-profit="{{$trade->profit}}">{{$trade->profit}}</p>
                      </div>

                      <div class="col-6">
                        <h4>Gain Percentage</h4>
                        <p id="gp" class="colorize" data-percentage="{{$trade->gain_percentage}}">{{$trade->gain_percentage}}%</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


              <h1>Trade History</h1>
              <div class="row">
                <div class="col-4">
                  <h3>Buy Date</h3>
                  <p>{{ \Carbon\Carbon::parse($trade->created_at)->format('m/d/Y')}}</p>
                </div>

                <div class="col-4">
                  <h3>Sell Date</h3>
                  <p>{{  $trade->sell_date === null ? "--" : \Carbon\Carbon::parse($trade->sell_date)->format('m/d/Y') }}</p>
                </div>

                <div class="col-4">
                  <h3>Stock Status</h3>
                  <p class="gain">{{$trade->status}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
<!-- page-content" -->
</div>

<script type="text/javascript">
  $(document).ready(function()
  {
    gain_percentage = $("#gp").data("percentage");
    if(gain_percentage == 0)
    {
      $(".colorize").addClass("zero");
    }
    else if(gain_percentage > 0)
    {
      $(".colorize").addClass("gain");
    }
    else if(gain_percentage < 0)
    {
      $(".colorize").addClass("loss");
    }

  });
</script>

@endif
@endsection
