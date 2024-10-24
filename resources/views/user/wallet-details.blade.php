@include('user.layouts_new.header')
@include('user.dialogbox.error-modal')
@include('user.dialogbox.success-modal')

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            Wallet Details
        </div>
    </div>
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">


        <!-- Coin Status -->
        <div class="section full gradientSection">
            <div class="in coin-head">
                <h1 class="total">{{ ucfirst($wallet->admin_wallet->currency) }}</h1>
                <h4 class="caption">
                     <strong>{{ strtoupper($wallet->admin_wallet->currency_symbol) }}</strong>
                </h4>
                <span>
                <span style="font-size: 15px; color:#fff">
                    {{ substr($wallet->currency_address, 0, 14). '.....' . substr($wallet->currency_address, -14, 14) }} 
                </span>
                <ion-icon data-copy-name="Wallet address" data-copy-text="{{ $wallet->currency_address }}" class="font-size: 20px copy-btn" name="copy-outline"></ion-icon>
            </span>
            </div>
            
        </div> 
        <!-- * Coin Status -->


        <!-- Coin Chart -->
        <div class="section mb-2">

            <div class="card coin-chart">
                <div class="card-body pt-1">
                    <!-- tabs -->
                    <ul class="nav nav-tabs lined" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-24h" role="tab">
                                24H
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-1w" role="tab">
                                1W
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-1m" role="tab">
                                1M
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-1y" role="tab">
                                1Y
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-all" role="tab">
                                All
                            </a>
                        </li>
                    </ul>
                    <!-- * tabs -->
                </div>


                <!-- tab content -->
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="tab-24h" role="tabpanel" style="position: relative;">
                        <div class="chart-example-1" style="min-height: 140px;"><div id="apexchartswrddet5" class="apexcharts-canvas apexchartswrddet5 apexcharts-theme-light" style="width: 366px; height: 140px;"><svg id="SvgjsSvg1006" width="366" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1008" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 0)"><defs id="SvgjsDefs1007"><clipPath id="gridRectMaskwrddet5"><rect id="SvgjsRect1013" width="372" height="142" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskwrddet5"></clipPath><clipPath id="nonForecastMaskwrddet5"></clipPath><clipPath id="gridRectMarkerMaskwrddet5"><rect id="SvgjsRect1014" width="370" height="144" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1019" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1020" stop-opacity="0.65" stop-color="rgba(29,204,112,0.65)" offset="0"></stop><stop id="SvgjsStop1021" stop-opacity="0.5" stop-color="rgba(142,230,184,0.5)" offset="1"></stop><stop id="SvgjsStop1022" stop-opacity="0.5" stop-color="rgba(142,230,184,0.5)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1012" x1="0" y1="0" x2="0" y2="140" stroke="#b6b6b6" stroke-dasharray="3" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="140" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1025" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1026" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1045" class="apexcharts-grid"><g id="SvgjsG1046" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1048" x1="0" y1="0" x2="366" y2="0" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1049" x1="0" y1="28" x2="366" y2="28" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1050" x1="0" y1="56" x2="366" y2="56" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1051" x1="0" y1="84" x2="366" y2="84" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1052" x1="0" y1="112" x2="366" y2="112" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1053" x1="0" y1="140" x2="366" y2="140" stroke="#e0e0e0" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1047" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1055" x1="0" y1="140" x2="366" y2="140" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1054" x1="0" y1="1" x2="0" y2="140" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1015" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1016" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1023" d="M0 140L0 119.52C8.00625 119.52 14.86875 123.8 22.875 123.8C30.88125 123.8 37.74375 113.36 45.75 113.36C53.75625 113.36 60.61875 96.4 68.625 96.4C76.63125 96.4 83.49375 87.64 91.5 87.64C99.50625 87.64 106.36875 84 114.375 84C122.38125 84 129.24375 80 137.25 80C145.25625 80 152.11875 112 160.125 112C168.13125 112 174.99375 76 183 76C191.00625 76 197.86875 84 205.875 84C213.88125 84 220.74375 76 228.75 76C236.75625 76 243.61875 60 251.625 60C259.63125 60 266.49375 96 274.5 96C282.50625 96 289.36875 119.96000000000001 297.375 119.96000000000001C305.38125 119.96000000000001 312.24375 20 320.25 20C328.25625 20 335.11875 100 343.125 100C351.13125 100 357.99375 60 366 60C366 60 366 60 366 140M366 60C366 60 366 60 366 60 " fill="url(#SvgjsLinearGradient1019)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskwrddet5)" pathTo="M 0 140L 0 119.52C 8.00625 119.52 14.86875 123.8 22.875 123.8C 30.88125 123.8 37.74375 113.36 45.75 113.36C 53.75625 113.36 60.61875 96.4 68.625 96.4C 76.63125 96.4 83.49375 87.64 91.5 87.64C 99.50625 87.64 106.36875 84 114.375 84C 122.38125 84 129.24375 80 137.25 80C 145.25625 80 152.11875 112 160.125 112C 168.13125 112 174.99375 76 183 76C 191.00625 76 197.86875 84 205.875 84C 213.88125 84 220.74375 76 228.75 76C 236.75625 76 243.61875 60 251.625 60C 259.63125 60 266.49375 96 274.5 96C 282.50625 96 289.36875 119.96000000000001 297.375 119.96000000000001C 305.38125 119.96000000000001 312.24375 20 320.25 20C 328.25625 20 335.11875 100 343.125 100C 351.13125 100 357.99375 60 366 60C 366 60 366 60 366 140M 366 60z" pathFrom="M -1 140L -1 140L 22.875 140L 45.75 140L 68.625 140L 91.5 140L 114.375 140L 137.25 140L 160.125 140L 183 140L 205.875 140L 228.75 140L 251.625 140L 274.5 140L 297.375 140L 320.25 140L 343.125 140L 366 140"></path><path id="SvgjsPath1024" d="M0 119.52C8.00625 119.52 14.86875 123.8 22.875 123.8C30.88125 123.8 37.74375 113.36 45.75 113.36C53.75625 113.36 60.61875 96.4 68.625 96.4C76.63125 96.4 83.49375 87.64 91.5 87.64C99.50625 87.64 106.36875 84 114.375 84C122.38125 84 129.24375 80 137.25 80C145.25625 80 152.11875 112 160.125 112C168.13125 112 174.99375 76 183 76C191.00625 76 197.86875 84 205.875 84C213.88125 84 220.74375 76 228.75 76C236.75625 76 243.61875 60 251.625 60C259.63125 60 266.49375 96 274.5 96C282.50625 96 289.36875 119.96000000000001 297.375 119.96000000000001C305.38125 119.96000000000001 312.24375 20 320.25 20C328.25625 20 335.11875 100 343.125 100C351.13125 100 357.99375 60 366 60C366 60 366 60 366 60 " fill="none" fill-opacity="1" stroke="#1dcc70" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskwrddet5)" pathTo="M 0 119.52C 8.00625 119.52 14.86875 123.8 22.875 123.8C 30.88125 123.8 37.74375 113.36 45.75 113.36C 53.75625 113.36 60.61875 96.4 68.625 96.4C 76.63125 96.4 83.49375 87.64 91.5 87.64C 99.50625 87.64 106.36875 84 114.375 84C 122.38125 84 129.24375 80 137.25 80C 145.25625 80 152.11875 112 160.125 112C 168.13125 112 174.99375 76 183 76C 191.00625 76 197.86875 84 205.875 84C 213.88125 84 220.74375 76 228.75 76C 236.75625 76 243.61875 60 251.625 60C 259.63125 60 266.49375 96 274.5 96C 282.50625 96 289.36875 119.96000000000001 297.375 119.96000000000001C 305.38125 119.96000000000001 312.24375 20 320.25 20C 328.25625 20 335.11875 100 343.125 100C 351.13125 100 357.99375 60 366 60" pathFrom="M -1 140L -1 140L 22.875 140L 45.75 140L 68.625 140L 91.5 140L 114.375 140L 137.25 140L 160.125 140L 183 140L 205.875 140L 228.75 140L 251.625 140L 274.5 140L 297.375 140L 320.25 140L 343.125 140L 366 140"></path><g id="SvgjsG1017" class="apexcharts-series-markers-wrap" data:realIndex="0"></g></g><g id="SvgjsG1018" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1056" x1="0" y1="0" x2="366" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1057" x1="0" y1="0" x2="366" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1058" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1059" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1060" class="apexcharts-point-annotations"></g></g><rect id="SvgjsRect1011" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1044" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1009" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 70px;"></div></div></div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 367px; height: 141px;"></div></div><div class="contract-trigger"></div></div></div>

                    <div class="tab-pane fade" id="tab-1w" role="tabpanel" style="position: relative;">
                        <div class="chart-example-2" style="min-height: 140px;"><div id="apexchartspsykxirv" class="apexcharts-canvas apexchartspsykxirv" style="width: 0px; height: 140px;"><svg id="SvgjsSvg1061" width="0" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1064" class="apexcharts-annotations"></g><g id="SvgjsG1063" class="apexcharts-inner apexcharts-graphical"><defs id="SvgjsDefs1062"></defs></g></svg><div class="apexcharts-legend"></div></div></div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 1px; height: 1px;"></div></div><div class="contract-trigger"></div></div></div>
                    <div class="tab-pane fade" id="tab-1m" role="tabpanel" style="position: relative;">
                        <div class="chart-example-3" style="min-height: 140px;"><div id="apexchartsu4c9wuief" class="apexcharts-canvas apexchartsu4c9wuief" style="width: 0px; height: 140px;"><svg id="SvgjsSvg1065" width="0" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1068" class="apexcharts-annotations"></g><g id="SvgjsG1067" class="apexcharts-inner apexcharts-graphical"><defs id="SvgjsDefs1066"></defs></g></svg><div class="apexcharts-legend"></div></div></div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 1px; height: 1px;"></div></div><div class="contract-trigger"></div></div></div>
                    <div class="tab-pane fade" id="tab-1y" role="tabpanel" style="position: relative;">
                        <div class="chart-example-4" style="min-height: 140px;"><div id="apexchartst5877r47" class="apexcharts-canvas apexchartst5877r47" style="width: 0px; height: 140px;"><svg id="SvgjsSvg1069" width="0" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1072" class="apexcharts-annotations"></g><g id="SvgjsG1071" class="apexcharts-inner apexcharts-graphical"><defs id="SvgjsDefs1070"></defs></g></svg><div class="apexcharts-legend"></div></div></div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 1px; height: 1px;"></div></div><div class="contract-trigger"></div></div></div>
                    <div class="tab-pane fade" id="tab-all" role="tabpanel" style="position: relative;">
                        <div class="chart-example-5" style="min-height: 140px;"><div id="apexchartsloypirtu" class="apexcharts-canvas apexchartsloypirtu" style="width: 0px; height: 140px;"><svg id="SvgjsSvg1073" width="0" height="140" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1076" class="apexcharts-annotations"></g><g id="SvgjsG1075" class="apexcharts-inner apexcharts-graphical"><defs id="SvgjsDefs1074"></defs></g></svg><div class="apexcharts-legend"></div></div></div>
                    <div class="resize-triggers"><div class="expand-trigger"><div style="width: 1px; height: 1px;"></div></div><div class="contract-trigger"></div></div></div>
                </div>
                <!-- * tab content -->

            </div>
        </div>
        <!-- Coin Chart -->


        <!-- Buttons -->
        <div class="section">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <a href="#" class="btn btn-block btn-lg btn-danger">DELETE</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Buttons -->

        <!-- Stats -->
        <div class="section mt-2 mb-4 d-none">
            <div class="card">
                <ul class="listview no-line transparent flush simple-listview">
                    <li>
                        <div class="text-muted">Daily Change</div>
                        <strong class="text-success">+5.10%</strong>
                    </li>
                    <li>
                        <div class="text-muted">High Price</div>
                        <strong>$56,367.23</strong>
                    </li>
                    <li>
                        <div class="text-muted">Low Price</div>
                        <strong>$18,529.90</strong>
                    </li>
                    <li>
                        <div class="text-muted">Market Supply</div>
                        <strong>BTC 14.62M</strong>
                    </li>
                    <li>
                        <div class="text-muted">Market Cap</div>
                        <strong>$526.48B</strong>
                    </li>
                </ul>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <div class="row mb-05 fontsize-sub">
                        <div class="col text-success"><strong>72% Buy</strong></div>
                        <div class="col text-secondary text-end"><strong>26% Sell</strong></div>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                        <div class="progress-bar bg-secondary" role="progressbar" style="width: 28%" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Stats -->

        <!-- History -->
        <div class="section mt-4">
            <div class="section-heading">
                <h2 class="title">History</h2>
                <a href="#" class="link">View All</a>
            </div>
            <div class="card">
                <ul class="listview flush transparent no-line image-listview detailed-list mt-1 mb-1">
                    <!-- item -->
                    @foreach($transactions as $transaction)
                        <li>
                            <a href="/user/transaction/data/{{ $transaction->id }}" class="item">
                                @if($transaction->type == 'deposit')
                                    <ion-icon class="text-success" name="arrow-down-outline" style="margin-right: 5px;"></ion-icon>
                                @elseif($transaction->type == 'withdrawal')
                                    <ion-icon class="text-danger" name="arrow-up-outline" style="margin-right: 5px;"></ion-icon>
                                @else
                                    <ion-icon class="text-success" name="refresh-outline" style="margin-right: 5px;"></ion-icon>
                                @endif

                                <iconify-icon style="font-size: 20px; margin-right: 8px;" icon="cryptocurrency-color:{{ $transaction->wallet->admin_wallet->currency_symbol }}"></iconify-icon>
                                <div class="in">
                                    <div>
                                        <strong>{{ ucfirst($transaction->currency) }}</strong>
                                        <div class="text-small text-secondary">{{ ucfirst($transaction->type) }}</div>
                                        <small class="text-{{ $transaction->status == 'pending' ? 'warning' : ($transaction->status == 'denied' ? 'secondary' : 'success') }}"><em style="font-size: 8px;">{{ $transaction->status }}</em></small>
                                    </div>
                                    <div class="text-end">
                                        <strong><span class="text-{{ $transaction->type == 'withdrawal' ? 'danger' : 'success' }}">{{ $transaction->type == 'withdrawal' ? '- ' : '+ ' }}</span>{{ get_currency_symbol($user_settings->currency) }}{{ currency_conversion($user_settings->currency, $transaction->amount) }}</strong>
                                        <div class="text-small">
                                            {{ date_format(date_create($transaction->created_at), 'H:i A') }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                    <!-- * item -->

                </ul>
                <div class="card-body pt-0 d-none">
                    <a href="#" class="btn btn-block btn-outline-secondary">Load more</a>
                </div>
            </div>
        </div>
        <!-- History -->

        


        <div class="section inset mb-4 mt-4 d-none">
            <div class="accordion" id="accordionExample1">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion01">
                            What is Bitcoin?
                        </button>
                    </h2>
                    <div id="accordion01" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at feugiat tellus. Sed quis
                            velit tellus.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion02">
                            How Bitcoin works?
                        </button>
                    </h2>
                    <div id="accordion02" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at feugiat tellus. Sed quis
                            velit tellus.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accordion03">
                            How can i buy/sell Bitcoin?
                        </button>
                    </h2>
                    <div id="accordion03" class="accordion-collapse collapse" data-bs-parent="#accordionExample1">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut at feugiat tellus. Sed quis
                            velit tellus.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="toast-15" class="toast-box toast-top bg-success">
            <div class="in">
                <div class="text" id="copied-message">
                    Text copied
                </div>
            </div>
            <button type="button" class="btn btn-sm btn-text-light close-button">OK</button>
        </div>

    </div>
    <!-- * App Capsule -->

@include('user.layouts_new.general-scripts')
<script src="{{ asset('dash/js/user-wallet.js?ref=123') }}"></script>
@include('user.layouts_new.footer')
<script>
    [...document.querySelectorAll('.copy-btn')].forEach((e) => {
        e.addEventListener('click', (el) => {
            // e.classList.replace()
            e.name = 'checkmark-outline';
            e.style.color = 'blue';

            // Copy the text
            navigator.clipboard.writeText(e.dataset.copyText);
            document.getElementById("copied-message").innerHTML = e.dataset.copyName + '  copied to clipboard!';
            toastbox('toast-15')
            setTimeout(()=>{
                e.name = 'copy-outline';
                e.style.color = 'black';
            }, 1000)
        })
    })

    async function cryptoRates(symbol) {
        console.log(symbol)
        let response = await fetch(`https://min-api.cryptocompare.com/data/price?fsym=${symbol}&tsyms=usd`, {
            method: 'GET'
        });
        let result = await response.json();
        return result;
    }



    window.addEventListener('load', () => {
        let elem = document.querySelectorAll('.wallet-symbol-rate');

        [...elem].forEach((el, id) => {
            let symbol = el.dataset.symbol;
            cryptoRates(symbol).then((data) => {
                el.innerHTML = `$${Number(data["USD"].toFixed(2)).toLocaleString('en-US')}`;
            });

            tocrypto(symbol).then(data => {
                document.getElementsByClassName('price')[id].innerHTML = data.toFixed(6);
            });
        })
    })
</script>