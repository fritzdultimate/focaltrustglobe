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
        
        <div class="page-title m-b-20">
            
            <div class="alert alert-danger text-center" id="error-message" style="display: none;"></div>
           
            <div class="alert alert-success text-center" id="success-message" style="display: none;"></div>
            <div class="row justify-content-between">
                <div class="col-md-2">
                    <h1 class="page-title">
                        <span class="fe fe-users"></span> Deposits
                    </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Filter</h3>
                        <div class="card-options">
                            <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                            <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="btn-group w-30 m-b-10">
                                    <a href="/admin/deposits" class="btn active">
                                        All 
                                        <span class="badge badge-pill bg-azure">{{ number_format($deposit_count) }}</span>
                                    </a>
                                    <a href="/admin/deposits?filter=pending" class="btn ">
                                        Pending 
                                        <span class="badge badge-pill bg-indigo">{{ number_format($pending_count) }}</span>
                                    </a>
                                    <a href="/admin/deposits?filter=accepted" class="btn ">
                                        Accepted 
                                        <span class="badge badge-pill bg-orange">{{ number_format($accepted_count) }}</span>
                                    </a>
                                    <a href="/admin/deposits?filter=denied" class="btn ">
                                        Denied 
                                        <span class="badge badge-pill bg-orange">{{ number_format($denied_count) }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 search-area">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="query" class="form-control" placeholder="Search for…" value="">
                                        <select name="field" class="form-control" id="">
                                            <option value="username">Username</option>
                                            <option value="transaction_hash">Transaction hash</option>
                                            <option value="amount">Amount</option>
                                            <option value="status">Status</option>
                                            <option value="created_at">Date</option>
                                        </select>
                                        <button class="btn btn-primary btn-square btn-search" type="button"><span class="fe fe-search"></span></button>
                                        <button class="btn btn-outline-danger btn-square btn-clear d-none" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Clear" type="button"><span class="fe fe-x"></span></button>
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
                        <h3 class="card-title">Lists</h3>
                        <div class="card-options">
                            <div class="item-action dropdown action-options">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                                    Actions 
                                    <span class="fe fe-chevrons-down"></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" data-type="active" class="dropdown-item ajaxActionOptions">
                                        <i class="dropdown-icon fe fe-check-square"></i> 
                                        Active
                                    </a>
                                    <a href="#" data-type="deactive" class="dropdown-item ajaxActionOptions">
                                        <i class="dropdown-icon fe fe-x-square"></i> 
                                        Deactive All
                                    </a>
                                    <a href="#" data-type="delete" class="dropdown-item ajaxActionOptions">
                                        <i class="dropdown-icon fe fe-trash-2"></i> 
                                        Delete
                                    </a>
                                </div>
                            </div>          
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-vcenter card-table">
                            <thead class="">
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
                                    <th class="">User Profile</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Interest rate</th>
                                    <th class="text-center">Transaction hash</th>
                                    <th class="text-center">Created At</th>
                                    <th class="text-center">Updated At</th>
                                    <th class="text-center">action</th>
                                </tr>
                            </thead>            
                            <tbody class="">
                                @foreach($deposits as $id => $deposit)
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
                                        <div class="title"><h6>{{ ucfirst($deposit->user->firstname) }} {{ $deposit->user->lastname }} ({{ $deposit->user->name }})</h6></div>
                                        <div class="sub text-muted">{{ $deposit->user->email }}</div>
                                    </td>
                                    <td class="text-center w-10p">{{ number_format($deposit->amount, 2) }}</td>
                                    <td class="text-center w-10p">{{ $deposit->status }}</td>
                                    <td class="text-center w-10p">{{ number_format($deposit->interest_rate, 2) }}</td>
                                    <td class="text-center w-10p">{{ $deposit->transaction_hash }}</td>
                                    <td class="text-center w-15p">{{ get_day_format($deposit->created_at) }}</td>
                                    <td class="text-center w-15p">{{ get_day_format($deposit->updated_at) }}</td>
                                    <td class="text-center w-5p">
                                        <div class="item-action dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(9px, 16px, 0px); top: 0px; left: 0px; will-change: transform;" x-out-of-boundaries="">
                                                <a href="#" class="dropdown-item approve-deposit-btn" data-id="{{ $deposit->id }}">
                                                    <i class="dropdown-icon fe fe-checkmark-2"></i> 
                                                    Approve
                                                </a>
                                                <a href="#" class="dropdown-item deny-deposit-btn" data-id="{{ $deposit->id }}">
                                                    <i class="dropdown-icon fe fe-close-2"></i> 
                                                    Deny
                                                </a>
                                                <a href="#" class="dropdown-item delete-deposit-btn" data-id="{{ $deposit->id }}">
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
            <div class="col-md-12 d-none">
                <div class="float-right">
                    <nav class="page-navigation" aria-label="navigation">
                        <ul class="pagination">
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li>
                                <a class="page-link" href="http://localhost:8000/admin/new/members?p=2" data-ci-pagination-page="2">2</a>
                            </li>
                            <li>
                                <a class="page-link" href="http://localhost:8000/admin/new/members?p=3" data-ci-pagination-page="3">3</a>
                            </li>
                            <li>
                                <a href="http://localhost:8000/admin/new/members?p=2" data-ci-pagination-page="2" rel="next">
                                    <i class="fe fe-chevron-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost:8000/admin/new/members?p=93" data-ci-pagination-page="93">
                                    <i class="fe fe-chevrons-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>  
        </div>
    </main>
</div>


@include('protected.admin.layouts.footer')
<script src="{{ asset('dash/js/fns.js?ref=16') }}"></script>
<script src="{{ asset('dash/js/v2.members.js') }}"></script>
@include('protected.admin.layouts.send-users-email')
@include('protected.admin.layouts.add-funds')
@include('protected.admin.layouts.set-user-password')

<script>

    // approve deposit

    [...document.querySelectorAll('.approve-deposit-btn')].forEach(el => {
        el.addEventListener('click', (e) => {
            console.log(e)

            if (confirm("This deposit will be approved, continue?") == true) {
                fetch(urlPrefix + `admin/deposit/approve`, {
                    method : 'post',
                    headers,
                    body : JSON.stringify({
                    id : e.currentTarget.dataset.id
                    })
                }).then((res) => {
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
                        alert('Deposit approved');
                        location.reload();
                    } else {
                        alert('something went wrong')
                    }
                }).catch((err) => {
                    alert('something went wrong')
                });
            } else {
                // text = "You canceled!";
            }
        })
    }); 

    // deny deposit

    [...document.querySelectorAll('.deny-deposit-btn')].forEach(el => {
        el.addEventListener('click', (e) => {
            console.log(e)

            if (confirm("This deposit will be denied, continue?") == true) {
                fetch(urlPrefix + `admin/deposit/deny`, {
                    method : 'post',
                    headers,
                    body : JSON.stringify({
                    id : e.currentTarget.dataset.id
                    })
                }).then((res) => {
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
                        alert('Deposit Denied');
                        location.reload();
                    } else {
                        alert('something went wrong')
                    }
                }).catch((err) => {
                    alert('something went wrong')
                });
            } else {
                // text = "You canceled!";
            }
        })
    }); 

    // delete deposit

    [...document.querySelectorAll('.delete-deposit-btn')].forEach(el => {
        el.addEventListener('click', (e) => {
            console.log(e)

            if (confirm("This deposit will be deleted permanently, continue?") == true) {
                fetch(urlPrefix + `admin/deposit/delete`, {
                    method : 'post',
                    headers,
                    body : JSON.stringify({
                    id : e.currentTarget.dataset.id
                    })
                }).then((res) => {
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
                        alert('Deposit Deleted');
                        location.reload();
                    } else {
                        alert('something went wrong')
                    }
                }).catch((err) => {
                    alert('something went wrong')
                });
            } else {
                // text = "You canceled!";
            }
        })
    }); 

</script>