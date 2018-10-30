@extends('layouts.app')

@section('content')

<div class="container page-wrapper chiller-theme toggled" id="app-6">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <div class="">
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                          <h1>Create Trade for {{$client->fullname}}</h1>
                      </div>

                  </div>
                  <hr>
                  <div class="loader-div" hidden style="margin-top:250px">
                    <div id="loader2">
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <form action="{{url('create-trade')}}" method="POST">
                            @csrf

                            <div class="" id="first_step">
                              <input type="hidden" name="id" id="client_id" value="{{$client->id}}">
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Company Name</label>
                                <div class="col-8">
                                  <input id="company" name="company" placeholder="Company Name" class="form-control here" type="text">
                                </div>
                              </div>

                              <div class="form-group row">
                                  <label for="name" class="col-4 col-form-label">Stock Ticker</label>

                                <div class="col-8">
                                  <input id="ticker" name="ticker" placeholder="Stock Ticker" class="form-control here" type="text">
                                  <br>
                                  <p> <strong style="color:red">*</strong> <i>Make sure the stock ticker is in all caps and in correct spelling</i> </p>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button id="proceed" type="button" class="btn btn-secondary">Proceed</button>
                                </div>
                              </div>
                            </div>

                            <div class="" id="second_step" hidden>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Stock Price</label>

                                <div class="col-8">
                                  <input id="stock_price" name="stock_price" placeholder="Stock Price" :value="close" class="form-control here" :data-sp="close_raw" type="text" disabled>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Quantity</label>
                                <div class="col-8">
                                  <input id="qty" name="qty" placeholder="Quantity" class="form-control here" type="number" min="1" required>
                                </div>
                              </div>

                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Stock Value</label>
                                <div class="col-8">
                                  <input id="stock_value" name="stock_value" placeholder="Stock Value" class="form-control here" type="text" required>
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button id="confirm" type="button" class="btn btn-secondary">Confirm</button>
                                </div>
                              </div>
                            </div>

                          </form>
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

var client_id = "";
var company = "";
var ticker = "";
var qty = "";
var stock_value = "";



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

function changeValue()
{
  $("#qty").bind('keyup input', function(){
    stock_price = parseFloat($("#stock_price").attr("data-sp"));
    qty = $("#qty").val();
    stock_value = stock_price * qty;
    dollar_value = formatDollar(stock_value);
    $("#stock_value").val(dollar_value);
    $('#stock_value').attr('data-sv', stock_value);

  });
}

function wrongStockChecker()
{
  if($("#stock_price").val() == "")
  {
    alert("WRONG STOCK TICKER");
  }
}

function onConfirmClick()
{

  $("#confirm").click(function()
  {
    var csrf = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url: "{{url('trade-create')}}",
        method: "POST",
        data: {
          '_token': csrf,
          'client_id': client_id,
          'company': company,
          'ticker': ticker,
          'stock_price': stock_price,
          'qty': qty,
          'stock_value': stock_value,


        },
        success: function(data)
        {
          if(data == "ok")
          {
            toastr.success("Success, Page Reloading...");
            $("body").css("pointer-events", "none");
            setTimeout(function(){ location.reload(); }, 2000);
          }
          else {
            console.log(data);
          }
        }
      });
  });
}

$(document).ready(function()
{
  $("#proceed").click(function()
  {
     $('.loader-div').removeAttr('hidden');
     $('#first_step').attr('hidden', true);

     company = $("#company").val();
     ticker = $("#ticker").val().toUpperCase();
     client_id = $("#client_id").val();

    $.ajax({url: "https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol="+$("#ticker").val().toUpperCase()+"&apikey=KB8SMAYO3IWRKMPJ", success: function(result)
    {

        if("Error Message" in result)
        {
          $('.loader-div').attr('hidden', true);
          $('#first_step').removeAttr('hidden');
          toastr.error("Invalid Stock Ticker");
        }
        else
        {
          $("#second_step").removeAttr('hidden');
          $('.loader-div').attr('hidden', true);
            var stock_data_str = JSON.stringify(result);
            var stock_data = JSON.parse(stock_data_str);
            var lastKey;
            var iterator = 0;
            $.each( stock_data, function( key, value )
            {
              $.each(value, function( key2, value2 )
              {
                  var length = value.length;
                  if(!isIterable(value2) && iterator == 0)
                  {
                    Vue.filter('currency', function (value) {
                        return '$' + parseFloat(value).toFixed(2);
                    });

                    var app6 = new Vue({
                    el: '#app-6',
                    data: {
                      open: formatDollar(parseFloat(value2["1. open"])),
                      high: formatDollar(parseFloat(value2["2. high"])),
                      low: formatDollar(parseFloat(value2["3. low"])),
                      close: formatDollar(parseFloat(value2["4. close"])),
                      volume: formatDollar(parseFloat(value2["5. volume"])),
                      close_raw: parseFloat(value2["4. close"]),
                    }
                  });
                    iterator +=1;
                  }
              });
            });
          changeValue();
          onConfirmClick();
        }

    }

  });
  });
});
</script>

@endsection
