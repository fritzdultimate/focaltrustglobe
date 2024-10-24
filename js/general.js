

function isInRange(min, max, value) {
    return value >= min && value <= max
}
function Reinvest(){

}

async function createDeposit() {
    // alert('Im still working perfectly')
    event.preventDefault();

    let data = event.target.dataset;
    let max_deposit = +data.max;
    let min_deposit = +data.min;
    let plan = data.plan;
    let returns = +data.planReturn;
    let time = +data.time;
    let referral_bonus = +data.referalBonus;
    let currency = cryp_currency.value;
    let isReinvest = currency.toLowerCase() == 'reinvest';
    let url = isReinvest ? '/User/reinvest' : '/deposits';

    let amount = +event.target.elements.namedItem('amount').value;

    if(typeof amount !== 'number' || !amount) {
        showError('Deposit Error', 'Please input valid amount to deposit!', 'warning')
        return;
    } else if(!isInRange(min_deposit, max_deposit, amount)) {
        showError('Deposit Error', `Amount to deposit must be in the range of $${min_deposit} to $${max_deposit}`, 'warning')
        return;
    } else {
        let response = await fetch(host + url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                name: plan,
                rate: returns,
                time,
                referral_bonus,
                amount,
                currency
            })
        });        
        if(response.status == 200) {
            let result = await response.json();
            if(result.code === 400) {
                $.toast({
                    heading: 'Error',
                    text: result.message,
                    position: 'top-right',
                    loaderBg: '#ff6849',
                    icon: 'error',
                    hideAfter: 10000,
                    stack: 6
                });
                // showError('Deposite Error', result.messages, 'warning');
            } else if(result.code == 200) {
                if(!isReinvest){
                    let percent = amount/100;
                    let payout = `$${(percent * returns) + amount}`;
                    let date = new Date();
                    const newDate = addDays(date, time);
                    d.querySelector('.currency_amount').innerHTML = amount;
                    let parentModal = d.querySelector('.deposit-modal');
                    let cryptAddressForm = d.querySelector('.crypt-address-form');
                    cryptAddressInput = cryptAddressForm.elements.namedItem('crypt-address');
                    let cryptaddress =  result.crypto[result.currency + '_address'];
                    console.log(result.crypto)
                    let cryptpicture =  result.crypto[result.currency + '_picture'];

                    cryptAddressInput.value = cryptaddress;
                    d.querySelector('.crypt-picture').src = cryptpicture;
                    
                    parentModal.querySelector('.plan').textContent = plan;
                    parentModal.querySelector('.payout_date').textContent = newDate;
                    parentModal.querySelector('.investment_amount').textContent = '$' + amount;
                    parentModal.querySelector('.payout_amount').textContent =  payout;
                    parentModal.querySelector('.plan_desc').textContent = `${returns/time}% returns Daily For ${time} Days`;
                    [... parentModal.querySelectorAll('.currency_type')].forEach((el) => {
                        el.textContent =  'Dollar'//currency;
                    });
                    $('.deposit-modal').modal('show')
                } else {
                    swal({   
                        title: 'Success',   
                        text: result.message,   
                        type : 'success',   
                        showCancelButton: false,
                        showConfirmButton: true,   
                        cancelButtonColor : "#141d33",
                        confirmButtonColor: "#2196F3",   
                        confirmButtonText: "dismiss",   
                        closeOnConfirm: false 
                    });
                }
            }
        } else {
            let r = await response.json();
            console.log(r);
            $.toast({
                heading: 'Error',
                text: 'Couln\'t Complete Action Something Went Wrong',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 10000,
                stack: 6
            });
        }    
    }

}

function addDays(date, days) {
    const copy = new Date(Number(date));
    copy.setDate(date.getDate() + days);
    return copy;
}

async function withdraw() {
    event.preventDefault();
    let amount = +event.target.elements.namedItem('amount').value;
    let address = event.target.elements.namedItem('address').value
    let balance = +event.target.elements.namedItem('address').value
    let type = select_withdraw.value;

    console.log(address)

    // if(!balance) {
    //     showError('Withdrawal Error', 'Sorry, your balance is empty, invest and try again!', 'warning');
    //     return;
    // }

    if(!amount || typeof amount !== 'number') {
        showError('Withdrawal Error', 'Please input valid amount to withdraw!', 'warning')
        return;
    } else if (!address) {
        showError('Withdrawal Error', 'Please provide valid bitcoin address to receive your withdrawal!', 'warning')
        return;
    } else if(!type) {
        showError('Withdrawal Error', 'Please choose the asset for your withdrawal!', 'warning')
        return;
    } else {

        let response = await fetch(host + '/makewithdrawal', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                amount,
                account: address,
                address,
                type
            })
        });
    
        let result = await response.json();

        if(result.code == 200) {
            showError('Withdrawal Successful', result.message, 'success')
        } else if(result.code == 400) {
            console.log(result)
            showError('Withdrawal Error', result.message, 'warning')
        } else {
            console.log(result)
            showError('Withdrawal Error', 'Something went wrong unexpectedly!', 'warning')
        }
    }
}


// function resetError(msg){
//     formError.classList.add('d-none');
//     errorText.textContent = "";
// }
function showError(title, msg, type){
    let popup2 = swal({   
        title: title,   
        text: msg,   
        type,   
        showCancelButton: false,
        showConfirmButton: true,   
        cancelButtonColor : "#141d33",
        confirmButtonColor: "#2196F3",   
        confirmButtonText: "dismiss",   
        closeOnConfirm: false 
    });
}
function newFilePopUp(){
    let popup2 = swal({   
        title: 'Upload New File',   
        text: '<input>',   
        // type : 'input',   
        html: '<p>fjfgfyuf</p>',
        showCancelButton: false,
        showConfirmButton: true,   
        cancelButtonColor : "#141d33",
        confirmButtonColor: "#2196F3",   
        confirmButtonText: "dismiss",   
        closeOnConfirm: false 
    });
}

function saveContent(type){
    event.preventDefault();
    let form = event.currentTarget;
    let content = form.elements.namedItem('content').value;
    if(type == 'tc'){
        saveTc(content)
    } else if(type == 'about'){
        saveAboutUs(content);
    }
}
async function saveTc(content){
    let formError =  d.querySelector('.form-error');
    let errorText = d.querySelector('.error-text');
    let save = await  fetch(host + '/user/updatetc', {
                headers : {
                    'Content-type' : 'application/json',
                },
                method : 'post',
                body : JSON.stringify({
                    tc: content
                })
            });
        let tcResult  = await save.json();
        if(save.status == 200 ){
            showFormSuccess('Field Updated Successfully')
        } else {
            showFormError('Something Went Wrong')
        }
}

async function saveAboutUs(content){
    // alert('yabor');
    let save = await  fetch(host + '/user/updateaboutus', {
                headers : {
                    'Content-type' : 'application/json',
                },
                method : 'post',
                body : JSON.stringify({
                    about_us : content
                })
            });
        let tcResult  = await save.json();
        if(save.status == 200 ){
            showFormSuccess('Field Updated Successfully')
        } else {
            showFormError('Something Went Wrong')
        }
}

function resetFormError(msg){
    let formError =  d.querySelector('.form-error');
    let formSuccess =  d.querySelector('.form-success');

    let errorText = d.querySelector('.error-text');
    formError.classList.add('d-none');
    formSuccess.classList.add('d-none');

    errorText.textContent = "";
    successText.textContent = "";
}
function showFormError(msg){
    let formError =  d.querySelector('.form-error');
    let formSuccess =  d.querySelector('.form-success');

    let errorText = d.querySelector('.error-text');
   
    errorText.textContent = msg;
    formError.classList.remove("d-none");
    formSuccess.classList.add("d-none");
}
function showFormSuccess(msg){
    let formError =  d.querySelector('.form-error');
    let formSuccess =  d.querySelector('.form-success');

    let successText = d.querySelector('.success-text');
    successText.textContent = msg;
    formSuccess.classList.remove("d-none");
    formError.classList.add('d-none');

}
function dismissAlert(){
    let btn = event.currentTarget;
    let parent = btn.parentElement;
    parent.classList.add('d-none');
}
async function uploadFile(){
    event.preventDefault();
    let formData = new FormData(event.currentTarget);
    let file = await fetch(host + "/User/filesUpdate", {
        headers : {
            "Content-T" : "multipart/form-data",
        },
        method : "POST",
        body : formData,
    });
   
    let result = await file.json();

    console.log(result);
    if(file.statusText == "OK"){
        showFormSuccess(result.message);
    } else {
       showFormError(result.messages.error);
    }
}
function approve(id){
    event.preventDefault();
    let btn = event.currentTarget;
    let actionType = btn.dataset.type;
    if(type == 'deposit'){
      return approveDeposit(id);
    } else if(type == 'withdraw'){
      return approveWithdraw(id);
    }
}
async function denyTransaction(id){
    event.preventDefault();
    let btn = event.currentTarget;
    let type = btn.dataset.type;
    let amount = btn.dataset.amount;
    let transaction = await fetch(host + '/User/denyTransaction', {
        headers : {
            'Content-Type' : 'application/json'
        },
        method : 'post',
        body : JSON.stringify({
            id,
            type,
            amount
            
        })
    });
    if(transaction.status == 200){
        let result = await transaction.json();
        btn.closest('.act-tr').style.display = 'none';
        if(++result.count == 1){
            $.toast({
                heading: 'Success',
                text: result.message,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
            return noTransaction(btn, type);
        }
        if(result.code == 200){
            $.toast({
                heading: 'Success',
                text: result.message,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
        } else {
            $.toast({
                heading: 'Success',
                text: result.message,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 10000,
                stack: 6
            });
        }
    } else {
        $.toast({
            heading: 'Error',
            text: "Something Went Wrong!",
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 10000,
            stack: 6
        });
    }
}
function noTransaction(btn, type){
    let parent = btn.closest('.box');
    let msgCont = parent.querySelector('.no-transaction');
    msgCont.innerHTML =  `<div class="box-body  text-center">
                        No <span class="text-capitalize">${type}</span> Request At The Moment
                    </div>`
    msgCont.classList.remove('d-none');
}
async function approveTransaction(id){
    event.preventDefault();
    let btn = event.currentTarget;
    let type = btn.dataset.type;
    let amount = btn.dataset.amount;
    console.log({id,
        type, amount})
    let transaction = await fetch(host + '/User/approveTransaction', {
        headers : {
            'Content-Type' : 'application/json'
        },
        method : 'post',
        body : JSON.stringify({
            id,
            type,
            amount
            
        })
    });
    if(transaction.status == 200){
        let result = await transaction.json();
        console.log(result);
        btn.closest('.act-tr').style.display = 'none';
        if(++result.count == 1){
            $.toast({
                heading: 'Success',
                text: result.message,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
            return noTransaction(btn, type);
        }
        if(result.code == 200){
            $.toast({
                heading: 'Success',
                text: result.message,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3500,
                stack: 6
            });
        } else {
            $.toast({
                heading: 'Success',
                text: result.message,
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 10000,
                stack: 6
            });
        }
    } else {
        $.toast({
            heading: 'Error',
            text: "Something Went Wrong!",
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 10000,
            stack: 6
        });
    }
}
async function sendReview(){
    event.preventDefault();
    let form = event.currentTarget;
    let input = form.elements.namedItem('review');
    let review = input.value;
    let sendreview = await fetch(host + '/User/createReview', {
        method : "post",
        headers: {
            'Content-Type': 'application/json'
        },
        body : JSON.stringify({
            review
        })
    });
    let result = await sendreview.json();
    if(result.code == 200){
        $.toast({
            heading: 'Success',
            text: result.message,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 10000,
            stack: 6
        });
        input.value = "";
    } else {
        $.toast({
            heading: 'Error',
            text: result.message,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 10000,
            stack: 6
        });
    }
}
async function toggleMode() {
    event.preventDefault();
    event.stopPropagation();
    let body = d.querySelector("body");
    let hasDarkMode = body.classList.contains('dark-skin');
    let mode = hasDarkMode ? "light-skin" : "dark-skin";
    let changeTheme = await fetch(host + "/User/changeTheme", {
        headers : {
            "Content-Type" : "application/json"
        },
        method : "post",
        body : JSON.stringify({
            mode
        })
    })
}
function validateChangePass(){
    event.preventDefault();
    let form = event.currentTarget;
    let password1 = form.elements.namedItem('password').value.trim();
    let password2 = form.elements.namedItem('rePassword').value.trim();
    if(!password1 || !password2){
        return showFormError("Inputs Cant Be Empty!");
    }
    if(password1.length < 6){
        return showFormError("Password Is Too Short!");
    }
    if(password1 !== password2){
        return showFormError("Passwords Doesnt Match!");
    }
    return form.submit();
}
    // function approveDeposit(id){
//     fetch(host + '/User')
// }
// function approveWithdraw(id){
//         fetch(host + '/User')
// }
// function denyDeposit(id){

// }
// function denyWithdraw(id){
    
// }
// alert("hy");