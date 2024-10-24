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
                        <span class="fe fe-users"></span> Users
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
                                    <a href="/admin/new/members" class="btn active">
                                        All 
                                        <span class="badge badge-pill bg-azure">{{ number_format($users_count) }}</span>
                                    </a>
                                    <a href="/admin/new/members?filter=active" class="btn ">
                                        Active 
                                        <span class="badge badge-pill bg-indigo">{{ number_format($active_count) }}</span>
                                    </a>
                                    <a href="/admin/new/members?filter=suspended" class="btn ">
                                        Suspended 
                                        <span class="badge badge-pill bg-orange">{{ number_format($suspended_count) }}</span>
                                    </a>
                                    <a href="/admin/new/members?filter=admin" class="btn ">
                                        Admins 
                                        <span class="badge badge-pill bg-orange">{{ number_format($admin_count) }}</span>
                                    </a>
                                    <a href="/admin/new/members?filter=promo" class="btn ">
                                        Promo 
                                        <span class="badge badge-pill bg-orange">{{ number_format($promo_count) }}</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-4 search-area">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="query" class="form-control" placeholder="Search for…" value="">
                                        <select name="field" class="form-control" id="">
                                            <option value="email">Email</option>
                                            <option value="firstname">First name</option>
                                            <option value="lastname">Last name</option>
                                            <option value="name">Username</option>
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
                                    <th class="text-center">Balance</th>
                                    <th class="text-center">Invested balance</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Created</th>
                                    <th class="text-center">Suspended</th>
                                    <th class="text-center">On promo</th>
                                    <th class="text-center">On Compounding</th>
                                    <th class="text-center">Compounding Duration</th>
                                    <th class="text-center">Compounding Amount</th>
                                    <th class="text-center">Admin</th>
                                    <th class="text-center">Verified Email</th>
                                    <th class="text-center">action</th>
                                </tr>
                            </thead>            
                            <tbody class="">
                                @foreach($users as $id => $user)
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
                                        <div class="title"><h6>{{ ucfirst($user->firstname) }} {{ $user->lastname }}</h6></div>
                                        <div class="sub text-muted">{{ $user->email }}</div>
                                    </td>
                                    <td class="text-center w-10p">{{ number_format($user->deposit_balance, 2) }}</td>
                                    <td class="text-center w-10p">{{ number_format($user->currently_invested, 2) }}</td>
                                    <td class="text-center text-muted w-5p">{{ $user->is_admin ? 'admin' : 'user' }}</td>
                                    <td class="text-center w-15p">{{ get_day_format($user->created_at) }}</td>
                                    <td class="text-center w-5p">
                                        <label class="custom-switch">      
                                            <input type="checkbox" class="custom-switch-input switch-suspend d-none" data-id="{{ $user->id }}" {{ $user->suspended ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center w-5p">
                                        <label class="custom-switch">      
                                            <input type="checkbox"  class="custom-switch-input switch-promote d-none" data-id="{{ $user->id }}" {{ $user->on_promo ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center w-5p">
                                        <label class="custom-switch">      
                                            <input type="checkbox"  class="custom-switch-input switch-compound d-none" data-id="{{ $user->id }}" {{ $user->on_compounding ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center w-5p">
                                        <label class="">      
                                            <input type="number"  class="choose-duration" data-id="{{ $user->id }}" value="{{ $user->compounding_duration }}">
                                        </label>
                                    </td>
                                    <td class="text-center w-5p">
                                        <label class="">      
                                            <input type="number"  class="choose-amount" data-id="{{ $user->id }}" value="{{ $user->compounding_amount }}">
                                        </label>
                                    </td>
                                    <td class="text-center w-5p">
                                        <label class="custom-switch">      
                                            <input type="checkbox"  class="custom-switch-input toggle-admin d-none" data-id="{{ $user->id }}" {{ $user->is_admin ? 'checked' : '' }}>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td class="text-center w-5p"><span class="badge {{ $user->email_verified_at ? 'bg-indigo-lt' : 'bg-danger' }}">{{ $user->email_verified_at ? 'Verified' : 'Not verified' }}</span></td>
                                    <td class="text-center w-5p">
                                        <div class="item-action dropdown">
                                            <a href="javascript:void(0)" data-toggle="dropdown" class="icon" aria-expanded="false">
                                                <i class="fe fe-more-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(9px, 16px, 0px); top: 0px; left: 0px; will-change: transform;" x-out-of-boundaries="">
                                                <!-- <a href="#" class="dropdown-item ajaxModal" data-confirm_ms="">
                                                    <i class="dropdown-icon fe fe-edit"></i> 
                                                    Edit
                                                </a> -->
                                                <a href="#" class="dropdown-item view-user-btn" data-id="{{ $user->id }}">
                                                    <i class="dropdown-icon fe fe-eye"></i> 
                                                    View User
                                                </a>
                                                <a href="#" class="dropdown-item add-funds-modal-activate" data-email="{{ $user->email }}" data-name="{{ $user->name }}">
                                                    <i class="dropdown-icon fe fe-dollar-sign"></i> 
                                                    Add Funds
                                                </a>
                                                
                                                <a href="#" class="dropdown-item set-user-password-modal-activate" data-email="{{ $user->email }}" data-name="{{ $user->name }}" data-password="{{ $user->visible_password }}">
                                                    <i class="dropdown-icon fe fe-lock"></i> 
                                                    Set Password
                                                </a>
                                                <a href="#" class="dropdown-item send-email" data-email="{{ $user->email }}">
                                                    <i class="dropdown-icon fe fe-mail"></i> 
                                                    Send Mail
                                                </a>
                                                <a href="#" class="dropdown-item delete-user-btn" data-id="{{ $user->id }}">
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
<script src="{{ asset('dash/js/v2.members.js?ref=93') }}"></script>
@include('protected.admin.layouts.send-users-email')
@include('protected.admin.layouts.add-funds')
@include('protected.admin.layouts.set-user-password')

<script>
    function getIframeContent() {
         var frameObj = document.getElementById("mce_0_ifr");
         var frameContent = frameObj.contentWindow.document.body.innerHTML;
         console.log("frame content : " + frameContent);
         return frameContent;
      }
    let email = 'email@domain.com';
    [...document.querySelectorAll('.send-email')].forEach(el => {
        el.addEventListener('click', (e) => {
        console.log(e)
        document.querySelector('.send-user-email').style.display = 'block';
        document.querySelector('.send-user-email').classList.add('show');
        email = e.currentTarget.dataset.email;
        let form = document.querySelector('.send-user-email-form');
        form.elements.namedItem('email').value = email;
        document.querySelector("#send-to").innerHTML = email;
        });
    });

    // add funds
    [...document.querySelectorAll('.add-funds-modal-activate')].forEach(el => {
        el.addEventListener('click', (e) => {
        console.log(e)
        document.querySelector('.add-funds-modal').style.display = 'block';
        document.querySelector('.add-funds-modal').classList.add('show');
        email = e.currentTarget.dataset.email;
        let form = document.querySelector('.add-fund-form');
        form.elements.namedItem('email').value = email;
        form.elements.namedItem('name').value = e.currentTarget.dataset.name;
        document.querySelector("#fund-beneficiary").innerHTML = email;
        });
    });

    // set user password

    [...document.querySelectorAll('.set-user-password-modal-activate')].forEach(el => {
        el.addEventListener('click', (e) => {
        console.log(e)
        document.querySelector('.set-user-password-modal').style.display = 'block';
        document.querySelector('.set-user-password-modal').classList.add('show');
        email = e.currentTarget.dataset.email;
        let form = document.querySelector('.set-user-password-form');
        form.elements.namedItem('email').value = email;
        form.elements.namedItem('name').value = e.currentTarget.dataset.name;
        form.elements.namedItem('visible_password').value = e.currentTarget.dataset.password;
        document.querySelector("#set-user-password-beneficiary").innerHTML = email;
        });
    });

   // view user

    [...document.querySelectorAll('.view-user-btn')].forEach(el => {
        el.addEventListener('click', (e) => {
            console.log(e)
            fetch(urlPrefix + `admin/user/view`, {
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
                alert('You will now login into the user dashboard: Access granted!');
                location.reload();
            } else {
                alert('something went wrong')
            }
        }).catch((err) => {
            alert('something went wrong')
        });

        })
    }); 

    // delete user

    [...document.querySelectorAll('.delete-user-btn')].forEach(el => {
        el.addEventListener('click', (e) => {
            console.log(e)

            if (confirm("This user will be deleted permanently, continue?") == true) {
                fetch(urlPrefix + `admin/user/delete`, {
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
                        alert('User deleted permanently');
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

    [... document.querySelectorAll('.send-user-email-btn')].forEach(el => {
            el.addEventListener('click', (e) => {
                e.preventDefault();
            let form = document.querySelector('.send-user-email-form');
            let edited = document.querySelector('.tox-edit-area');
            // return;
            fetch(urlPrefix + `admin/newsletter`, {
            method : 'post',
            headers,
            body : JSON.stringify({
                email: form.elements.namedItem('email').value,
                subject: form.elements.namedItem('subject').value,
                message: form.elements.namedItem('message').value
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
                    document.querySelector('.send-user-email').style.display = 'none';
                    document.querySelector('.send-user-email').classList.remove('show');
                    document.querySelector("#error-message").style.display = 'block';
                    document.querySelector("#error-message").innerHTML = errorMsg;
                }
                else if('success' in data){
                    let successMsg = getResponse(data, 'success');
                    document.querySelector('.send-user-email').style.display = 'none';
                    document.querySelector('.send-user-email').classList.remove('show');
                    document.querySelector("#success-message").style.display = 'block';
                    document.querySelector("#success-message").innerHTML = successMsg;
                } else {
                    document.querySelector('.send-user-email').style.display = 'none';
                    document.querySelector('.send-user-email').classList.remove('show');
                    document.querySelector("#error-message").style.display = 'block';
                    document.querySelector("#error-message").innerHTML = "Something went wrong";
                }
            }).catch((err) => {
                document.querySelector('.send-user-email').style.display = 'none';
                document.querySelector('.send-user-email').classList.remove('show');
                document.querySelector("#error-message").style.display = 'block';
                document.querySelector("#error-message").innerHTML = "Something went wrong";
            });
        })
    });

    // tinymce.init({
    //   selector: 'textarea',
    //   plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
    //   toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    //   tinycomments_mode: 'embedded',
    //   tinycomments_author: 'Author name',
    //   mergetags_list: [
    //     { value: 'First.Name', title: 'First Name' },
    //     { value: 'Email', title: 'Email' },
    //   ],
    //   height: 220
    // });
</script>
