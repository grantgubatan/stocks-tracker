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
            <div class="card shadow-sm p-3 mb-5 bg-white rounded col-6">
              <div class="card-body">
                <h1>Latest Market News</h1>
                <iframe src="https://api.stocktwits.com/widgets/stream?width=630&height=600&scrollbars=true&streaming=true&limit=20&title=MARKET%20NEWS&symbol=AAPL&border_color=cecece&box_color=f5f5f5&header_text_color=000000&divider_color=cecece&stream_color=ffffff&divider_type=solid&link_color=4871a8&link_hover_color=4871a8&text_color=000000&time_color=999999"
                width="100%" height="600px" frameBorder="0"></iframe>
              </div>
            </div>

            <div class="card shadow-sm p-3 mb-5 bg-white rounded col-6">
              <div class="card-body">
                <h1>Market Overview</h1>
                <div class="card-body">
                <iframe src="https://s.tradingview.com/embed-widget/market-overview/?locale=en#%7B\"showChart\"%3Atrue%2C\"width\"%3A\"300\"%2C\"height\"%3A\"550\"%2C\"plotLineColorGrowing\"%3A\"rgba(60%2C%20188%2C%20152%2C%201)\"%2C\"plotLineColorFalling\"%3A\"rgba(255%2C%2074%2C%20104%2C%201)\"%2C\"gridLineColor\"%3A\"rgba(233%2C%20233%2C%20234%2C%201)\"%2C\"scaleFontColor\"%3A\"rgba(218%2C%20221%2C%20224%2C%201)\"%2C\"belowLineFillColorGrowing\"%3A\"rgba(60%2C%20188%2C%20152%2C%200.05)\"%2C\"belowLineFillColorFalling\"%3A\"rgba(255%2C%2074%2C%20104%2C%200.05)\"%2C\"symbolActiveColor\"%3A\"rgba(242%2C%20250%2C%20254%2C%201)\"%2C\"tabs\"%3A%5B%7B\"title\"%3A\"Equities\"%2C\"symbols\"%3A%5B%7B\"s\"%3A\"INDEX%3ASPX\"%2C\"d\"%3A\"S%26P%20500\"%7D%2C%7B\"s\"%3A\"INDEX%3AIUXX\"%2C\"d\"%3A\"Nasdaq%20100\"%7D%2C%7B\"s\"%3A\"INDEX%3ADOWI\"%2C\"d\"%3A\"Dow%2030\"%7D%2C%7B\"s\"%3A\"INDEX%3ANKY\"%2C\"d\"%3A\"Nikkei%20225\"%7D%2C%7B\"s\"%3A\"NASDAQ%3AAAPL\"%2C\"d\"%3A\"Apple\"%7D%2C%7B\"s\"%3A\"NASDAQ%3AGOOG\"%2C\"d\"%3A\"Google\"%7D%5D%7D%2C%7B\"title\"%3A\"Commodities\"%2C\"symbols\"%3A%5B%7B\"s\"%3A\"CME_MINI%3AES1!\"%2C\"d\"%3A\"E-Mini%20S%26P\"%7D%2C%7B\"s\"%3A\"CME%3AE61!\"%2C\"d\"%3A\"Euro\"%7D%2C%7B\"s\"%3A\"COMEX%3AGC1!\"%2C\"d\"%3A\"Gold\"%7D%2C%7B\"s\"%3A\"NYMEX%3ACL1!\"%2C\"d\"%3A\"Crude%20Oil\"%7D%2C%7B\"s\"%3A\"NYMEX%3ANG1!\"%2C\"d\"%3A\"Natural%20Gas\"%7D%2C%7B\"s\"%3A\"CBOT%3AZC1!\"%2C\"d\"%3A\"Corn\"%7D%5D%7D%2C%7B\"title\"%3A\"Bonds\"%2C\"symbols\"%3A%5B%7B\"s\"%3A\"CME%3AGE1!\"%2C\"d\"%3A\"Eurodollar\"%7D%2C%7B\"s\"%3A\"CBOT%3AZB1!\"%2C\"d\"%3A\"T-Bond\"%7D%2C%7B\"s\"%3A\"CBOT%3AUD1!\"%2C\"d\"%3A\"Ultra%20T-Bond\"%7D%2C%7B\"s\"%3A\"EUREX%3AGG1!\"%2C\"d\"%3A\"Euro%20Bund\"%7D%2C%7B\"s\"%3A\"EUREX%3AII1!\"%2C\"d\"%3A\"Euro%20BTP\"%7D%2C%7B\"s\"%3A\"EUREX%3AHR1!\"%2C\"d\"%3A\"Euro%20BOBL\"%7D%5D%7D%2C%7B\"title\"%3A\"Forex\"%2C\"symbols\"%3A%5B%7B\"s\"%3A\"FX%3AEURUSD\"%7D%2C%7B\"s\"%3A\"FX%3AGBPUSD\"%7D%2C%7B\"s\"%3A\"FX%3AUSDJPY\"%7D%2C%7B\"s\"%3A\"FX%3AUSDCHF\"%7D%2C%7B\"s\"%3A\"FX%3AAUDUSD\"%7D%2C%7B\"s\"%3A\"FX%3AUSDCAD\"%7D%5D%7D%5D%2C\"utm_source\"%3A\"elliotandjones.com\"%2C\"utm_medium\"%3A\"widget\"%2C\"utm_campaign\"%3A\"market-overview\"%7D" width="100%" height="600px" frameBorder="0"></iframe>
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
