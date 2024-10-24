let catchErrorMsg = "sorry, something went wrong";
let host = location.origin;
let urlPrefix = host + '/app/account/';
let headers = {
    'X-Requested-With' : 'XMLHttpRequest',
    'Content-Type' : 'application/json'
};
withdrawalForm = document.querySelector('.withdrawal-form');

window.addEventListener('load', () => {
    withdrawalForm.addEventListener('submit', (e) => {
        e.preventDefault();
        showLoading();
        let withdrawalData = jsonFormData(e.currentTarget);
        let date = withdrawalData['date'].replace('T', ' ');
        withdrawalData['date'] = (date  + ':' + new Date().getSeconds());
        quickWithdrawal(withdrawalData);
    });
})

function quickWithdrawal(form){
    fetch(urlPrefix + 'quick-withdrawal', {
        method : 'post',
        headers,
        body : JSON.stringify((form))
    }).then((res) => {
        hideLoading();
        return res.json();
    })
    .then((data) => {
        console.log(data);
        if('errors' in data){
            let errorMsg = getResponse(data);
            // LobiNotify('error', errorMsg);
            alert(errorMsg);
            // location.reload();
        }
        else if('success' in data){
            let successMsg = getResponse(data, 'success');
            alert(successMsg)
            location.reload();
            // LobiNotify('success', successMsg);
        } else {
            // LobiNotify('error', catchErrorMsg);   
            alert(catchErrorMsg)
            // location.reload();
        }
     }).catch((err) => {
        //  hideLoading();
        // LobiNotify('error', catchErrorMsg);
        alert(catchErrorMsg);
        // location.reload();

     });
}
