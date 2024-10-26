@include('visitor.layouts.header')
<body class="nk-body body-wider bg-theme">
<div class="nk-wrap">
    <header class="nk-header page-header is-transparent is-sticky is-dark" id="header">
        
                @include('visitor.layouts.mobile-nav')
          
        <div class="header-banner bg-theme-grad has-ovm">
            <div class="nk-banner">
                <div class="banner banner-page">
                    <div class="banner-wrap">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-9">
                                    <div class="banner-caption cpn tc-light text-center">
                                        <div class="cpn-head">
                                            <h2 class="title ttu">How It Works</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-ovm shape-a-sm"></div>
        </div>

    </header>
    <main class="nk-pages tc-light">
       <section>
           <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 style="font-weight: bold;">
                            This is a brief description of how {{ env('APP_NAME') }}.com operates.
                        </h3>
                        <p>
                            {{ env('APP_NAME') }} is a private company that specializes in Investment Management Firm, Private Equity, Credit Funds, Railroads, Hedge Funds and Traditional Asset Management and helps you trade your cryptocurrencies to earn daily profit.
We {{ env('APP_NAME') }}  manages institutional clients and private investors worldwide across a range of private equity, credit, liquid hedge funds, and traditional asset management strategies.
{{ env('APP_NAME') }}  invests in undervalued, distressed, and illiquid credit investments, is an investor in commercial real estate assets, cryptocurrency like Bitcoin, Ethereum usdt,  loans, and special situations worldwide, and provider of customized financing solutions. Fortress Credit's business invests globally in credit and assets and includes private equity style credit-focused funds, debt, and hybrid hedge fund structures.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
@include('visitor.layouts.footer')
</body>
</html>