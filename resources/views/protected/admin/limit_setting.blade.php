@include('protected.admin.layouts.header')
<style>
    body{
        width: 100%!important;
    }
</style>

@include('protected.admin.layouts.aside')


    <div class="d-flex flex-row h-100p">
      
        <style>
            .tickets-number {
                font-size: 14px !important;
            }
        </style>      
        <div class="layout-main d-flex flex-column flex-fill max-w-full">
            <main class="app-content">  
                <div class="page-title m-b-20">
                    <div class="row justify-content-between">
                        <div class="col-md-2">
                            <h1 class="page-title">
                                <span class="fe fe-settings"></span>Settings
                            </h1>
                        </div>
                        <div class="col-md-3">
                            
                        </div>
                    </div>
                </div>
                <div class="row settings justify-content-center">
                    <div class="col-md-12 col-lg-12">
                        <div class="row">
                            @include('protected.admin.settings_aside')
                            <div class="col-md-10 col-lg-10">
                                <div class="card content">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fe fe-globe"></i> 
                                            Limit Setting
                                        </h3>
                                    </div>
                                    <form class="form actionForm limit-settings-form" accept-charset="utf-8">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <h5>
                                                        <i class="fe fe-link"></i> Deposit Limits
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Per Tier 1 Deposit Limit ($)</label>
                                                                <input type="number" class="form-control" name="deposit_limit_level_1" value="{{ $admin_settings->deposit_limit_level_1 }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Per Tier 2 Deposit Limit ($)</label>
                                                                <input type="number" class="form-control" name="deposit_limit_level_2" value="{{ $admin_settings->deposit_limit_level_2 }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Daily Tier 1 Deposit Limit ($)</label>
                                                                <input type="number" class="form-control" name="daily_deposit_limit_level_1" value="{{ $admin_settings->daily_deposit_limit_level_1 }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Daily Tier 2 Deposit Limit ($)</label>
                                                                <input type="number" class="form-control" name="daily_deposit_limit_level_2" value="{{ $admin_settings->daily_deposit_limit_level_2 }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>

                                                    <h5>
                                                        <i class="fe fe-link"></i> Withdrawal Limits
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Per Tier 1 Withdrawal Limit ($)</label>
                                                                <input type="number" class="form-control" name="withdrawal_limit_level_1" value="{{ $admin_settings->withdrawal_limit_level_1 }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Per Tier 2 Withdrawal Limit ($)</label>
                                                                <input type="number" class="form-control" name="withdrawal_limit_level_2" value="{{ $admin_settings->withdrawal_limit_level_2 }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Daily Tier 1 Withdrawal Limit ($)</label>
                                                                <input type="number" class="form-control" name="daily_withdrawal_limit_level_1" value="{{ $admin_settings->daily_withdrawal_limit_level_1 }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Daily Tier 2 Withdrawal Limit ($)</label>
                                                                <input type="number" class="form-control" name="daily_withdrawal_limit_level_2" value="{{ $admin_settings->daily_withdrawal_limit_level_2 }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <h5>
                                                        <i class="fe fe-link"></i> Reinvestment Limits
                                                    </h5>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Count Of Reinvestment For Tier 2</label>
                                                                <input type="number" class="form-control" name="count_reinvestment_level_2" value="{{ $admin_settings->count_reinvestment_level_2 }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Count Of Reinvestment For Tier 3</label>
                                                                <input type="number" class="form-control" name="count_reinvestment_level_3" value="{{ $admin_settings->count_reinvestment_level_3 }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-end">
                                            <button class="btn btn-primary btn-min-width text-uppercase">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>

@include('protected.admin.layouts.footer')
<script src="{{ asset('dash/js/fns.js?ref=16') }}"></script>

<script>
    let host = location.origin;
    let urlPrefix = host + '/app/';
    let headers = {
        'X-Requested-With' : 'XMLHttpRequest',
        'Content-Type' : 'application/json'
    };

    window.addEventListener('load', () => {
        let form = document.querySelector('.limit-settings-form');
        form.addEventListener('submit', (el) => {
            fetch(urlPrefix + `admin/settings/limit-settings`, {
            method : 'post',
            headers,
            body : JSON.stringify({
                ...jsonFormData(form),
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
                    alert(errorMsg);
                }
                else if('success' in data){
                    let successMsg = getResponse(data, 'success');
                    alert(successMsg)
                    location.reload();
                } else {
                    alert("We do not know what is wrong! Chai");  
                }
            }).catch((err) => {
                alert(err);
                // hideLoading();
            });
        })
    })
</script>