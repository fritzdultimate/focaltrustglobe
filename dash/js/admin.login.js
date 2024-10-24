let loginForm = document.querySelector('.login-form');
let host = location.origin;
let catchText = "Sorry. something went wrong";

window.addEventListener('load', () => {
    initLoginFormAction();
});

function initLoginFormAction(){
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        showLoading();
        processLogin(e.currentTarget);
    });
}


function processLogin(form){
    if(hasEmptyField(form)){
        hideLoading();
        document.getElementById('error-message').innerHTML = "Inputs Cant Be Empty.";
        toastbox('toast-15')
        return;
    }
    fetch(host + '/app/admin/auth/login', {
        method : 'post',
        headers : {
            'Content-type' : 'application/json',
            'X-Requested-With' : 'XMLHttpRequest'
        },
        body : JSON.stringify(jsonFormData(form))
    }).then((res) => {
        hideLoading();
        return res.json();
    }).then((data) => {
        if('errors' in data){
            console.log(data);
            let errorMsg = getResponse(data);
            document.getElementById('error-message').innerHTML = errorMsg;
            toastbox('toast-15')
        } else if('success' in data){
            let successMsg = getResponse(data, 'success');
            document.getElementById('success-message').innerHTML = successMsg;
            toastbox('toast-16')
            redirectTo('/admin/new/members')
        } else {
            document.getElementById('error-message').innerHTML = catchText;
            toastbox('toast-15')
        }
    }).catch((e) => {
        hideLoading();
        document.getElementById('error-message').innerHTML = catchText;
        toastbox('toast-15');
    })
}
