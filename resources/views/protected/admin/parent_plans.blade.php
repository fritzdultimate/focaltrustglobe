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
          
        <style>
            .order_btn_group .list-inline-item a.btn {
                font-size: 0.9rem;
                font-weight: 400;
            }
        </style>
        <div class="page-title m-b-20">
            <div class="row justify-content-between">
                <div class="col-md-2">
                <h1 class="page-title">
                    <span class="fa fa-list-ul"></span> Parent plans
                </h1>
                </div>
                
                <div class="col-md-12">
                <div class="row justify-content-between">
                </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lists</h3>
                        <div class="card-options">
                            <div class="item-action dropdown action-options">
                                <button type="button" class="btn btn-outline-primary add-plan">
                                    Add plan 
                                    <span class="fe fe-plus"></span>
                                </button>
                            </div>          
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-vcenter card-table">
                            <thead>
                                <tr>
                                    <th class="text-center w-1">
                                        <div class="custom-controls-stacked">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input check-items check-all" data-name="check_1">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </div>
                                    </th>
                                    <th class="text-center w-1">No.</th>
                                    <th class="">Plan Info</th>
                                    <th class="text-center">Created at</th>
                                    <th class="text-center">Updated at</th>
                                    <th class="text-center">action</th>
                                </tr>
                            </thead>            
                            <tbody>
                                @foreach($parent_plans as $id => $plan)
                                <tr class="tr_1b667862cb93ecba7c392f57bb29763b">
                                    <th class="text-center w-1">
                                        <div class="custom-controls-stacked">
                                            <label class="form-check">
                                                <input type="checkbox" class="form-check-input check-item check_1" name="ids[]" value="1b667862cb93ecba7c392f57bb29763b">
                                                <span class="custom-control-label"></span>
                                            </label>
                                        </div>
                                    </th>
                                    <td class="text-center text-muted">{{ $id + 1 }}</td>
                                    <td>
                                        <div class="title"><h6>{{ ucfirst($plan->name) }}</h6></div>
                                    </td>
                                    <td class="text-center w-15p">{{ get_day_format($plan->created_at) }}</td>
                                    <td class="text-center w-15p">{{ get_day_format($plan->updated_at) }}</td>
                                    <td class="text-center w-5p">
                                        <div class="item-action dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(9px, 16px, 0px); top: 0px; left: 0px; will-change: transform;" x-out-of-boundaries="">
                                                <a href="#" class="dropdown-item ajaxModal" data-confirm_ms="">
                                                    <i class="dropdown-icon fe fe-edit"></i> 
                                                    Edit
                                                </a>
                                                <a href="#" class="dropdown-item ajaxDeleteItem" data-confirm_ms="Are you sure you want to delete this item">
                                                    <i class="dropdown-icon fe fe-trash-2"></i> 
                                                    Delete
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach        
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<div id="modal-ajax" class="modal fade" tabindex="-1">
    <div id="main-modal-content">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-pantone">
                    <!-- <h4 class="modal-title">
                        Add funds (jdixonfuturesound@gmail.com)
                    </h4> -->
                    <button type="button" class="close dismiss-modal" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="add-parent-plan-form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Plan Name</label>
                                    <input type="text" name="name" value="" class="form-control">
                                </div>
                            </div>           
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1 add-parent-plan">Save</button>
                        <button type="button" class="btn btn-dark dismiss-modal" data-dismiss="modal">Close</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>


@include('protected.admin.layouts.footer')
<script src="{{ asset('dash/js/fns.js?ref=16') }}"></script>
<script>
let catchErrorMsg = "sorry, something went wrong";

let host = location.origin;
let urlPrefix = host + '/app/';
let headers = {
    'X-Requested-With' : 'XMLHttpRequest',
    'Content-Type' : 'application/json'
};
    document.querySelector('.add-plan').addEventListener('click', (e) => {
        console.log(e)
        document.querySelector('#modal-ajax').style.display = 'block';
        document.querySelector('#modal-ajax').classList.add('show');
    })

    let btns = document.querySelectorAll('.dismiss-modal');
    [...btns].forEach(el => {
        el.addEventListener('click', () => {
            document.querySelector('#modal-ajax').style.display = 'none';
            document.querySelector('#modal-ajax').classList.remove('show');
        })
    })

    document.querySelector('.add-parent-plan').addEventListener('click', (el) => {
        el.preventDefault();
        let form = document.querySelector('.add-parent-plan-form');
        console.log(form)
        fetch(urlPrefix + `admin/plan/parent/create`, {
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
            // showErrorModal(errorMsg, ['addCardActionSheet']);
            console.log(errorMsg);
        }
        else if('success' in data){
            let successMsg = getResponse(data, 'success');
            // showSuccessModal(successMsg, ['addCardActionSheet'])
            console.log(successMsg)
            setTimeout(() => {
                location.reload();
            }, 2000)
        } else {
            // hideLoading();
            // showErrorModal(catchErrorMsg, ['addCardActionSheet']);  
        }
    }).catch((err) => {
        console.log(err);
        // hideLoading();
        // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
    });
})
</script>