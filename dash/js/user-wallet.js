let walletBtns = document.querySelectorAll('.wallet-btn');
let walletForm = document.querySelector('.wallet-form');

let catchErrorMsg = "sorry, something went wrong";

let host = location.origin;
let urlPrefix = host + '/app/';
let headers = {
    'X-Requested-With' : 'XMLHttpRequest',
    'Content-Type' : 'application/json'
};


window.addEventListener('load', () => {
    initWalletBtnAction();
});


function initWalletBtnAction(){
    [... walletBtns].forEach((walletBtn) => {
        walletBtn.addEventListener('click', (e) => {
            e.preventDefault();
            showLoading();
            processWallet(walletForm);
        })
    });
}

async function processWallet(form){
    let currency = form.elements.namedItem('main_wallet_id').value;
    let wallet_address = form.elements.namedItem('currency_address').value;
    if(!!currency && !!wallet_address){
        fetch(urlPrefix + 'wallet/create', {
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
                showErrorModal(errorMsg, ['addCardActionSheet']);
                console.log(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                showSuccessModal(successMsg, ['addCardActionSheet'])
                setTimeout(()=> {
                    location.reload();
                }, 3000)
            } else {
                hideLoading();
                showErrorModal(catchErrorMsg, ['addCardActionSheet']);  
            }
        }).catch((err) => {
            console.log(err);
            hideLoading();
            showErrorModal(catchErrorMsg, ['addCardActionSheet']);
        });
    } else {
        hideLoading();
        showErrorModal("Fields can't be empty", ['addCardActionSheet']);
    }
}
