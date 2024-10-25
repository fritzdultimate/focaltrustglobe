

<!-- Add Card Action Sheet -->
<div class="modal fade action-sheet" id="addCardActionSheet" tabindex="-1" role="dialog" style="">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create new wallet</h5>
            </div>
            <div class="modal-body">
                <div class="action-sheet-content">
                    <form class="wallet-form">

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="wallet_name"> Wallet name </label>
                                <select class="form-control custom-select" id="exp-month" name="main_wallet_id">
                                    <option value="">Choose wallet</option>
                                    @foreach($main_wallets as $wallet)
                                        <option value="{{ $wallet->id }}">{{ ucfirst($wallet->currency) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="wallet_address"> Wallet address </label>
                                <input type="text" id="wallet_address" class="form-control" placeholder="" name="currency_address">
                            </div>
                        </div>


                        <div class="form-group basic mt-2">
                            <button type="button" class="btn btn-primary btn-block btn-lg wallet-btn form-button">Create wallet</button>

                            <button class="btn btn-primary btn-block btn-lg form-loading d-none" type="button" disabled>
                                <span class="spinner-border spinner-border-sm me-05" role="status" aria-hidden="true"></span>
                                    Loading...
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- * Add Card Action Sheet -->