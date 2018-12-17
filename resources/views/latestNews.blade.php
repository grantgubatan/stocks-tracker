@extends('layouts.app')

@section('content')
<style media="screen">
  .card {
    border: none;
    border-radius: 5px;
  }
  iframe{
    overflow:hidden;
}
</style>

<div class="container page-wrapper chiller-theme toggled" id="app-6">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
          <div class="row">
            <div class="card shadow-sm p-3 mb-5 bg-white rounded col-6 col-offset-2">
              <div class="card-body mr-2">
                <h1 class="blue-header"> Latest Market News</h1>
                <iframe src="https://api.stocktwits.com/widgets/stream?width=630&height=600&scrollbars=true&streaming=true&limit=20&title=MARKET%20NEWS&symbol=AAPL&border_color=cecece&box_color=f5f5f5&header_text_color=000000&divider_color=cecece&stream_color=ffffff&divider_type=solid&link_color=4871a8&link_hover_color=4871a8&text_color=000000&time_color=999999"
                width="100%" height="600px" frameBorder="0"></iframe>
              </div>
            </div>



            <div class="card shadow-sm p-3 mb-5 bg-white rounded col-6">
              <div class="card-body">
                <h1 class="blue-header"><i data-feather="trending-up"></i> Market Overview</h1>
                <div class="card-body" style="height:600px">
                  <!-- TradingView Widget BEGIN -->
                  <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <!-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"><span class="blue-text">Market Data</span></a> by TradingView</div> -->
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js" async>
                    {
                    "showChart": true,
                    "locale": "en",
                    "largeChartUrl": "",
                    "width": "100%",
                    "height": "100%",
                    "plotLineColorGrowing": "rgba(60, 188, 152, 1)",
                    "plotLineColorFalling": "rgba(255, 74, 104, 1)",
                    "gridLineColor": "rgba(233, 233, 234, 1)",
                    "scaleFontColor": "rgba(214, 216, 224, 1)",
                    "belowLineFillColorGrowing": "rgba(60, 188, 152, 0.05)",
                    "belowLineFillColorFalling": "rgba(255, 74, 104, 0.05)",
                    "symbolActiveColor": "rgba(242, 250, 254, 1)",
                    "tabs": [
                      {
                        "title": "Indices",
                        "symbols": [
                          {
                            "s": "INDEX:SPX",
                            "d": "S&P 500"
                          },
                          {
                            "s": "INDEX:IUXX",
                            "d": "Nasdaq 100"
                          },
                          {
                            "s": "INDEX:DOWI",
                            "d": "Dow 30"
                          },
                          {
                            "s": "INDEX:NKY",
                            "d": "Nikkei 225"
                          },
                          {
                            "s": "INDEX:DAX",
                            "d": "DAX Index"
                          },
                          {
                            "s": "OANDA:UK100GBP",
                            "d": "FTSE 100"
                          }
                        ],
                        "originalTitle": "Indices"
                      },
                      {
                        "title": "Commodities",
                        "symbols": [
                          {
                            "s": "CME_MINI:ES1!",
                            "d": "E-Mini S&P"
                          },
                          {
                            "s": "CME:E61!",
                            "d": "Euro"
                          },
                          {
                            "s": "COMEX:GC1!",
                            "d": "Gold"
                          },
                          {
                            "s": "NYMEX:CL1!",
                            "d": "Crude Oil"
                          },
                          {
                            "s": "NYMEX:NG1!",
                            "d": "Natural Gas"
                          },
                          {
                            "s": "CBOT:ZC1!",
                            "d": "Corn"
                          }
                        ],
                        "originalTitle": "Commodities"
                      },
                      {
                        "title": "Bonds",
                        "symbols": [
                          {
                            "s": "CME:GE1!",
                            "d": "Eurodollar"
                          },
                          {
                            "s": "CBOT:ZB1!",
                            "d": "T-Bond"
                          },
                          {
                            "s": "CBOT:UD1!",
                            "d": "Ultra T-Bond"
                          },
                          {
                            "s": "EUREX:GG1!",
                            "d": "Euro Bund"
                          },
                          {
                            "s": "EUREX:II1!",
                            "d": "Euro BTP"
                          },
                          {
                            "s": "EUREX:HR1!",
                            "d": "Euro BOBL"
                          }
                        ],
                        "originalTitle": "Bonds"
                      },
                      {
                        "title": "Forex",
                        "symbols": [
                          {
                            "s": "FX:EURUSD"
                          },
                          {
                            "s": "FX:GBPUSD"
                          },
                          {
                            "s": "FX:USDJPY"
                          },
                          {
                            "s": "FX:USDCHF"
                          },
                          {
                            "s": "FX:AUDUSD"
                          },
                          {
                            "s": "FX:USDCAD"
                          }
                        ],
                        "originalTitle": "Forex"
                      }
                    ]
                  }
                    </script>
                  </div>
                  <!-- TradingView Widget END -->
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
<!-- page-content" -->
</div>
@endsection
