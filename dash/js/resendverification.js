let loginForm = document.querySelector('.verification-form');
let host = location.origin;
let catchText = "Sorry. something went wrong";

window.addEventListener('load', () => {
    initLoginFormAction();
});

function initLoginFormAction(){
    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        showLoading();
        processVerification(e.currentTarget);
    });
}


let hasWallet = !!(+document.querySelector('.plan_investment_wrapper').dataset.wallet);

function processVerification(form){
    if(hasEmptyField(form)){
        hideLoading();
        document.getElementById('error-message').innerHTML = "Enter email to receive link.";
        toastbox('toast-15')
        return;
    }
    fetch(host + '/app/register/resend-verification', {
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
                // redirectTo('/dashboard')
        } else {
            document.getElementById('error-message').innerHTML = catchText;
            toastbox('toast-15')
        }
    }).catch((e) => {
        hideLoading();
        document.getElementById('error-message').innerHTML = catchText;
        toastbox('toast-15')
    })
}
