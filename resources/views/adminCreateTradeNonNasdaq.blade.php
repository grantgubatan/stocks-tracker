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
                          <p> <a href="{{url('client/'.$client->id)}}" class="btn btn-secondary btn-sm">View Profile</a> </p>
                      </div>

                  </div>
                  <hr>
                  <br>
                  <div class="loader-div" hidden style="margin-top:450px">
                    <div id="loader2">
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <form action="{{url('trade-create-non-nasdaq')}}" method="POST">
                            @csrf

                            <div class="" id="first_step">
                              <input type="hidden" name="client_id" id="client_id" value="{{$client->id}}">
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
                                <label for="name" class="col-4 col-form-label">Stock Price</label>

                                <!-- <div class="col-8">
                                  <input id="stock_price" name="stock_price" placeholder="Stock Price" :value="close" class="form-control here" :data-sp="close_raw" type="text" disabled>
                                </div> -->

                                <div class="col-8">
                                  <input id="stock_price" name="stock_price" placeholder="Stock Price" class="form-control here" type="text">
                                </div>
                              </div>


                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">Buy Date</label>
                                <div class="col-8">
                                  <input id="buy_date" name="buy_date" placeholder="Buy Date" class="form-control here" type="date" required>
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
                                  <button id="confirm" type="submit" class="btn btn-secondary">Confirm</button>
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
var buy_date = "";


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
    // stock_price = parseFloat($("#stock_price").attr("data-sp"));
    stock_price = parseFloat($("#stock_price").val());
    qty = $("#qty").val();
    stock_value = stock_price * qty;
    dollar_value = formatDollar(stock_value);
    $("#stock_value").val(stock_value);
    // $('#stock_value').attr('data-sv', stock_value);

  });
}

function wrongStockChecker()
{
  if($("#stock_price").val() == "")
  {
    alert("WRONG STOCK TICKER");
  }
}


$(document).ready(function()
{

  changeValue();
  });
</script>

@endsection
