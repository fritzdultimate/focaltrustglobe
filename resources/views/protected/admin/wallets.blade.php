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
                    <span class="fa fa-list-ul"></span> Site Wallets
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
                                <button type="button" class="btn btn-outline-primary add-wallet">
                                    Add Wallet 
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
                                    <th class="">Wallet Info</th>
                                    <th class="text-center">Currency</th>
                                    <th class="text-center">Wallet Address</th>
                                    <th class="text-center">Currency Symbol</th>
                                    <th class="text-center">Created at</th>
                                    <th class="text-center">Updated at</th>
                                    <th class="text-center">action</th>
                                </tr>
                            </thead>            
                            <tbody>
                                @foreach($wallets as $id => $wallet)
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
                                        <div class="title"><h6>{{ ucfirst($wallet->currency) }}</h6></div>
                                        <div class="sub text-muted">Admin Wallet</div>
                                    </td>
                                    <td class="text-center w-10p">{{ strtoupper($wallet->currency) }}</td>
                                    <td class="w-10p">{{ $wallet->currency_address }}</td>
                                    <td class="text-center w-10p">{{ strtoupper($wallet->currency_symbol) }}</td>
                                    <td class="text-center w-15p">{{ get_day_format($wallet->created_at) }}</td>
                                    <td class="text-center w-15p">{{ get_day_format($wallet->updated_at) }}</td>
                                    <td class="text-center w-5p">
                                        <div class="item-action dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(9px, 16px, 0px); top: 0px; left: 0px; will-change: transform;" x-out-of-boundaries="">
                                                <a href="#" class="dropdown-item edit-wallet-activator" data-symbol="{{ $wallet->currency_symbol }}" data-currency="{{ $wallet->currency }}" data-address="{{ $wallet->currency_address }}" data-id="{{ $wallet->id }}">
                                                    <i class="dropdown-icon fe fe-edit"></i> 
                                                    Edit
                                                </a>
                                                <a href="#" class="dropdown-item delete-wallet-btn" data-id="{{ $wallet->id }}">
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
                    <h4 class="modal-title">
                        Add wallet
                    </h4>
                    <button type="button" class="close dismiss-modal" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form actionForm add-wallet-form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Wallet Name</label>
                                    <input type="text" name="currency" value="" class="form-control">
                                </div>
                            </div> 
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Wallet Symbol</label>
                                    <input type="text" name="currency_symbol" value="" class="form-control">
                                </div>
                            </div> 
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Wallet Address</label>
                                    <input type="text" name="currency_address" value="" class="form-control">
                                </div>
                            </div>            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1 add-wallet-btn">Save</button>
                        <button type="button" class="btn btn-dark dismiss-modal" data-dismiss="modal">Close</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>

<div id="modal-edit-wallet" class="modal fade" tabindex="-1">
    <div id="main-modal-content">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-pantone">
                    <h4 class="modal-title">
                        Edit wallet
                    </h4>
                    <button type="button" class="close dismiss-modal" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="form actionForm edit-wallet-form">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" id="wallet_edit_id" name="id">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Wallet Name</label>
                                    <input type="text" name="currency" value="" class="form-control" id="edit_currency">
                                </div>
                            </div> 
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Wallet Symbol</label>
                                    <input type="text" name="currency_symbol" value="" class="form-control" id="edit_symbol">
                                </div>
                            </div> 
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>Wallet Address</label>
                                    <input type="text" name="currency_address" value="" class="form-control" id="edit_address">
                                </div>
                            </div>            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1 edit-wallet-btn">Edit</button>
                        <button type="button" class="btn btn-dark dismiss-edit-modal" data-dismiss="modal">Close</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>


@include('protected.admin.layouts.footer')
<script src="{{ asset('dash/js/fns.js?ref=16') }}"></script>
<script>
    document.querySelector('.add-wallet').addEventListener('click', (e) => {
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

    let dismissEditBtns = document.querySelectorAll('.dismiss-edit-modal');
    [...dismissEditBtns].forEach(el => {
        el.addEventListener('click', () => {
            document.querySelector('#modal-edit-wallet').style.display = 'none';
            document.querySelector('#modal-edit-wallet').classList.remove('show');
        })
    })

    let editBtns = document.querySelectorAll('.edit-wallet-activator');
    [...editBtns].forEach(el => {
        el.addEventListener('click', () => {
            document.querySelector("#wallet_edit_id").value = el.dataset.id;
            document.querySelector("#edit_currency").value = el.dataset.currency;
            document.querySelector("#edit_symbol").value = el.dataset.symbol;
            document.querySelector("#edit_address").value = el.dataset.address;
            document.querySelector('#modal-edit-wallet').style.display = 'block';
            document.querySelector('#modal-edit-wallet').classList.add('show');
        })
    })
let catchErrorMsg = "sorry, something went wrong";

let host = location.origin;
let urlPrefix = host + '/app/';
let headers = {
    'X-Requested-With' : 'XMLHttpRequest',
    'Content-Type' : 'application/json'
};

// add wallet

[...document.querySelectorAll('.add-wallet-btn')].forEach(el => {
    el.addEventListener('click', (e) => {
        e.preventDefault();

        if (confirm("This wallet will be created, continue?") == true) {
            let form = document.querySelector('.add-wallet-form');
            fetch(urlPrefix + `admin/wallet/create`, {
                method : 'post',
                headers,
                body : JSON.stringify({
                    ...jsonFormData(form)
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
                    alert('Wallet created');
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

// edit wallet

[...document.querySelectorAll('.edit-wallet-btn')].forEach(el => {
    el.addEventListener('click', (e) => {
        e.preventDefault();

        if (confirm("This wallet will be edited, continue?") == true) {
            let form = document.querySelector('.edit-wallet-form');
            fetch(urlPrefix + `admin/wallet/update`, {
                method : 'post',
                headers,
                body : JSON.stringify({
                    ...jsonFormData(form)
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
                    alert('Wallet created');
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

// delete wallet

[...document.querySelectorAll('.delete-wallet-btn')].forEach(el => {
        el.addEventListener('click', (e) => {
            console.log(e)

            if (confirm("This wallet will be deleted permanently, continue?") == true) {
                fetch(urlPrefix + `admin/wallet/trash`, {
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
                        alert('Wallet Deleted Permanently');
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