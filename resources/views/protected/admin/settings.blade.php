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
                                <span class="fe fe-settings"></span> Settings
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
                                            WebSite Setting
                                        </h3>
                                    </div>
                                    <form class="form actionForm website-settings-form" accept-charset="utf-8">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 col-lg-12">
                                                    <div class="form-group">
                                                        <div class="form-label">Maintenance mode</div>
                                                        <label class="custom-switch">
                                                            <input type="hidden" name="is_maintenance_mode" value="0">
                                                            <input type="checkbox" name="is_maintenance_mode" class="custom-switch-input maintenance-toggle" value="1" {{ $admin_settings->on_maintenance ? 'checked' : '' }}>
                                                            <span class="custom-switch-indicator"></span>
                                                            <span class="custom-switch-description">Active</span>
                                                        </label>
                                                        <br>
                                                        <small class="text-danger">
                                                            <strong>
                                                                Note:
                                                            </strong> 
                                                            Make sure you remmeber this link to get access Maintenance mode before you activate:
                                                        </small> <br>
                                                        <a href="">
                                                            <span class="text-link">
                                                                https://fortressminers.com/maintenance/access
                                                            </span>
                                                        </a>
                                                    </div>
                                
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Website name
                                                        </label>
                                                        <input class="form-control" name="site_name" value="{{ $admin_settings->site_name }}">
                                                    </div>  
                    
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Website description
                                                        </label>
                                                        <textarea rows="3" name="site_description" class="form-control" data-gramm="false" wt-ignore-input="true">{{ $admin_settings->site_description }}</textarea>
                                                    </div>
                    
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Website keywords
                                                        </label>
                                                        <textarea rows="3" name="site_keywords" class="form-control" data-gramm="false" wt-ignore-input="true">{{ $admin_settings->site_keywords }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            Website title
                                                        </label>
                                                        <input class="form-control" name="site_title" value="{{ $admin_settings->site_title }}">
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

    let maintainanceToggleBtn = document.querySelector('.maintenance-toggle');
    maintainanceToggleBtn.addEventListener('change', (el) => {
        el.preventDefault();
        fetch(urlPrefix + `admin/settings/toggle/maintenance`, {
            method : 'post',
            headers
        }).then((res) => {
            hideLoading();
            return res.json();
            // return res.text();
        })
        .then((data) => {
            console.log(data);
            if('errors' in data){
                let errorMsg = getResponse(data);
                // showErrorModal(errorMsg, ['addCardActionSheet']);
                alert(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                // showSuccessModal(successMsg, ['addCardActionSheet'])
                alert(successMsg)
            } else {
                // hideLoading();
                // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
                alert("We do not know what is wrong! Chai");  
            }
        }).catch((err) => {
            alert(err);
            // hideLoading();
            // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
        });
    })

    window.addEventListener('load', () => {
        let form = document.querySelector('.website-settings-form');
        form.addEventListener('submit', (el) => {
            fetch(urlPrefix + `admin/settings/website-settings`, {
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