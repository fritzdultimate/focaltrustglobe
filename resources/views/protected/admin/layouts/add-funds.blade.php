
<div id="modal-ajax" class="modal fade add-funds-modal" tabindex="-1" style="display: one">
    <div id="main-modal-content">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> Add fund <span id="fund-beneficiary">(email@domain.com)</span></h4>
            <button type="button" class="close dismiss-modal" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <form  class="form actionForm add-fund-form">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Beneficiary Email</label>
                            <input type="text" name="email" value="email@domain.com" readonly="readonly" class="form-control">

                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Beneficiary Username</label>
                            <input type="text" name="name" value="..." readonly="readonly" class="form-control">

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
                            <label>Action</label>
                            <select class="form-control" name="action">
                                <option>Choose action</option>
                                <option value="credit">Credit</option>
                                <option value="debit">Debit</option>
                            </select>

                        </div>
                    </div>  
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label>Asset</label>
                            <select class="form-control" name="asset">
                                <option>Choose action</option>
                                <option value="deposit_balance">Deposit balance</option>
                                <option value="currently_invested">Currently Invested</option>
                                <option value="referral_bonus">Referral Bonus</option>
                            </select>

                        </div>
                    </div>            
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1 add-fund-btn">Submit</button>
            <button type="button" class="btn btn-dark dismiss-modal" data-dismiss="modal">Close</button>
            </div>
            </form>    </div>
    </div>
    </div>
</div>

<script>
    [...document.querySelectorAll('.dismiss-modal')].forEach(el => {
        el.addEventListener('click', () => {
            document.querySelector('.add-funds-modal').style.display = 'none';
            document.querySelector('.add-funds-modal').classList.remove('show');
        })
    })

    
    document.querySelector('.add-fund-btn').addEventListener('click', (e) => {
        e.preventDefault();
        let form = document.querySelector('.add-fund-form');
        // return;
        fetch(urlPrefix + `account/fund-account`, {
        method : 'post',
        headers,
        body : JSON.stringify({
            ...jsonFormData(form)
        })
        }).then((res) => {
            hideLoading();
            return res.json();
            // return res.text();
        })
        .then((data) => {
            console.log(data);
            if('errors' in data){
                let errorMsg = getResponse(data);
                document.querySelector('.add-funds-modal').style.display = 'none';
                document.querySelector('.add-funds-modal').classList.remove('show');
                document.querySelector("#error-message").style.display = 'block';
                document.querySelector("#error-message").innerHTML = errorMsg;
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                document.querySelector('.add-funds-modal').style.display = 'none';
                document.querySelector('.add-funds-modal').classList.remove('show');
                document.querySelector("#success-message").style.display = 'block';
                document.querySelector("#success-message").innerHTML = successMsg;
            } else {
                document.querySelector('.add-funds-modal').style.display = 'none';
                document.querySelector('.add-funds-modal').classList.remove('show');
                document.querySelector("#error-message").style.display = 'block';
                document.querySelector("#error-message").innerHTML = "Something went wrong";
            }
        }).catch((err) => {
            document.querySelector('.add-funds-modal').style.display = 'none';
            document.querySelector('.add-funds-modal').classList.remove('show');
            document.querySelector("#error-message").style.display = 'block';
            document.querySelector("#error-message").innerHTML = "Something went wrong";
        });
    });
</script>