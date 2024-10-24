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


let hasWallet = !!(+document.querySelector('.plan_investment_wrapper').dataset.wallet);

function processLogin(form){
    if(hasEmptyField(form)){
        hideLoading();
        document.getElementById('error-message').innerHTML = "Inputs Cant Be Empty.";
        toastbox('toast-15')
        return;
    }
    fetch(host + '/app/login', {
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
            document.getElementById('success-message').innerHTML = 'Login successful...';
            toastbox('toast-16')
                redirectTo('/dashboard')
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
