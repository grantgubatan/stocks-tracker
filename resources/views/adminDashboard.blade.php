@extends('layouts.app')

@section('content')

<div class="container page-wrapper chiller-theme toggled">
  <!-- sidebar-wrapper  -->
  <main class="page-content">
      <div class="">
        <!-- <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <h2 class="blue-header"> <i data-feather="trending-up"></i> Market Data </h2>
              <iframe src="https://s.tradingview.com/embed-widget/tickers/?locale=en#%7B%22symbols%22%3A%5B%7B%22title%22%3A%22S%26P%20500%22%2C%22proName%22%3A%22INDEX%3ASPX%22%7D%2C%7B%22title%22%3A%22Nasdaq%20100%22%2C%22proName%22%3A%22INDEX%3AIUXX%22%7D%2C%7B%22title%22%3A%22EUR%2FUSD%22%2C%22proName%22%3A%22FX_IDC%3AEURUSD%22%7D%2C%7B%22title%22%3A%22BTC%2FUSD%22%2C%22proName%22%3A%22BITFINEX%3ABTCUSD%22%7D%2C%7B%22title%22%3A%22ETH%2FUSD%22%2C%22proName%22%3A%22BITFINEX%3AETHUSD%22%7D%5D%2C%22width%22%3A%22100%25%22%2C%22height%22%3A104%2C%22utm_source%22%3A%22www.tradingview.com%22%2C%22utm_medium%22%3A%22widget_new%22%2C%22utm_campaign%22%3A%22tickers%22%7D" width="100%" height="100px" frameBorder="0"></iframe>
            </div>
          </div>
        </div> -->

        <div class="row">
          <h1 class="blue-header"> <i data-feather="grid"></i> Admin Dashboard</h1>
        </div>
        <br>

        <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <h2 class="blue-header"> <i data-feather="trending-up"></i> Market Data </h2>
              <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com" rel="noopener" target="_blank"></a></div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
                {
                "symbols": [
                  {
                    "title": "S&P 500",
                    "proName": "INDEX:SPX"
                  },
                  {
                    "title": "Nasdaq 100",
                    "proName": "INDEX:IUXX"
                  },
                  {
                    "title": "EUR/USD",
                    "proName": "FX_IDC:EURUSD"
                  },
                  {
                    "title": "BTC/USD",
                    "proName": "BITFINEX:BTCUSD"
                  },
                  {
                    "title": "ETH/USD",
                    "proName": "BITFINEX:ETHUSD"
                  }
                ],
                "locale": "en"
              }
                </script>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="card shadow-sm p-3 mb-5 bg-white rounded col-12">
            <div class="card-body">
              <h2 class="blue-header"> <i data-feather="bar-chart"></i> LIVE STOCK MARKET GRAPH</h2>
              <!-- TradingView Widget BEGIN -->
              <div class="tradingview-widget-container" style="width:100%; height:600px;">
                <div id="tradingview_aef1a" style="height:100%"></div>
                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"></a> </div>
                <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
                <script type="text/javascript">
                new TradingView.widget(
                {
                "autosize":true,
                "symbol": "NASDAQ:AAPL",
                "interval": "D",
                "timezone": "Etc/UTC",
                "theme": "Light",
                "style": "1",
                "locale": "en",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "allow_symbol_change": true,
                "details": true,
                "hotlist": true,
                "calendar": true,
                "news": [
                  "headlines"
                ],
                "container_id": "tradingview_aef1a"
              }
                );
                </script>
              </div>
              <!-- TradingView Widget END -->
            </div>
          </div>
        </div>
      </div>
  </main>
<!-- page-content" -->
</div>

<script type="text/javascript">


</script>
@endsection
