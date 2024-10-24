@include('user.layouts.header')
    <div class="page_title_section dashboard_title">

        <div class="page_header">
            <div class="container">
                <div class="row small">

                    <div class="col-xl-9 col-lg-7 col-md-7 col-12 col-sm-7 d-flex align-items-end">
                        <h5 class="text-white static">My Account </h5>
                    </div>
                    
                    <div class="col-xl-3 col-lg-5 col-md-5 col-12 col-sm-5">
                        <div class="sub_title_section">
                            <ul class="sub_title">
                                <li> <a href="#"> Home </a>&nbsp; / &nbsp; </li>
                                <li>My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner header wrapper end -->
	@include('user.layouts.sidebar')
         <div class="l-main pt-lg-5 mt-lg-5">         
            <div class="d-none d-lg-block">
                <br><br>
            </div>
            <div class="account_wrapper pt-lg-5 mt-lg-5 float_left">
                <div class="account_overlay"></div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-between pb-5">
                        <a href="/user/deposit">
                            <button class='btn btn-outline-success'>
                             Deposit
                            </button>
                        </a>
                        <a href="/user/withdrawal">
                         <button class='btn btn-outline-primary'>
                             Withdrawal
                         </button>
                         </a>
                     </div>
                </div>
                <div class="row" style="margin-bottom: 3px">
                    <div class="col-12 text-light">
                        <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
  {
  "width": "100%",
  "height": "100%",
  "currencies": [
    "EUR",
    "USD",
    "JPY",
    "GBP",
    "CHF",
    "AUD",
    "CAD",
    "NZD",
    "CNY"
  ],
  "isTransparent": false,
  "colorTheme": "light",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-light">
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
                            {
                            "symbols": [
                            {
                                "proName": "FOREXCOM:SPXUSD",
                                "title": "S&P 500"
                            },
                            {
                                "proName": "FOREXCOM:NSXUSD",
                                "title": "Nasdaq 100"
                            },
                            {
                                "proName": "FX_IDC:EURUSD",
                                "title": "EUR/USD"
                            },
                            {
                                "proName": "BITSTAMP:BTCUSD",
                                "title": "BTC/USD"
                            },
                            {
                                "proName": "BITSTAMP:ETHUSD",
                                "title": "ETH/USD"
                            }
                            ],
                            "showSymbolLogo": false,
                            "colorTheme": "dark",
                            "isTransparent": false,
                            "displayMode": "adaptive",
                            "locale": "en"
                        }
                            </script>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">
                            <h3>my account</h3>
                        </div>
                    </div>
                     
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="investment_box_wrapper user-account-info-box float_left d-flex flex-column justify-content-center align-items-center">
                                <div class="investment_icon_wrapper float_left">
                                    <i class="ti-stats-up text-info"></i>
                                    <h5 class="text-whit font-weight-bold">Current Invested</h5>
                                </div>
                                <div class="invest_details float_left">
                                    <table class="invest_table">
                                        <tbody>
                                            <tr>
                                                <td class="invest_td1"> 
                                                    <h5 class="text-info">    ${{ $user['currently_invested'] }} </h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="investment_box_wrapper user-account-info-box float_left d-flex flex-column justify-content-center align-items-center">
                                <div class="investment_icon_wrapper float_left">
                                    <i class="ti-loop text-info"></i>
                                    <h5 class="text-whit font-weight-bold">Available Balance</h5>
                                </div>
                                <div class="invest_details float_left">
                                    <table class="invest_table">
                                        <tbody>
                                            <tr>
                                                <td class="invest_td1"> 
                                                    <h5 class="text-info">    ${{ $user['deposit_balance'] + $user['referral_bonus'] }} </h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="investment_box_wrapper user-account-info-box float_left d-flex flex-column justify-content-center align-items-center">
                                <div class="investment_icon_wrapper float_left">
                                    <i class="ti-bar-chart-alt text-danger"></i>
                                    <h5 class="text-whit font-weight-bold">All Withdrawals</h5>
                                </div>
                                <div class="invest_details float_left">
                                    <table class="invest_table">
                                        <tbody>
                                            <tr>
                                                <td class="invest_td1"> 
                                                    <h5 class="text-info">    ${{ $user['total_withdrawn'] }} </h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="investment_box_wrapper user-account-info-box float_left d-flex flex-column justify-content-center align-items-center">
                                <div class="investment_icon_wrapper float_left">
                                    <i class="ti-server text-success"></i>
                                    <h5 class="text-whit font-weight-bold">Deposit Balance</h5>
                                </div>
                                <div class="invest_details float_left">
                                    <table class="invest_table">
                                        <tbody>
                                            <tr>
                                                <td class="invest_td1"> 
                                                    <h5 class="text-info">    ${{ $user['deposit_balance'] }} </h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-12">
                        <div class="investment_box_wrapper user-account-info-box float_left d-flex flex-column justify-content-center align-items-center">
                                <div class="investment_icon_wrapper float_left">
                                    <i class="ti-link text-info"></i>
                                    <h5 class="text-whit font-weight-bold">Referral Bonus</h5>
                                </div>
                                <div class="invest_details float_left">
                                    <table class="invest_table">
                                        <tbody>
                                            <tr>
                                                <td class="invest_td1"> 
                                                    <h5 class="text-info">    ${{ $user['referral_bonus'] }} </h5>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  account wrapper end -->
            <!--  transactions wrapper start -->
            <div class="last_transaction_wrapper float_left">

                <div class="row">

                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">

                            <h3>TRADING OVERVIEW</h3>

                        </div>
                    </div>
                    <div class="crm_customer_table_main_wrapper float_left">
                        <div class="crm_ct_search_wrapper">
                            <div class="crm_ct_search_bottom_cont_Wrapper">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="myTable table datatables cs-table crm_customer_table_inner_Wrapper">
                                <thead>
                                    <tr>
                                        <th class="width_table1">transaction Hash</th>
                                        <th class="width_table1">amount ($)</th>
                                        <th class="width_table1">type</th>
                                        <th class="width_table1">currency</th>
                                        <th class="width_table1">date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr class="background_white">
                                        <td>
                                            <div class="media cs-media">

                                                <div class="media-body">
                                                    <h5>{{ $transaction['transaction_hash'] }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="pretty p-svg p-curve">{{ $transaction['amount'] }}</div>
                                        </td>
                                        <td>
                                            <div class="pretty p-svg p-curve">{{ $transaction['type'] }}</div>
                                        </td>
                                        <td>
                                            <div class="pretty p-svg p-curve">{{ $transaction['currency'] }}</div>
                                        </td>
                                        <td class="flag">
                                            <div class="pretty p-svg p-curve">{{ $transaction['date'] }}</div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">

                            <h3>MARKET OVERVIEW</h3>

                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12 d-flex justify-content-center align-content-center" style="height: 500px;">
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-screener.js" async>
                            {
                            "width": "100%",
                            "height": "100%",
                            "defaultColumn": "overview",
                            "screener_type": "crypto_mkt",
                            "displayCurrency": "USD",
                            "colorTheme": "dark",
                            "locale": "en",
                            "isTransparent": false
                        }
                            </script>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-12">
                        <div class="sv_heading_wraper">

                            <h3>REFERRAL LINK</h3>

                        </div>
                    </div>
                    <div class="col-12">
                        <div style="background:#053b50" class="p-3">
                            <h6 class="mb-2 text-light">
                                Refer users and get 5% commission when the user makes a deposit
                            </h6>
                            <div class="input-group mb-3">
                                <input type="text" id="clip-input" class="clip-input form-control"  value="{{ request()->getSchemeAndHttpHost() }}/register?ref={{ $user['name'] }}">
                                <div class="input-group-append">
                                    <button data-clipboard-target="#clip-input" class="clipboard-btn btn btn-dark" type="submit">
                                        <i class="fa fa-clipboard"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('user.layouts.footer')
         </div>
    @include('user.layouts.general-scripts')
    <script src="{{ asset('dash/plugins/clipboard/clipboard.min.js') }}"></script>
    <script>
        new ClipboardJS('.clipboard-btn');
    </script>
     <script src="{{ asset('dash/plugins/lobibox/js/lobibox.js') }}"></script>
     <script src="{{ asset('dash/js/fn.js') }}"></script>
    <script src="{{ asset('dash/js/user.index.js') }}"></script>
    
    <script>
        AmCharts.ready( function() {
  generateChartData();
  createStockChart();
} );

var chart;
var chartData = [];
var newPanel;
var stockPanel;

function generateChartData() {
  var firstDate = new Date();
  firstDate.setHours( 0, 0, 0, 0 );
  firstDate.setDate( firstDate.getDate() - 2000 );

  for ( var i = 0; i < 2000; i++ ) {
    var newDate = new Date( firstDate );

    newDate.setDate( newDate.getDate() + i );

    var open = Math.round( Math.random() * ( 30 ) + 100 );
    var close = open + Math.round( Math.random() * ( 15 ) - Math.random() * 10 );

    var low;
    if ( open < close ) {
      low = open - Math.round( Math.random() * 5 );
    } else {
      low = close - Math.round( Math.random() * 5 );
    }

    var high;
    if ( open < close ) {
      high = close + Math.round( Math.random() * 5 );
    } else {
      high = open + Math.round( Math.random() * 5 );
    }

    var volume = Math.round( Math.random() * ( 1000 + i ) ) + 100 + i;


    chartData[ i ] = ( {
      date: newDate,
      open: open,
      close: close,
      high: high,
      low: low,
      volume: volume
    } );

    // add sell value on those data points that we want sell bullet to appear
    if ( ( i & 5 ) == 5 )
      chartData[ i ].sell = high;

    // add buy value on those data points that we want buy bullet to appear
    if ( ( i & 6 ) == 6 )
      chartData[ i ].buy = high;
  }
}

function createStockChart() {
  chart = new AmCharts.AmStockChart();

  chart.balloon.horizontalPadding = 13;

  // DATASET //////////////////////////////////////////
  var dataSet = new AmCharts.DataSet();
  dataSet.fieldMappings = [ {
    fromField: "open",
    toField: "open"
  }, {
    fromField: "close",
    toField: "close"
  }, {
    fromField: "high",
    toField: "high"
  }, {
    fromField: "low",
    toField: "low"
  }, {
    fromField: "volume",
    toField: "volume"
  }, {
    fromField: "value",
    toField: "value"
  }, {
    fromField: "buy",
    toField: "buy"
  }, {
    fromField: "sell",
    toField: "sell"
  } ];
  dataSet.color = "#7f8da9";
  dataSet.dataProvider = chartData;
  dataSet.categoryField = "date";

  chart.dataSets = [ dataSet ];

  // PANELS ///////////////////////////////////////////                                                  
  stockPanel = new AmCharts.StockPanel();
  stockPanel.title = "Value";

  // graph of first stock panel
  var graph = new AmCharts.StockGraph();
  graph.type = "candlestick";
  graph.openField = "open";
  graph.closeField = "close";
  graph.highField = "high";
  graph.lowField = "low";
  graph.valueField = "high";
  graph.lineColor = "#7f8da9";
  graph.fillColors = "#7f8da9";
  graph.negativeLineColor = "#db4c3c";
  graph.negativeFillColors = "#db4c3c";
  graph.fillAlphas = 1;
  graph.balloonText = "open:<b>[[open]]</b><br>close:<b>[[close]]</b><br>low:<b>[[low]]</b><br>high:<b>[[high]]</b>";
  graph.useDataSetColors = false;
  stockPanel.addStockGraph( graph );
  chart.panels = [ stockPanel ];

  // add buy graph
  var graph = new AmCharts.StockGraph();
  graph.type = "line";
  graph.valueField = "buy";
  graph.lineColor = "#00cc00";
  graph.lineAlpha = 0;
  graph.bullet = "square";
  graph.useDataSetColors = false;
  stockPanel.addStockGraph( graph );

  // add sell graph
  var graph = new AmCharts.StockGraph();
  graph.type = "line";
  graph.valueField = "sell";
  graph.lineColor = "#cc0000";
  graph.lineAlpha = 0;
  graph.bullet = "square";
  graph.useDataSetColors = false;
  stockPanel.addStockGraph( graph );

  // OTHER SETTINGS ////////////////////////////////////
  var sbsettings = new AmCharts.ChartScrollbarSettings();
  sbsettings.graph = graph;
  sbsettings.graphType = "line";
  sbsettings.usePeriod = "WW";
  chart.chartScrollbarSettings = sbsettings;

  // Enable pan events
  var panelsSettings = new AmCharts.PanelsSettings();
  panelsSettings.panEventsEnabled = true;
  chart.panelsSettings = panelsSettings;

  // CURSOR
  var cursorSettings = new AmCharts.ChartCursorSettings();
  cursorSettings.valueBalloonsEnabled = true;
  chart.chartCursorSettings = cursorSettings;

  // PERIOD SELECTOR ///////////////////////////////////
  var periodSelector = new AmCharts.PeriodSelector();
  periodSelector.position = "bottom";
  periodSelector.periods = [ {
    period: "DD",
    count: 10,
    label: "10 days"
  }, {
    period: "MM",
    selected: true,
    count: 1,
    label: "1 month"
  }, {
    period: "YYYY",
    count: 1,
    label: "1 year"
  }, {
    period: "YTD",
    label: "YTD"
  }, {
    period: "MAX",
    label: "MAX"
  } ];
  chart.periodSelector = periodSelector;


  chart.write( 'chartdiv' );
}
    </script>
</body>

</html>