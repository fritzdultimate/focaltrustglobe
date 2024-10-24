@include('protected.admin.layouts.header')

<div class="d-flex flex-row h-100p">
      
<style>
  .tickets-number{
    font-size: 14px !important;
  }
</style>

    @include('protected.admin.layouts.aside')
        <div class="layout-main d-flex flex-column flex-fill max-w-full">
            <main class="app-content">
                <div class="row justify-content-center row-card statistics">
                    <!-- header Statistic -->
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <span class="stamp stamp-md bg-success-gradient text-white mr-3">
                                        <i class="fe  fe-users"></i>
                                        </span>
                                        <div class="d-flex order-lg-2 ml-auto">
                                        <div class="ml-2 d-lg-block text-right">
                                            <h4 class="m-0 text-right number">{{ number_format($total_users, 0) }}</h4>
                                            <small class="text-muted ">Total Users</small>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <span class="stamp stamp-md bg-info-gradient text-white mr-3">
                                        <i class="fe fe-dollar-sign"></i>
                                        </span>
                                        <div class="d-flex order-lg-2 ml-auto">
                                        <div class="ml-2 d-lg-block text-right">
                                            <h4 class="m-0 text-right number">${{ number_format($total_deposited, 2) }}</h4>
                                            <small class="text-muted ">Total amount deposited</small>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                    <div class="d-flex align-items-center">
                                        <span class="stamp stamp-md bg-warning-gradient text-white mr-3">
                                        <i class="fe fe-shopping-cart"></i>
                                        </span>
                                        <div class="d-flex order-lg-2 ml-auto">
                                        <div class="ml-2 d-lg-block text-right">
                                            <h4 class="m-0 text-right number">${{ number_format($total_withdrawn, 2) }}</h4>
                                            <small class="text-muted ">Total  amount withdrawn</small>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-danger-gradient text-white mr-3">
                                    <i class="fa fa-ticket"></i>
                                    </span>
                                    <div class="d-flex order-lg-2 ml-auto">
                                    <div class="ml-2 d-lg-block text-right">
                                        <h4 class="m-0 text-right number">${{ number_format($total_pending_deposited, 2) }}</h4>
                                        <small class="text-muted ">Total pending deposits</small>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-danger-gradient text-white mr-3">
                                    <i class="fa fa-ticket"></i>
                                    </span>
                                    <div class="d-flex order-lg-2 ml-auto">
                                    <div class="ml-2 d-lg-block text-right">
                                        <h4 class="m-0 text-right number">${{ number_format($total_pending_withdrawals, 2) }}</h4>
                                        <small class="text-muted ">Total pending Withdrawals</small>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-success-gradient text-white mr-3">
                                    <i class="icon-fa fa fa-money"></i>
                                    </span>
                                    <div class="d-flex order-lg-2 ml-auto">
                                    <div class="ml-2 d-lg-block text-right">
                                        <h4 class="m-0 text-right number">${{ number_format($total_user_balance, 2) }}</h4>
                                        <small class="text-muted ">Total  Users' Balance</small>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-info-gradient text-white mr-3">
                                    <i class="icon-fa fa fa-balance-scale"></i>
                                    </span>
                                    <div class="d-flex order-lg-2 ml-auto">
                                    <div class="ml-2 d-lg-block text-right">
                                        <h4 class="m-0 text-right number">${{ number_format($total_user_invested, 2) }}</h4>
                                        <small class="text-muted ">Total User's Current Invested Funds</small>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-warning-gradient text-white mr-3">
                                    <i class="icon-fa fa fa-calculator"></i>
                                    </span>
                                    <div class="d-flex order-lg-2 ml-auto">
                                    <div class="ml-2 d-lg-block text-right">
                                        <h4 class="m-0 text-right number">${{ number_format($total_user_bonus, 2) }}</h4>
                                        <small class="text-muted ">Total User's Referral Bonus</small>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-warning-gradient text-white mr-3">
                                    <i class="icon-fa fa fa-calculator"></i>
                                    </span>
                                    <div class="d-flex order-lg-2 ml-auto">
                                    <div class="ml-2 d-lg-block text-right">
                                        <h4 class="m-0 text-right number">${{ number_format($total_profit_generated, 2) }}</h4>
                                        <small class="text-muted ">Total Interest Generated</small>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3 item">
                                <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-danger-gradient text-white mr-3">
                                    <i class="icon-fa fa fa-calculator"></i>
                                    </span>
                                    <div class="d-flex order-lg-2 ml-auto">
                                    <div class="ml-2 d-lg-block text-right">
                                        <h4 class="m-0 text-right number">{{ $total_users_referred }}</h4>
                                        <small class="text-muted ">Total  Users  Referred</small>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Chart Area -->
                    <div class="col-sm-12 charts">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Investments</h3>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                            <div class="p-4 card">
                                <div id="orders_chart_spline" style="height: 20rem; max-height: 300px; position: relative;" class="c3"><svg width="305" height="300" style="overflow: hidden;"><defs><clipPath id="c3-1686776177611-clip"><rect width="273" height="220"></rect></clipPath><clipPath id="c3-1686776177611-clip-xaxis"><rect x="-31" y="-20" width="335" height="96"></rect></clipPath><clipPath id="c3-1686776177611-clip-yaxis"><rect x="-29" y="-4" width="50" height="244"></rect></clipPath><clipPath id="c3-1686776177611-clip-grid"><rect width="273" height="220"></rect></clipPath><clipPath id="c3-1686776177611-clip-subchart"><rect width="273"></rect></clipPath></defs><g transform="translate(30.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="136.5" y="110" style="opacity: 0;"></text><rect class="c3-zoom-rect" width="273" height="220" style="opacity: 0;"></rect><g clip-path="url(https://fortressminers.com/v1/admin/admin/statistics#c3-1686776177611-clip)" class="c3-regions" style="visibility: visible;"></g><g clip-path="url(https://demo.smartpanelsmm.com/admin/statistics#c3-1686776177611-clip-grid)" class="c3-grid" style="visibility: visible;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="220" style="visibility: hidden;"></line></g></g><g clip-path="url(https://demo.smartpanelsmm.com/admin/statistics#c3-1686776177611-clip)" class="c3-chart"><g class="c3-event-rects c3-event-rects-single" style="fill-opacity: 0;"><rect class=" c3-event-rect c3-event-rect-0" x="1.5" y="0" width="24" height="220"></rect><rect class=" c3-event-rect c3-event-rect-1" x="25.5" y="0" width="44.5" height="220"></rect><rect class=" c3-event-rect c3-event-rect-2" x="70" y="0" width="44.5" height="220"></rect><rect class=" c3-event-rect c3-event-rect-3" x="114.5" y="0" width="45" height="220"></rect><rect class=" c3-event-rect c3-event-rect-4" x="159.5" y="0" width="44.5" height="220"></rect><rect class=" c3-event-rect c3-event-rect-5" x="204" y="0" width="44.5" height="220"></rect><rect class=" c3-event-rect c3-event-rect-6" x="248.5" y="0" width="23.5" height="220"></rect></g><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-Completed" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Completed c3-bars c3-bars-Completed" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Processing" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Processing c3-bars c3-bars-Processing" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Canceled" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Canceled c3-bars c3-bars-Canceled" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Pending" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Pending c3-bars c3-bars-Pending" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Partial" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Partial c3-bars c3-bars-Partial" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-In-progress" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-In-progress c3-bars c3-bars-In-progress" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-Completed" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Completed c3-lines c3-lines-Completed"><path class=" c3-shape c3-shape c3-line c3-line-Completed" d="M3,220Q39.1,184.3111111111111,48,175.38888888888889C61.35,162.00555555555556,78.65,130.77777777777777,92,130.77777777777777S123.5,162.00555555555556,137,175.38888888888889S168.65,213.30833333333334,182,220S212.65,220,226,220Q234.9,220,271,220" style="stroke: rgb(111, 187, 255); opacity: 1;"></path></g><g class=" c3-shapes c3-shapes-Completed c3-areas c3-areas-Completed"><path class=" c3-shape c3-shape c3-area c3-area-Completed" d="M 3 220" style="fill: rgb(111, 187, 255); opacity: 0.1;"></path></g><g class=" c3-selected-circles c3-selected-circles-Completed"></g><g class=" c3-shapes c3-shapes-Completed c3-circles c3-circles-Completed" style="cursor: pointer;"><circle class=" c3-shape c3-shape-0 c3-circle c3-circle-0" r="2.5" style="fill: rgb(111, 187, 255); opacity: 1;" cx="3" cy="220"></circle><circle class=" c3-shape c3-shape-1 c3-circle c3-circle-1" r="2.5" style="fill: rgb(111, 187, 255); opacity: 1;" cx="48" cy="175.38888888888889"></circle><circle class=" c3-shape c3-shape-2 c3-circle c3-circle-2" r="2.5" style="fill: rgb(111, 187, 255); opacity: 1;" cx="92" cy="130.77777777777777"></circle><circle class=" c3-shape c3-shape-3 c3-circle c3-circle-3" r="2.5" style="fill: rgb(111, 187, 255); opacity: 1;" cx="137" cy="175.38888888888889"></circle><circle class=" c3-shape c3-shape-4 c3-circle c3-circle-4" r="2.5" style="fill: rgb(111, 187, 255); opacity: 1;" cx="182" cy="220"></circle><circle class=" c3-shape c3-shape-5 c3-circle c3-circle-5" r="2.5" style="fill: rgb(111, 187, 255); opacity: 1;" cx="226" cy="220"></circle><circle class=" c3-shape c3-shape-6 c3-circle c3-circle-6" r="2.5" style="fill: rgb(111, 187, 255); opacity: 1;" cx="271" cy="220"></circle></g></g><g class="c3-chart-line c3-target c3-target-Processing" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Processing c3-lines c3-lines-Processing"><path class=" c3-shape c3-shape c3-line c3-line-Processing" d="M3,220Q39.1,220,48,220C61.35,220,78.65,220,92,220S123.5,220,137,220S168.65,220,182,220S212.65,220,226,220Q234.9,220,271,220" style="stroke: rgb(5, 255, 228); opacity: 1;"></path></g><g class=" c3-shapes c3-shapes-Processing c3-areas c3-areas-Processing"><path class=" c3-shape c3-shape c3-area c3-area-Processing" d="M 3 220" style="fill: rgb(5, 255, 228); opacity: 0.1;"></path></g><g class=" c3-selected-circles c3-selected-circles-Processing"></g><g class=" c3-shapes c3-shapes-Processing c3-circles c3-circles-Processing" style="cursor: pointer;"><circle class=" c3-shape c3-shape-0 c3-circle c3-circle-0" r="2.5" style="fill: rgb(5, 255, 228); opacity: 1;" cx="3" cy="220"></circle><circle class=" c3-shape c3-shape-1 c3-circle c3-circle-1" r="2.5" style="fill: rgb(5, 255, 228); opacity: 1;" cx="48" cy="220"></circle><circle class=" c3-shape c3-shape-2 c3-circle c3-circle-2" r="2.5" style="fill: rgb(5, 255, 228); opacity: 1;" cx="92" cy="220"></circle><circle class=" c3-shape c3-shape-3 c3-circle c3-circle-3" r="2.5" style="fill: rgb(5, 255, 228); opacity: 1;" cx="137" cy="220"></circle><circle class=" c3-shape c3-shape-4 c3-circle c3-circle-4" r="2.5" style="fill: rgb(5, 255, 228); opacity: 1;" cx="182" cy="220"></circle><circle class=" c3-shape c3-shape-5 c3-circle c3-circle-5" r="2.5" style="fill: rgb(5, 255, 228); opacity: 1;" cx="226" cy="220"></circle><circle class=" c3-shape c3-shape-6 c3-circle c3-circle-6" r="2.5" style="fill: rgb(5, 255, 228); opacity: 1;" cx="271" cy="220"></circle></g></g><g class="c3-chart-line c3-target c3-target-Canceled" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Canceled c3-lines c3-lines-Canceled"><path class=" c3-shape c3-shape c3-line c3-line-Canceled" d="M3,220Q39.1,220,48,220C61.35,220,78.65,220,92,220S123.5,220,137,220S168.65,220,182,220S212.65,220,226,220Q234.9,220,271,220" style="stroke: rgb(255, 111, 98); opacity: 1;"></path></g><g class=" c3-shapes c3-shapes-Canceled c3-areas c3-areas-Canceled"><path class=" c3-shape c3-shape c3-area c3-area-Canceled" d="M 3 220" style="fill: rgb(255, 111, 98); opacity: 0.1;"></path></g><g class=" c3-selected-circles c3-selected-circles-Canceled"></g><g class=" c3-shapes c3-shapes-Canceled c3-circles c3-circles-Canceled" style="cursor: pointer;"><circle class=" c3-shape c3-shape-0 c3-circle c3-circle-0" r="2.5" style="fill: rgb(255, 111, 98); opacity: 1;" cx="3" cy="220"></circle><circle class=" c3-shape c3-shape-1 c3-circle c3-circle-1" r="2.5" style="fill: rgb(255, 111, 98); opacity: 1;" cx="48" cy="220"></circle><circle class=" c3-shape c3-shape-2 c3-circle c3-circle-2" r="2.5" style="fill: rgb(255, 111, 98); opacity: 1;" cx="92" cy="220"></circle><circle class=" c3-shape c3-shape-3 c3-circle c3-circle-3" r="2.5" style="fill: rgb(255, 111, 98); opacity: 1;" cx="137" cy="220"></circle><circle class=" c3-shape c3-shape-4 c3-circle c3-circle-4" r="2.5" style="fill: rgb(255, 111, 98); opacity: 1;" cx="182" cy="220"></circle><circle class=" c3-shape c3-shape-5 c3-circle c3-circle-5" r="2.5" style="fill: rgb(255, 111, 98); opacity: 1;" cx="226" cy="220"></circle><circle class=" c3-shape c3-shape-6 c3-circle c3-circle-6" r="2.5" style="fill: rgb(255, 111, 98); opacity: 1;" cx="271" cy="220"></circle></g></g><g class="c3-chart-line c3-target c3-target-Pending" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Pending c3-lines c3-lines-Pending"><path class=" c3-shape c3-shape c3-line c3-line-Pending" d="M3,175.38888888888889Q39.1,188.7722222222222,48,175.38888888888889C61.35,155.3138888888889,78.65,41.555555555555564,92,41.555555555555564S123.5,162.00555555555556,137,175.38888888888889S168.65,124.08611111111111,182,130.77777777777777S212.65,213.30833333333334,226,220Q234.9,224.4611111111111,271,175.38888888888889" style="stroke: rgb(249, 221, 126); opacity: 1;"></path></g><g class=" c3-shapes c3-shapes-Pending c3-areas c3-areas-Pending"><path class=" c3-shape c3-shape c3-area c3-area-Pending" d="M 3 175.38888888888889" style="fill: rgb(249, 221, 126); opacity: 0.1;"></path></g><g class=" c3-selected-circles c3-selected-circles-Pending"></g><g class=" c3-shapes c3-shapes-Pending c3-circles c3-circles-Pending" style="cursor: pointer;"><circle class=" c3-shape c3-shape-0 c3-circle c3-circle-0" r="2.5" style="fill: rgb(249, 221, 126); opacity: 1;" cx="3" cy="175.38888888888889"></circle><circle class=" c3-shape c3-shape-1 c3-circle c3-circle-1" r="2.5" style="fill: rgb(249, 221, 126); opacity: 1;" cx="48" cy="175.38888888888889"></circle><circle class=" c3-shape c3-shape-2 c3-circle c3-circle-2" r="2.5" style="fill: rgb(249, 221, 126); opacity: 1;" cx="92" cy="41.555555555555564"></circle><circle class=" c3-shape c3-shape-3 c3-circle c3-circle-3" r="2.5" style="fill: rgb(249, 221, 126); opacity: 1;" cx="137" cy="175.38888888888889"></circle><circle class=" c3-shape c3-shape-4 c3-circle c3-circle-4" r="2.5" style="fill: rgb(249, 221, 126); opacity: 1;" cx="182" cy="130.77777777777777"></circle><circle class=" c3-shape c3-shape-5 c3-circle c3-circle-5" r="2.5" style="fill: rgb(249, 221, 126); opacity: 1;" cx="226" cy="220"></circle><circle class=" c3-shape c3-shape-6 c3-circle c3-circle-6" r="2.5" style="fill: rgb(249, 221, 126); opacity: 1;" cx="271" cy="175.38888888888889"></circle></g></g><g class="c3-chart-line c3-target c3-target-Partial" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Partial c3-lines c3-lines-Partial"><path class=" c3-shape c3-shape c3-line c3-line-Partial" d="M3,220Q39.1,220,48,220C61.35,220,78.65,220,92,220S123.5,220,137,220S168.65,220,182,220S212.65,220,226,220Q234.9,220,271,220" style="stroke: rgb(241, 197, 212); opacity: 1;"></path></g><g class=" c3-shapes c3-shapes-Partial c3-areas c3-areas-Partial"><path class=" c3-shape c3-shape c3-area c3-area-Partial" d="M 3 220" style="fill: rgb(241, 197, 212); opacity: 0.1;"></path></g><g class=" c3-selected-circles c3-selected-circles-Partial"></g><g class=" c3-shapes c3-shapes-Partial c3-circles c3-circles-Partial" style="cursor: pointer;"><circle class=" c3-shape c3-shape-0 c3-circle c3-circle-0" r="2.5" style="fill: rgb(241, 197, 212); opacity: 1;" cx="3" cy="220"></circle><circle class=" c3-shape c3-shape-1 c3-circle c3-circle-1" r="2.5" style="fill: rgb(241, 197, 212); opacity: 1;" cx="48" cy="220"></circle><circle class=" c3-shape c3-shape-2 c3-circle c3-circle-2" r="2.5" style="fill: rgb(241, 197, 212); opacity: 1;" cx="92" cy="220"></circle><circle class=" c3-shape c3-shape-3 c3-circle c3-circle-3" r="2.5" style="fill: rgb(241, 197, 212); opacity: 1;" cx="137" cy="220"></circle><circle class=" c3-shape c3-shape-4 c3-circle c3-circle-4" r="2.5" style="fill: rgb(241, 197, 212); opacity: 1;" cx="182" cy="220"></circle><circle class=" c3-shape c3-shape-5 c3-circle c3-circle-5" r="2.5" style="fill: rgb(241, 197, 212); opacity: 1;" cx="226" cy="220"></circle><circle class=" c3-shape c3-shape-6 c3-circle c3-circle-6" r="2.5" style="fill: rgb(241, 197, 212); opacity: 1;" cx="271" cy="220"></circle></g></g><g class="c3-chart-line c3-target c3-target-In-progress" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-In-progress c3-lines c3-lines-In-progress"><path class=" c3-shape c3-shape c3-line c3-line-In-progress" d="M3,175.38888888888889Q39.1,215.5388888888889,48,220C61.35,226.69166666666666,78.65,220,92,220S123.5,220,137,220S168.65,220,182,220S212.65,220,226,220Q234.9,220,271,220" style="stroke: rgb(152, 223, 138); opacity: 1;"></path></g><g class=" c3-shapes c3-shapes-In-progress c3-areas c3-areas-In-progress"><path class=" c3-shape c3-shape c3-area c3-area-In-progress" d="M 3 175.38888888888889" style="fill: rgb(152, 223, 138); opacity: 0.1;"></path></g><g class=" c3-selected-circles c3-selected-circles-In-progress"></g><g class=" c3-shapes c3-shapes-In-progress c3-circles c3-circles-In-progress" style="cursor: pointer;"><circle class=" c3-shape c3-shape-0 c3-circle c3-circle-0" r="2.5" style="fill: rgb(152, 223, 138); opacity: 1;" cx="3" cy="175.38888888888889"></circle><circle class=" c3-shape c3-shape-1 c3-circle c3-circle-1" r="2.5" style="fill: rgb(152, 223, 138); opacity: 1;" cx="48" cy="220"></circle><circle class=" c3-shape c3-shape-2 c3-circle c3-circle-2" r="2.5" style="fill: rgb(152, 223, 138); opacity: 1;" cx="92" cy="220"></circle><circle class=" c3-shape c3-shape-3 c3-circle c3-circle-3" r="2.5" style="fill: rgb(152, 223, 138); opacity: 1;" cx="137" cy="220"></circle><circle class=" c3-shape c3-shape-4 c3-circle c3-circle-4" r="2.5" style="fill: rgb(152, 223, 138); opacity: 1;" cx="182" cy="220"></circle><circle class=" c3-shape c3-shape-5 c3-circle c3-circle-5" r="2.5" style="fill: rgb(152, 223, 138); opacity: 1;" cx="226" cy="220"></circle><circle class=" c3-shape c3-shape-6 c3-circle c3-circle-6" r="2.5" style="fill: rgb(152, 223, 138); opacity: 1;" cx="271" cy="220"></circle></g></g></g><g class="c3-chart-arcs" transform="translate(136.5,105)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 0;"></text></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-Completed" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Completed"></g></g><g class="c3-chart-text c3-target c3-target-Processing" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Processing"></g></g><g class="c3-chart-text c3-target c3-target-Canceled" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Canceled"></g></g><g class="c3-chart-text c3-target c3-target-Pending" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Pending"></g></g><g class="c3-chart-text c3-target c3-target-Partial" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Partial"></g></g><g class="c3-chart-text c3-target c3-target-In-progress" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-In-progress"></g></g></g></g><g clip-path="url(https://demo.smartpanelsmm.com/admin/statistics#c3-1686776177611-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(https://demo.smartpanelsmm.com/admin/statistics#c3-1686776177611-clip-xaxis)" transform="translate(0,220)" style="visibility: visible; opacity: 1;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="273" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(3, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-09</tspan></text></g><g class="tick" transform="translate(48, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-10</tspan></text></g><g class="tick" transform="translate(92, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-11</tspan></text></g><g class="tick" transform="translate(137, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-12</tspan></text></g><g class="tick" transform="translate(182, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-13</tspan></text></g><g class="tick" transform="translate(226, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-14</tspan></text></g><g class="tick" transform="translate(271, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-15</tspan></text></g><path class="domain" d="M0,6V0H273V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(https://demo.smartpanelsmm.com/admin/statistics#c3-1686776177611-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 1;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,220)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,198)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3"></tspan></text></g><g class="tick" transform="translate(0,176)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">1</tspan></text></g><g class="tick" transform="translate(0,154)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3"></tspan></text></g><g class="tick" transform="translate(0,131)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">2</tspan></text></g><g class="tick" transform="translate(0,109)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3"></tspan></text></g><g class="tick" transform="translate(0,87)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">3</tspan></text></g><g class="tick" transform="translate(0,64)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3"></tspan></text></g><g class="tick" transform="translate(0,42)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">4</tspan></text></g><g class="tick" transform="translate(0,20)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3"></tspan></text></g><path class="domain" d="M-6,1H0V220H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(273,0)" style="visibility: hidden; opacity: 1;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,220)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,199)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,177)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,155)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,133)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,111)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,89)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,67)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,45)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,23)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V220H6"></path></g></g><g transform="translate(20.5,300.5)" style="visibility: hidden;"><g clip-path="url(https://demo.smartpanelsmm.com/admin/statistics#c3-1686776177611-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(https://demo.smartpanelsmm.com/admin/statistics#c3-1686776177611-clip)" class="c3-brush" style="pointer-events: all; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="background" x="0" width="283" style="visibility: hidden; cursor: crosshair;"></rect><rect class="extent" x="0" width="0" style="cursor: move;"></rect><g class="resize e" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g><g class="resize w" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(https://demo.smartpanelsmm.com/admin/statistics#c3-1686776177611-clip-xaxis)" style="visibility: hidden; opacity: 1;"><g class="tick" transform="translate(3, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-09</tspan></text></g><g class="tick" transform="translate(48, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-10</tspan></text></g><g class="tick" transform="translate(92, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-11</tspan></text></g><g class="tick" transform="translate(137, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-12</tspan></text></g><g class="tick" transform="translate(182, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-13</tspan></text></g><g class="tick" transform="translate(226, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-14</tspan></text></g><g class="tick" transform="translate(271, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">2023-06-15</tspan></text></g><path class="domain" d="M0,6V0H273V6"></path></g></g><g transform="translate(0,254)"><g class="c3-legend-item c3-legend-item-Completed" style="visibility: visible; cursor: pointer;"><text x="33.6015625" y="9" style="pointer-events: none;">Completed</text><rect class="c3-legend-item-event" x="19.6015625" y="-5" width="93.1875" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="17.6015625" y1="4" x2="27.6015625" y2="4" stroke-width="10" style="stroke: rgb(111, 187, 255); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Processing" style="visibility: visible; cursor: pointer;"><text x="126.7890625" y="9" style="pointer-events: none;">Processing</text><rect class="c3-legend-item-event" x="112.7890625" y="-5" width="91.140625" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="110.7890625" y1="4" x2="120.7890625" y2="4" stroke-width="10" style="stroke: rgb(5, 255, 228); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Canceled" style="visibility: visible; cursor: pointer;"><text x="217.9296875" y="9" style="pointer-events: none;">Canceled</text><rect class="c3-legend-item-event" x="203.9296875" y="-5" width="81.46875" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="201.9296875" y1="4" x2="211.9296875" y2="4" stroke-width="10" style="stroke: rgb(255, 111, 98); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Pending" style="visibility: visible; cursor: pointer;"><text x="55.22607421875" y="32" style="pointer-events: none;">Pending</text><rect class="c3-legend-item-event" x="41.22607421875" y="18" width="75.375" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="39.22607421875" y1="27" x2="49.22607421875" y2="27" stroke-width="10" style="stroke: rgb(249, 221, 126); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Partial" style="visibility: visible; cursor: pointer;"><text x="130.60107421875" y="32" style="pointer-events: none;">Partial</text><rect class="c3-legend-item-event" x="116.60107421875" y="18" width="63.015625" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="114.60107421875" y1="27" x2="124.60107421875" y2="27" stroke-width="10" style="stroke: rgb(241, 197, 212); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-In-progress" style="visibility: visible; cursor: pointer;"><text x="193.61669921875" y="32" style="pointer-events: none;">In progress</text><rect class="c3-legend-item-event" x="179.61669921875" y="18" width="84.1572265625" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="177.61669921875" y1="27" x2="187.61669921875" y2="27" stroke-width="10" style="stroke: rgb(152, 223, 138); pointer-events: none;"></line></g></g><text class="c3-title" x="152.5" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div></div>
                            </div>
                            </div>
                            <div class="col-sm-4">
                            <div class="p-4 card">
                                <div id="orders_chart_pie" style="height: 20rem; max-height: 300px; position: relative;" class="c3"><svg width="305" height="300" style="overflow: hidden;"><defs><clipPath id="c3-1686776177697-clip"><rect width="305" height="250"></rect></clipPath><clipPath id="c3-1686776177697-clip-xaxis"><rect x="-31" y="-20" width="367" height="66"></rect></clipPath><clipPath id="c3-1686776177697-clip-yaxis"><rect x="-29" y="-4" width="20" height="274"></rect></clipPath><clipPath id="c3-1686776177697-clip-grid"><rect width="305" height="250"></rect></clipPath><clipPath id="c3-1686776177697-clip-subchart"><rect width="305"></rect></clipPath></defs><g transform="translate(0.5,4.5)"><text class="c3-text c3-empty" text-anchor="middle" dominant-baseline="middle" x="152.5" y="125" style="opacity: 0;"></text><rect class="c3-zoom-rect" width="305" height="250" style="opacity: 0;"></rect><g clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip)" class="c3-regions" style="visibility: hidden;"></g><g clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip-grid)" class="c3-grid" style="visibility: hidden;"><g class="c3-xgrid-focus"><line class="c3-xgrid-focus" x1="-10" x2="-10" y1="0" y2="250" style="visibility: hidden;"></line></g></g><g clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip)" class="c3-chart"><g class="c3-event-rects c3-event-rects-single" style="fill-opacity: 0;"><rect class=" c3-event-rect c3-event-rect-0" x="0.5" y="0" width="305" height="250"></rect></g><g class="c3-chart-bars"><g class="c3-chart-bar c3-target c3-target-Completed" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Completed c3-bars c3-bars-Completed" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Processing" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Processing c3-bars c3-bars-Processing" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Canceled" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Canceled c3-bars c3-bars-Canceled" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Pending" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Pending c3-bars c3-bars-Pending" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-Partial" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-Partial c3-bars c3-bars-Partial" style="cursor: pointer;"></g></g><g class="c3-chart-bar c3-target c3-target-In-progress" style="pointer-events: none;"><g class=" c3-shapes c3-shapes-In-progress c3-bars c3-bars-In-progress" style="cursor: pointer;"></g></g></g><g class="c3-chart-lines"><g class="c3-chart-line c3-target c3-target-Completed" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Completed c3-lines c3-lines-Completed"></g><g class=" c3-shapes c3-shapes-Completed c3-areas c3-areas-Completed"></g><g class=" c3-selected-circles c3-selected-circles-Completed"></g><g class=" c3-shapes c3-shapes-Completed c3-circles c3-circles-Completed" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Processing" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Processing c3-lines c3-lines-Processing"></g><g class=" c3-shapes c3-shapes-Processing c3-areas c3-areas-Processing"></g><g class=" c3-selected-circles c3-selected-circles-Processing"></g><g class=" c3-shapes c3-shapes-Processing c3-circles c3-circles-Processing" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Canceled" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Canceled c3-lines c3-lines-Canceled"></g><g class=" c3-shapes c3-shapes-Canceled c3-areas c3-areas-Canceled"></g><g class=" c3-selected-circles c3-selected-circles-Canceled"></g><g class=" c3-shapes c3-shapes-Canceled c3-circles c3-circles-Canceled" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Pending" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Pending c3-lines c3-lines-Pending"></g><g class=" c3-shapes c3-shapes-Pending c3-areas c3-areas-Pending"></g><g class=" c3-selected-circles c3-selected-circles-Pending"></g><g class=" c3-shapes c3-shapes-Pending c3-circles c3-circles-Pending" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-Partial" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-Partial c3-lines c3-lines-Partial"></g><g class=" c3-shapes c3-shapes-Partial c3-areas c3-areas-Partial"></g><g class=" c3-selected-circles c3-selected-circles-Partial"></g><g class=" c3-shapes c3-shapes-Partial c3-circles c3-circles-Partial" style="cursor: pointer;"></g></g><g class="c3-chart-line c3-target c3-target-In-progress" style="opacity: 1; pointer-events: none;"><g class=" c3-shapes c3-shapes-In-progress c3-lines c3-lines-In-progress"></g><g class=" c3-shapes c3-shapes-In-progress c3-areas c3-areas-In-progress"></g><g class=" c3-selected-circles c3-selected-circles-In-progress"></g><g class=" c3-shapes c3-shapes-In-progress c3-circles c3-circles-In-progress" style="cursor: pointer;"></g></g></g><g class="c3-chart-arcs" transform="translate(152.5,120)"><text class="c3-chart-arcs-title" style="text-anchor: middle; opacity: 0;"></text><g class="c3-chart-arc c3-target c3-target-Completed"><g class=" c3-shapes c3-shapes-Completed c3-arcs c3-arcs-Completed"><path class=" c3-shape c3-shape c3-arc c3-arc-Completed" transform="scale(1,1)" style="fill: rgb(111, 187, 255); cursor: pointer;" d="M6.980486755139913e-15,-114A114,114 0 0,1 19.7219465429671,112.28109736084853L0,0Z"></path></g><text dy=".35em" class="" transform="translate(90.8555690737984,-7.918684756715937)" style="opacity: 1; text-anchor: middle; pointer-events: none;">47.2%</text></g><g class="c3-chart-arc c3-target c3-target-Processing"><g class=" c3-shapes c3-shapes-Processing c3-arcs c3-arcs-Processing"><path class=" c3-shape c3-shape c3-arc c3-arc-Processing" transform="scale(1,1)" style="fill: rgb(5, 255, 228); cursor: pointer;" d="M-1.22193800111234e-13,-114A114,114 0 0,1 -1.22193800111234e-13,-114L0,0Z"></path></g><text dy=".35em" class="" transform="translate(-9.775504008898721e-14,-91.2)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-Canceled"><g class=" c3-shapes c3-shapes-Canceled c3-arcs c3-arcs-Canceled"><path class=" c3-shape c3-shape c3-arc c3-arc-Canceled" transform="scale(1,1)" style="fill: rgb(255, 111, 98); cursor: pointer;" d="M-113.00253970177046,15.047458953251622A114,114 0 0,1 -17.05445290502308,-112.71710445229841L0,0Z"></path></g><text dy=".35em" class="" transform="translate(-72.92583080158568,-54.76552932181427)" style="opacity: 1; text-anchor: middle; pointer-events: none;">24.7%</text></g><g class="c3-chart-arc c3-target c3-target-Pending"><g class=" c3-shapes c3-shapes-Pending c3-arcs c3-arcs-Pending"><path class=" c3-shape c3-shape c3-arc c3-arc-Pending" transform="scale(1,1)" style="fill: rgb(249, 221, 126); cursor: pointer;" d="M19.7219465429671,112.28109736084853A114,114 0 0,1 -113.00253970177046,15.047458953251622L0,0Z"></path></g><text dy=".35em" class="" transform="translate(-53.89716059020178,73.56994005919809)" style="opacity: 1; text-anchor: middle; pointer-events: none;">25.7%</text></g><g class="c3-chart-arc c3-target c3-target-Partial"><g class=" c3-shapes c3-shapes-Partial c3-arcs c3-arcs-Partial"><path class=" c3-shape c3-shape c3-arc c3-arc-Partial" transform="scale(1,1)" style="fill: rgb(241, 197, 212); cursor: pointer;" d="M-0.450491358988921,-113.99910989799646A114,114 0 0,1 -1.22193800111234e-13,-114L0,0Z"></path></g><text dy=".35em" class="" transform="translate(-0.1801968953363095,-91.19982197942555)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g><g class="c3-chart-arc c3-target c3-target-In-progress"><g class=" c3-shapes c3-shapes-In-progress c3-arcs c3-arcs-In-progress"><path class=" c3-shape c3-shape c3-arc c3-arc-In-progress" transform="scale(1,1)" style="fill: rgb(152, 223, 138); cursor: pointer;" d="M-17.05445290502308,-112.71710445229841A114,114 0 0,1 -0.450491358988921,-113.99910989799646L0,0Z"></path></g><text dy=".35em" class="" transform="translate(-7.020730579066195,-90.9293645756758)" style="opacity: 1; text-anchor: middle; pointer-events: none;"></text></g></g><g class="c3-chart-texts"><g class="c3-chart-text c3-target c3-target-Completed" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Completed"></g></g><g class="c3-chart-text c3-target c3-target-Processing" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Processing"></g></g><g class="c3-chart-text c3-target c3-target-Canceled" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Canceled"></g></g><g class="c3-chart-text c3-target c3-target-Pending" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Pending"></g></g><g class="c3-chart-text c3-target c3-target-Partial" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-Partial"></g></g><g class="c3-chart-text c3-target c3-target-In-progress" style="opacity: 1; pointer-events: none;"><g class=" c3-texts c3-texts-In-progress"></g></g></g></g><g clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip-grid)" class="c3-grid c3-grid-lines"><g class="c3-xgrid-lines"></g><g class="c3-ygrid-lines"></g></g><g class="c3-axis c3-axis-x" clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip-xaxis)" transform="translate(0,250)" style="visibility: visible; opacity: 0;"><text class="c3-axis-x-label" transform="" style="text-anchor: end;" x="305" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(153, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H305V6"></path></g><g class="c3-axis c3-axis-y" clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip-yaxis)" transform="translate(0,0)" style="visibility: visible; opacity: 0;"><text class="c3-axis-y-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="1.2em"></text><g class="tick" transform="translate(0,230)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,202)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">100</tspan></text></g><g class="tick" transform="translate(0,174)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">200</tspan></text></g><g class="tick" transform="translate(0,147)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">300</tspan></text></g><g class="tick" transform="translate(0,119)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">400</tspan></text></g><g class="tick" transform="translate(0,92)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">500</tspan></text></g><g class="tick" transform="translate(0,64)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">600</tspan></text></g><g class="tick" transform="translate(0,36)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">700</tspan></text></g><g class="tick" transform="translate(0,9)" style="opacity: 1;"><line x2="-6"></line><text x="-9" y="0" style="text-anchor: end;"><tspan x="-9" dy="3">800</tspan></text></g><path class="domain" d="M-6,1H0V250H-6"></path></g><g class="c3-axis c3-axis-y2" transform="translate(305,0)" style="visibility: hidden; opacity: 0;"><text class="c3-axis-y2-label" transform="rotate(-90)" style="text-anchor: end;" x="0" dx="-0.5em" dy="-0.5em"></text><g class="tick" transform="translate(0,250)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0</tspan></text></g><g class="tick" transform="translate(0,226)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.1</tspan></text></g><g class="tick" transform="translate(0,201)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.2</tspan></text></g><g class="tick" transform="translate(0,176)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.3</tspan></text></g><g class="tick" transform="translate(0,151)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.4</tspan></text></g><g class="tick" transform="translate(0,126)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.5</tspan></text></g><g class="tick" transform="translate(0,101)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.6</tspan></text></g><g class="tick" transform="translate(0,76)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.7</tspan></text></g><g class="tick" transform="translate(0,51)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.8</tspan></text></g><g class="tick" transform="translate(0,26)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">0.9</tspan></text></g><g class="tick" transform="translate(0,1)" style="opacity: 1;"><line x2="6" y2="0"></line><text x="9" y="0" style="text-anchor: start;"><tspan x="9" dy="3">1</tspan></text></g><path class="domain" d="M6,1H0V250H6"></path></g></g><g transform="translate(0.5,300.5)" style="visibility: hidden;"><g clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip-subchart)" class="c3-chart"><g class="c3-chart-bars"></g><g class="c3-chart-lines"></g></g><g clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip)" class="c3-brush" style="pointer-events: all; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><rect class="background" x="0" width="305" style="visibility: hidden; cursor: crosshair;"></rect><rect class="extent" x="0" width="0" style="cursor: move;"></rect><g class="resize e" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g><g class="resize w" transform="translate(0,0)" style="cursor: ew-resize; display: none;"><rect x="-3" width="6" height="6" style="visibility: hidden;"></rect></g></g><g class="c3-axis-x" transform="translate(0,0)" clip-path="url(https://fortressminers.com/v1/admin/statistics#c3-1686776177697-clip-xaxis)" style="visibility: hidden; opacity: 0;"><g class="tick" transform="translate(153, 0)" style="opacity: 1;"><line x1="0" x2="0" y2="6"></line><text x="0" y="9" transform="" style="text-anchor: middle; display: block;"><tspan x="0" dy=".71em" dx="0">0</tspan></text></g><path class="domain" d="M0,6V0H305V6"></path></g></g><g transform="translate(0,254)"><g class="c3-legend-item c3-legend-item-Completed" style="visibility: visible; cursor: pointer;"><text x="33.6015625" y="9" style="pointer-events: none;">Completed</text><rect class="c3-legend-item-event" x="19.6015625" y="-5" width="93.1875" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="17.6015625" y1="4" x2="27.6015625" y2="4" stroke-width="10" style="stroke: rgb(111, 187, 255); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Processing" style="visibility: visible; cursor: pointer;"><text x="126.7890625" y="9" style="pointer-events: none;">Processing</text><rect class="c3-legend-item-event" x="112.7890625" y="-5" width="91.140625" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="110.7890625" y1="4" x2="120.7890625" y2="4" stroke-width="10" style="stroke: rgb(5, 255, 228); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Canceled" style="visibility: visible; cursor: pointer;"><text x="217.9296875" y="9" style="pointer-events: none;">Canceled</text><rect class="c3-legend-item-event" x="203.9296875" y="-5" width="81.46875" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="201.9296875" y1="4" x2="211.9296875" y2="4" stroke-width="10" style="stroke: rgb(255, 111, 98); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Pending" style="visibility: visible; cursor: pointer;"><text x="55.22607421875" y="32" style="pointer-events: none;">Pending</text><rect class="c3-legend-item-event" x="41.22607421875" y="18" width="75.375" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="39.22607421875" y1="27" x2="49.22607421875" y2="27" stroke-width="10" style="stroke: rgb(249, 221, 126); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-Partial" style="visibility: visible; cursor: pointer;"><text x="130.60107421875" y="32" style="pointer-events: none;">Partial</text><rect class="c3-legend-item-event" x="116.60107421875" y="18" width="63.015625" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="114.60107421875" y1="27" x2="124.60107421875" y2="27" stroke-width="10" style="stroke: rgb(241, 197, 212); pointer-events: none;"></line></g><g class="c3-legend-item c3-legend-item-In-progress" style="visibility: visible; cursor: pointer;"><text x="193.61669921875" y="32" style="pointer-events: none;">In progress</text><rect class="c3-legend-item-event" x="179.61669921875" y="18" width="84.1572265625" height="23" style="fill-opacity: 0;"></rect><line class="c3-legend-item-tile" x1="177.61669921875" y1="27" x2="187.61669921875" y2="27" stroke-width="10" style="stroke: rgb(152, 223, 138); pointer-events: none;"></line></g></g><text class="c3-title" x="152.5" y="0"></text></svg><div class="c3-tooltip-container" style="position: absolute; pointer-events: none; display: none;"></div></div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
  <script>
    $(document).ready(function(){
      Chart_template.chart_spline('#orders_chart_spline', {"time":["{{ date_format(date_create($today), 'Y-m-d') }}","{{ date_format(date_create($fourth), 'Y-m-d') }}","{{ date_format(date_create($third), 'Y-m-d') }}","{{ date_format(date_create($second), 'Y-m-d') }}","{{ date_format(date_create($first), 'Y-m-d') }}"],"Completed":["{{ $btw_today_next_investments }}","{{ $btw_fourth_next_investments }}","{{ $btw_third_next_investments }}","{{ $btw_second_next_investments }}","{{ $btw_first_next_investments }}"],"Approved":["{{ $btw_today_next_approved_investments }}","{{ $btw_fourth_next_approved_investments }}","{{ $btw_third_next_approved_investments }}","{{ $btw_second_next_approved_investments }}","{{ $btw_first_next_approved_investments }}"],"Denied":["{{ $btw_today_next_denied_investments }}","{{ $btw_fourth_next_denied_investments }}","{{ $btw_third_next_denied_investments }}","{{ $btw_second_next_denied_investments }}","{{ $btw_first_next_denied_investments }}"],"Pending":["{{ $btw_today_next_pending_investments }}","{{ $btw_fourth_next_pending_investments }}","{{ $btw_third_next_pending_investments }}","{{ $btw_second_next_pending_investments }}","{{ $btw_first_next_pending_investments }}"],"Reinvestments":["{{ $btw_today_next_reinvestment_investments }}","{{ $btw_fourth_next_reinvestment_investments }}","{{ $btw_third_next_reinvestment_investments }}","{{ $btw_second_next_reinvestment_investments }}","{{ $btw_first_next_reinvestment_investments }}"],"Running":["{{ $btw_today_next_running_investments }}","{{ $btw_fourth_next_running_investments }}","{{ $btw_third_next_running_investments }}","{{ $btw_second_next_running_investments }}","{{ $btw_first_next_running_investments }}"]});
      Chart_template.chart_pie('#orders_chart_pie', {"Completed":"{{ $completed_investments }}","Approved":"{{ $accepted_deposits }}","Denied":"{{ $denied_deposits }}","Pending":"{{ $pending_deposits }}","Reinvestments":"{{ $reinvestment_count }}","Running":"{{ $running_investments }}"});
    });
  </script>

    <!-- Statistics Logs -->
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fe fe-list"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ $total_investment }}</h4>
                        <small class="text-muted ">Investments</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fe fe-list"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ $running_investments }}</h4>
                        <small class="text-muted ">Running investments</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fe fe-check"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ $completed_investments }}</h4>
                        <small class="text-muted ">Completed investments</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fe fe-trending-up"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ $pending_deposits }}</h4>
                        <small class="text-muted ">Pending investments</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fe fe-loader"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ $total_withdrawals }}</h4>
                        <small class="text-muted ">Withdrawals</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fe fe-pie-chart"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ $pending_withdrawals }}</h4>
                        <small class="text-muted ">Pending withdrawals</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fa fa-hourglass-half"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ $accepted_withdrawals }}</h4>
                        <small class="text-muted ">Approved withdrawals</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fe fe-x-square"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ $denied_withdrawals }}</h4>
                        <small class="text-muted ">Denied withdrawals</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3 item">
                <div class="card p-3">
                <div class="d-flex align-items-center">
                    <span class="stamp stamp-md text-primary mr-3">
                    <i class="fe fe-rotate-ccw"></i>
                    </span>
                    <div class="d-flex order-lg-2 ml-auto">
                    <div class="ml-2 d-lg-block text-right">
                        <h4 class="m-0 text-right number">{{ number_format($profits) }}</h4>
                        <small class="text-muted ">Total times interest was given</small>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
  </div>

<div class="row">
      <div class="col-md-12 col-xl-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Last Newest Users</h3>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered table-vcenter card-table">
            <thead>
                <tr>
                    <th class="">User Profile</th>
                    <th class="text-center">Balance</th>
                    <th class="text-center">Role</th>
                    <th class="text-center">Invested</th>
                    <th class="text-center">Registered</th>
                    <th class="text-center">Verified Email</th>
                </tr>
            </thead>            
            <tbody>
                @foreach($latest_users as $user)          
                <tr class="tr_c85cc91bb60e0ea339d486677dcd90e6{{$user->id}}">
                    <td>
                        <div class="title"><h6>{{ ucfirst($user->firstname) }} {{ ucfirst($user->firstname) }} ({{ $user->name }})</h6></div>
                        <div class="sub text-muted">{{ $user->email }}</div>
                    </td>
                    <td class="text-center w-10p">{{ number_format($user->deposit_balance, 2) }}</td>
                    <td class="text-center text-muted w-5p">{{ $user->is_admin ? 'admin' : 'user' }}</td>
                    <td class="text-center text-muted w-15p">{{ $user->invested ? 'Yes' : 'No' }}</td>
                    <td style="">
                        <div class="sub text-muted" style="width: 100%;">{{ get_day_format($user->created_at) }}</div>
                    </td>
                    <td class="text-center w-5p"><span class="badge {{ $user->email_verified_at ? 'bg-indigo-lt' : 'bg-danger' }}">{{ $user->email_verified_at ? 'Verified' : 'Not verified' }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    </div>
  </div>        </main>
      </div>
    </div>


@include('protected.admin.layouts.footer')