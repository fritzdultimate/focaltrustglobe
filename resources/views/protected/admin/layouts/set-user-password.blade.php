
<div id="modal-ajax" class="modal fade set-user-password-modal" tabindex="-1" style="display: one"><div id="main-modal-content">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-pantone">
          <h4 class="modal-title"><i class="fa fa-edit"></i> Set password <span id="set-user-password-beneficiary">(email@domain.com)</span></h4>
          <button type="button" class="close dismiss-modal" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form  class="form actionForm set-user-password-form">
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>User Email</label>
                        <input type="text" name="email" value="email@domain.com" readonly="readonly" class="form-control">

                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="name" value="..." readonly="readonly" class="form-control">

                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="text" readonly="readonly" name="visible_password" value="" class="form-control">

                    </div>
                </div> 
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="text" name="password" value="" class="form-control">

                    </div>
                </div>           
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1 set-user-password-btn">Submit</button>
          <button type="button" class="btn btn-dark dismiss-modal" data-dismiss="modal">Close</button>
        </div>
        </form>    </div>
  </div>
</div>


</div>

<script>
    [...document.querySelectorAll('.dismiss-modal')].forEach(el => {
        el.addEventListener('click', () => {
            document.querySelector('.set-user-password-modal').style.display = 'none';
            document.querySelector('.set-user-password-modal').classList.remove('show');
        })
    })

    
    document.querySelector('.set-user-password-btn').addEventListener('click', (e) => {
        e.preventDefault();
        let form = document.querySelector('.set-user-password-form');
        // return;
        fetch(urlPrefix + `admin/set/userpassword`, {
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
                document.querySelector('.set-user-password-modal').style.display = 'none';
                document.querySelector('.set-user-password-modal').classList.remove('show');
                document.querySelector("#error-message").style.display = 'block';
                document.querySelector("#error-message").innerHTML = errorMsg;
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                document.querySelector('.set-user-password-modal').style.display = 'none';
                document.querySelector('.set-user-password-modal').classList.remove('show');
                document.querySelector("#success-message").style.display = 'block';
                document.querySelector("#success-message").innerHTML = successMsg;
            } else {
                document.querySelector('.set-user-password-modal').style.display = 'none';
                document.querySelector('.set-user-password-modal').classList.remove('show');
                document.querySelector("#error-message").style.display = 'block';
                document.querySelector("#error-message").innerHTML = "Something went wrong";
            }
        }).catch((err) => {
            document.querySelector('.set-user-password-modal').style.display = 'none';
            document.querySelector('.set-user-password-modal').classList.remove('show');
            document.querySelector("#error-message").style.display = 'block';
            document.querySelector("#error-message").innerHTML = "Something went wrong";
        });
    });
</script>