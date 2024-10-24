let promoteBtn = document.querySelectorAll('.switch-promote');
let compoundBtn = document.querySelectorAll('.switch-compound');
let suspendBtn = document.querySelectorAll('.switch-suspend');
let adminBtn = document.querySelectorAll('.toggle-admin');

let compoundingDurationBtn = document.querySelectorAll('.choose-duration');
let compoundingAmountBtn = document.querySelectorAll('.choose-amount');

let catchErrorMsg = "sorry, something went wrong";

let host = location.origin;
let urlPrefix = host + '/app/';
let headers = {
    'X-Requested-With' : 'XMLHttpRequest',
    'Content-Type' : 'application/json'
};

[...compoundingDurationBtn].forEach(btn => {
    btn.addEventListener('input', (el) => {
        el.preventDefault();
        fetch(urlPrefix + `admin/compound/duration/user/${el.currentTarget.dataset.id}`, {
            method : 'post',
            headers,
            body: JSON.stringify({
                duration: el.currentTarget.value
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
                // showErrorModal(errorMsg, ['addCardActionSheet']);
                // alert(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                // showSuccessModal(successMsg, ['addCardActionSheet'])
                // alert(successMsg)
            } else {
                // hideLoading();
                // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
                // alert('we do not know what went wrong! Chai!')  
            }
        }).catch((err) => {
            alert(err);
            // hideLoading();
            // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
        });
    })
});

[...compoundingAmountBtn].forEach(btn => {
    btn.addEventListener('input', (el) => {
        el.preventDefault();
        fetch(urlPrefix + `admin/compound/amount/user/${el.currentTarget.dataset.id}`, {
            method : 'post',
            headers,
            body: JSON.stringify({
                amount: el.currentTarget.value
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
                // showErrorModal(errorMsg, ['addCardActionSheet']);
                // alert(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                // showSuccessModal(successMsg, ['addCardActionSheet'])
                // alert(successMsg)
            } else {
                // hideLoading();
                // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
                // alert('we do not know what went wrong! Chai!')  
            }
        }).catch((err) => {
            alert(err);
            // hideLoading();
            // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
        });
    })
});

[...promoteBtn].forEach(btn => {
    btn.addEventListener('change', (el) => {
        el.preventDefault();
        fetch(urlPrefix + `admin/promote/user/${el.currentTarget.dataset.id}`, {
            method : 'post',
            headers
        }).then((res) => {
            hideLoading();
            return res.json();
            // return res.text();
        })
        .then((data) => {
            console.log(data);
            if('errors' in data){
                let errorMsg = getResponse(data);
                // showErrorModal(errorMsg, ['addCardActionSheet']);
                alert(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                // showSuccessModal(successMsg, ['addCardActionSheet'])
                alert(successMsg)
            } else {
                // hideLoading();
                // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
                alert('we do not know what went wrong! Chai!')  
            }
        }).catch((err) => {
            alert(err);
            // hideLoading();
            // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
        });
    })
});

[...compoundBtn].forEach(btn => {
    btn.addEventListener('change', (el) => {
        el.preventDefault();
        fetch(urlPrefix + `admin/compound/user/${el.currentTarget.dataset.id}`, {
            method : 'post',
            headers
        }).then((res) => {
            hideLoading();
            return res.json();
            // return res.text();
        })
        .then((data) => {
            console.log(data);
            if('errors' in data){
                let errorMsg = getResponse(data);
                // showErrorModal(errorMsg, ['addCardActionSheet']);
                alert(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                // showSuccessModal(successMsg, ['addCardActionSheet'])
                alert(successMsg)
            } else {
                // hideLoading();
                // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
                alert('we do not know what went wrong! Chai!')  
            }
        }).catch((err) => {
            alert(err);
            // hideLoading();
            // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
        });
    })
});

[...suspendBtn].forEach(btn => {
    btn.addEventListener('change', (el) => {
        el.preventDefault();
        fetch(urlPrefix + `admin/suspend/user/${el.currentTarget.dataset.id}`, {
            method : 'post',
            headers
        }).then((res) => {
            hideLoading();
            return res.json();
            // return res.text();
        })
        .then((data) => {
            console.log(data);
            if('errors' in data){
                let errorMsg = getResponse(data);
                // showErrorModal(errorMsg, ['addCardActionSheet']);
                alert(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                // showSuccessModal(successMsg, ['addCardActionSheet'])
                alert(successMsg)
            } else {
                // hideLoading();
                // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
                alert("We do not know what is wrong! Chai")
            }
        }).catch((err) => {
            alert(err);
            // hideLoading();
            // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
        });
    })
});

[...adminBtn].forEach(btn => {
    btn.addEventListener('change', (el) => {
        el.preventDefault();
        fetch(urlPrefix + `admin/user/admin/${el.currentTarget.dataset.id}`, {
            method : 'post',
            headers
        }).then((res) => {
            hideLoading();
            return res.json();
            // return res.text();
        })
        .then((data) => {
            console.log(data);
            if('errors' in data){
                let errorMsg = getResponse(data);
                // showErrorModal(errorMsg, ['addCardActionSheet']);
                alert(errorMsg);
            }
            else if('success' in data){
                let successMsg = getResponse(data, 'success');
                // showSuccessModal(successMsg, ['addCardActionSheet'])
                alert(successMsg)
            } else {
                // hideLoading();
                // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
                alert("We do not know what is wrong! Chai");  
            }
        }).catch((err) => {
            alert(err);
            // hideLoading();
            // showErrorModal(catchErrorMsg, ['addCardActionSheet']);
        });
    })
})

