@extends('layouts.app')

@section('content')
<style media="screen">
  .card {
    border: none;
    border-radius: 5px;
  }
</style>
<div class="container page-wrapper chiller-theme toggled" id="app-6">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <h1>{{$trade->company}}: {{$trade->ticker}}</h1>
              <h4>Owner: {{$trade->client->fullname}}</h4>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <h1>Trade Details</h1>
              <p>Date Invested: {{ \Carbon\Carbon::parse($trade->created_at)->format('m/d/Y')}}</p>



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
                                <th>Date Invested</th>
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
                                <td>{{ \Carbon\Carbon::parse($trade->created_at)->format('m/d/Y')}}</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <div class="row">
                          <iframe src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_d6831&symbol={{$trade->ticker}}%3A&interval=D&symboledit=1&saveimage=1&toolbarbg=f1f3f6&details=1&news=1&studies=%5B%5D&newsvendors=stocktwits%1Fheadlines&hideideas=1&theme=Light&style=1&timezone=Etc%2FUTC&studies_overrides=%7B%7D&overrides=%7B%7D&enabled_features=%5B%5D&disabled_features=%5B%5D&locale=en&utm_medium=widget&utm_campaign=chart&utm_term=AMZN%3A"
                          width="100%" height="600px" frameBorder="0"></iframe>
                        </div>
            </div>
          </div>


        </div>

        <div class="row">

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
                profit = (current_value - "{{$trade->initial_investment_value}}") * "{{$trade->volume}}";
                var app6 = new Vue({
                el: '#app-6',
                data: {
                  open: formatDollar(parseFloat(value2["1. open"])),
                  high: formatDollar(parseFloat(value2["2. high"])),
                  low: formatDollar(parseFloat(value2["3. low"])),
                  close: formatDollar(parseFloat(value2["4. close"])),
                  volume: formatDollar(parseFloat(value2["5. volume"])),
                  current_value: formatDollar(parseFloat(current_value)),
                  profit: formatDollar(profit),
                }
              });

                iterator +=1;


              }
          });
        });

        initial_value = $(".initial_value").text();
        initial_value = formatDollar(parseFloat(initial_value));
        $(".initial_value").text(initial_value);
    }});
});
</script>
@endsection
