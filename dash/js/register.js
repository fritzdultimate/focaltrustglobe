let registerForm = document.querySelector('.register-form');
let host = location.origin;
let catchText = "Sorry. something went wrong";

window.addEventListener('load', () => {
    initRegisterFormAction();
});

function initRegisterFormAction(){
    registerForm.addEventListener('submit', (e) => {
        e.preventDefault();
        showLoading();
        // checkError(e.currentTarget);
        // e.currentTarget.submit();
        processRegister(e.currentTarget);
    });
}
function hasError(form){
    return checkError(form, true);
}
function checkError(form, mode){
    let fd = new FormData(form);
    let passwordMatch = fd.get('password') == fd.get('repassword');
    let acceptedTerms = !!fd.get('terms');
    if(hasEmptyField(form)){
        document.getElementById('error-message').innerHTML = "Inputs Cant Be Empty";
        return mode ? true : toastbox('toast-15');
    } else if(!passwordMatch){
        document.getElementById('error-message').innerHTML = "Password do not match";
        return mode ? true : toastbox('toast-15');
    }  else if(!acceptedTerms){
        document.getElementById('error-message').innerHTML = "Accept our terms and conditions before proceeding";
        return mode ? true : toastbox('toast-15');
    } else {
        return false;
    }
}
function processRegister(form){
    if(hasError(form)){
        hideLoading();
        return checkError(form);
    }
    let url = host + '/app/register';
    const options = {
          method: 'POST',
          body: JSON.stringify(jsonFormData(form)),
          // If you add this, upload won't work
           headers: {
             'Content-Type': 'application/json',
             'X-Requested-With' : 'XMLHttpRequest'
           }
        };
    fetch(location.search ? url + getRef() : url, options).then((res) => {
        hideLoading();
        return res.json();
    }).then((data) => {
        console.log(data)
        if('errors' in data){
            let errorMsg = getResponse(data);
            document.getElementById('error-message').innerHTML = errorMsg;
            toastbox('toast-15')
        } else if('success' in data){
            form.reset();
            let successMsg = getResponse(data,'success');
            document.getElementById('success-message').innerHTML = successMsg;
            toastbox('toast-16')
        } else {
            document.getElementById('error-message').innerHTML = catchText;
            toastbox('toast-15')
        }
    }).catch((e) => {
        console.log(e)
         hideLoading();
         document.getElementById('error-message').innerHTML = catchText;
         toastbox('toast-15')
    })
}
