let depositBtns = document.querySelectorAll('.deposit-btn');
let depositForm = document.querySelector('.deposit-form');

let promotionBtns = document.querySelectorAll('.promotion-btn');
let promotionForm = document.querySelector('.promotion-form');

let withdrawalBtns = document.querySelectorAll('.withdrawal-btn');
let withdrawalForm = document.querySelector('.withdrawal-form');

let reinvestBtns = document.querySelectorAll('.reinvest-btn');
let reinvestForm = document.querySelector('.reinvest-form');

let catchErrorMsg = "sorry, something went wrong";


let randomAddr = "my random wallet address";
let qrcode = null;
let host = location.origin;
let urlPrefix = host + '/app/';
let headers = {
    'X-Requested-With' : 'XMLHttpRequest',
    'Content-Type' : 'application/json'
};
let hasWallet = !!(+document.querySelector('.plan_investment_wrapper').dataset.wallet);

function makeCode () {
	var elText = document.querySelector(".clip-input");
	qrcode.makeCode(elText.value);
}


window.addEventListener('load', () => {
    initDepositBtnAction();
    initWithdrawalBtnAction();
    initReinvestBtnAction();
    initPromotionBtnAction();
});


function initDepositBtnAction(){
    [... depositBtns].forEach((depositBtn) => {
        depositBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if(hasWallet){
                showLoading();
                processDeposit(depositForm);
            } else {
                // lobiAlert('error', "You haven't created any wallet yet");
            }
        })
    });
}

function initPromotionBtnAction(){
    [... promotionBtns].forEach((promotionBtn) => {
        promotionBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if(hasWallet){
                showLoading();
                processDeposit(promotionForm);
            } else {
                // lobiAlert('error', "You haven't created any wallet yet");
            }
        })
    });
}

function initWithdrawalBtnAction(){
    [... withdrawalBtns].forEach((withdrawalBtn) => {
        withdrawalBtn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('withdrawal button')
            if(hasWallet){
                console.log('deposit button - has wallet')
                showLoading();
                processWithdrawal(withdrawalForm);
            } else {
                // lobiAlert('error', "You haven't created any wallet yet");
            }
        })
    });
}

function initReinvestBtnAction(){
    [... reinvestBtns].forEach((reinvestBtn) => {
        reinvestBtn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('reinvest button')
            if(hasWallet){
                console.log('reinvest button - has wallet')
                showLoading();
                processReinvest(reinvestForm);
            } else {
                // lobiAlert('error', "You haven't created any wallet yet");
            }
        })
    });
}

function initDepositFormAction(){
    depositForm.addEventListener('submit', (e) => {
        e.preventDefault();
        showLoading();
        processDeposit(depositForm);
    });
}

async function processDeposit(form){
    let amount = form.elements.namedItem('amount').value;
    let currencyIndex = form.elements.namedItem('user_wallet_id').selectedIndex;
    let selectedCurrency = form.elements.namedItem('user_wallet_id').options[currencyIndex];
    let currencySymbol = selectedCurrency.dataset.symbol;
    if(!!amount && !!currencyIndex){
        fetch(urlPrefix + 'deposit/create', {
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
                showErrorModal(errorMsg, ['depositActionSheet', 'promoActionSheet']);
                console.log(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                console.log(successMsg);
                showSuccessModal(successMsg, ['depositActionSheet', 'promoActionSheet'])
                setTimeout(()=> {
                    let id = data['success']['transaction_id'];

                    location.href = '/user/transaction/data/' + id;
                }, 3000)
            } else {
                hideLoading();
                showErrorModal(catchErrorMsg, ['depositActionSheet', 'promoActionSheet']);
                console.log(catchErrorMsg);    
            }
        }).catch((err) => {
            console.log(err);
            hideLoading();
            showErrorModal(catchErrorMsg, ['depositActionSheet', 'promoActionSheet']);
            console.log(catchErrorMsg);
        });
    } else {
        hideLoading();
        showErrorModal("Fields can't be empty", ['depositActionSheet', 'promoActionSheet']);
        console.log("Fields can't be empty");
    }
}

async function processWithdrawal(form){
    let amount = form.elements.namedItem('amount').value;
    let currencyIndex = form.elements.namedItem('user_wallet_id').selectedIndex;
    if(!!amount && !!currencyIndex){
        fetch(urlPrefix + 'withdrawal/create', {
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
                showErrorModal(errorMsg, ['withdrawalActionSheet']);
                console.log(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                console.log(successMsg);
                showSuccessModal(successMsg, ['withdrawalActionSheet'])
                setTimeout(()=> {
                    let id = data['success']['transaction_id'];

                    location.href = '/user/transaction/data/' + id;
                }, 3000)
            } else {
                hideLoading();
                showErrorModal(catchErrorMsg, ['withdrawalActionSheet']);
                console.log(catchErrorMsg);    
            }
        }).catch((err) => {
            console.log(err);
            hideLoading();
            showErrorModal(catchErrorMsg, ['withdrawalActionSheet']);
            console.log(catchErrorMsg);
        });
    } else {
        hideLoading();
        showErrorModal("Fields can't be empty", ['withdrawalActionSheet']);
        console.log("Fields can't be empty");
    }
}

async function processReinvest(form){
    let amount = form.elements.namedItem('amount').value;
    let currencyIndex = form.elements.namedItem('user_wallet_id').selectedIndex;
    if(!!amount && !!currencyIndex){
        fetch(urlPrefix + 'deposit/reinvest', {
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
                showErrorModal(errorMsg, ['reinvestmentActionSheet']);
                console.log(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                console.log(successMsg);
                showSuccessModal(successMsg, ['reinvestmentActionSheet'])
                setTimeout(()=> {
                    let id = data['success']['transaction_id'];

                    location.href = '/user/transaction/data/' + id;
                }, 3000)
            } else {
                hideLoading();
                showErrorModal(catchErrorMsg, ['reinvestmentActionSheet']);
                console.log(catchErrorMsg);    
            }
        }).catch((err) => {
            console.log(err);
            hideLoading();
            showErrorModal(catchErrorMsg, ['reinvestmentActionSheet']);
            console.log(catchErrorMsg);
        });
    } else {
        hideLoading();
        showErrorModal("Fields can't be empty", ['reinvestmentActionSheet']);
        console.log("Fields can't be empty");
    }
}
