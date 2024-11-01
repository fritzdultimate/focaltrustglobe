<!-- for adding fund -->
<div id="modal-ajax" class="modal fade" tabindex="-1">
    <div id="main-modal-content">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-pantone">
                    <h4 class="modal-title">
                        <i class="fa fa-edit"></i> 
                        Add funds (jdixonfuturesound@gmail.com)
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" class="form actionForm" data-redirect="" method="POST" accept-charset="utf-8">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Payment Method</label>
                                    <select name="payment_method" class="form-control">
                                        <option value="manual">Manual (Bank/Other)</option>
                                        <option value="bonus">Bonus</option>
                                        <option value="paypal">Paypal Checkout</option>
                                        <option value="stripe">Stripe Checkout</option>
                                        <option value="perfectmoney">Perfect Money USD</option>
                                        <option value="mollie">Mollie</option>
                                    </select>
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
                                    <label>Secret Key (Use Admin password)</label>
                                    <input type="text" name="secret_key" value="" class="form-control">
                                </div>
                            </div> 
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Transaction ID</label>
                                    <input type="text" name="transaction_id" value="" class="form-control">
                                </div>
                            </div> 
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Note</label>
                                    <input type="text" name="tnx_note" value="" class="form-control">
                                </div>
                            </div>           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1">Save</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>
<!--* for adding fund -->