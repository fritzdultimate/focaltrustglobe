@include('protected.admin.layouts.header')
<style>
    body{
        width: 100%!important;
    }
</style>

<div class="d-flex flex-row h-100p">
      
<style>
  .tickets-number{
    font-size: 14px !important;
  }
</style>

@include('protected.admin.layouts.aside')

<div class="layout-main d-flex flex-column flex-fill max-w-full">
    <main class="app-content">
    <div id="modal-ajax" class="fade show add-funds-modal" tabindex="-1" style="display: block">
    <div id="main-modal-content">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-pantone">
            <h4 class="modal-title">
                <i class="fa fa-edit"></i> 
                Quickwithdrawal
            </h4>
            </div>
            <form  class="form actionForm withdrawal-form">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">

                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Beneficiary Name</label>
                            <input type="text" name="name" class="form-control">

                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" name="amount" value="" class="form-control">

                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Wallet Address</label>
                            <input type="text" name="wallet_address" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Transaction Hash</label>
                            <input type="text" name="transaction_batch" value="" class="form-control">
                        </div>
                    </div> 
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Wallet</label>
                            <select class="form-control" name="wallet">
                                <option>Choose action</option>
                                <option value="USDT">USDT</option>
                                <option value="BTC">BTC</option>
                                <option value="ETH">ETH</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Withdrawal Date</label>
                            <input type="datetime-local" name="date" value="" class="form-control">
                        </div>
                    </div>          
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1 add-fund-btn">Submit</button>
            </div>
            </form>    </div>
    </div>
    </div>
</div>
    </main>
    @include('protected.admin.layouts.footer') 
<script src="{{ asset('dash/js/fns.js?ref=16') }}"></script>
<script src="{{ asset('dash/js/admin.quick-withdrawal.js?a=32') }}"></script>