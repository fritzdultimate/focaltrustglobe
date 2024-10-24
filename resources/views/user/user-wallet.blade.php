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
            Wallets
        </div>
        <div class="right">
            <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#addCardActionSheet">
                <ion-icon name="add-outline"></ion-icon>
            </a>
        </div>
    </div>
    @include('user.actionsheet.add-card-action-sheet')
    <!-- * App Header -->


    <!-- App Capsule -->
    <div id="appCapsule">
        @if($wallet_count)
        <!-- Cards -->
        <div class="section mt-2">
            <div class="section-title">My Active Wallets</div>
            <div class="card">
                <ul class="listview flush transparent image-listview detailed-list mt-1 mb-1">
                    @foreach($wallets as $wallet)
                    <!-- item -->
                    <li style=>
                        <a href="/user/crypto/wallet/details/{{ $wallet->id }}" class="item">
                            <!-- <div class="item"> -->
                                <div class="icon-box text-success">
                                    <ion-icon name="trending-up-outline"></ion-icon>
                                    
                                </div>
                                <iconify-icon style="font-size: 28px; margin-left: -12px" icon="cryptocurrency-color:{{ $wallet->admin_wallet->currency_symbol }}"></iconify-icon>
                                <div class="in" style="margin-left: 10px">
                                    <div>
                                        <strong>{{ ucfirst($wallet->admin_wallet->currency) }}</strong>
                                        <div class="text-small text-secondary"><span class="price">0.00</span> {{ strtoupper($wallet->admin_wallet->currency_symbol) }}/$1</div>
                                    </div>
                                    <div class="text-end">
                                        <strong class="wallet-symbol-rate" data-symbol="{{ $wallet->admin_wallet->currency_symbol }}">...</strong>
                                        <div class="text-small">
                                            <span class="badge badge-success">
                                                <!-- <ion-icon name="arrow-up-outline"></ion-icon> -->
                                                price
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <!-- </div> -->
                        </a>
                    </li>
                    <!-- * item -->
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- * Cards -->
        @endif

        <div class="section mt-2 mb-2 hidden" style="visibility:hidden">
            <a href="#" class="btn btn-primary btn-block btn-lg">Load More</a>
        </div>

        @if($wallet_count == 0)
            <div class="flex justify-center content-center" style="display: flex; justify-content: center; height: 100%; align-items: center; flex-direction: column; font-size: 15px;">
                You do not have any cryptocurrency wallet yet, please start creating!
            </div>
        @endif


    </div>
    <!-- * App Capsule -->

@include('user.layouts_new.general-scripts')
<script src="{{ asset('dash/js/user-wallet.js?ref=123') }}"></script>
@include('user.layouts_new.footer')
<script>
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