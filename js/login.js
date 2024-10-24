const d = document, host = location.origin;

let formError =  d.querySelector('.login-form-error');
let errorText = d.querySelector('.error-text');


window.onload = () => {
    let loginForm =  d.querySelector('.login-form');
    loginForm.addEventListener('submit', login);
}
function login(){
    event.preventDefault();

    let loginForm = event.currentTarget;
    let login = loginForm.elements.namedItem('login').value;
    let password = loginForm.elements.namedItem('password').value;
    if(!login || !password){
      return showError("Inputs Can't Be Empty");
    }

    fetch(host + '/login',{
        method : "post",
        body :JSON.stringify( {
            login,
            password
        }),
        headers : {
            "Content-Type" : "application/json",
            "X-Requested-With" : "XMLHttpRequest"
        }
    }).then((response) => {
        return response.json();

    }).then((data) => {
        console.log(data);
        if(data.messages){
            if(data.messages.code == 401){
                // let msg = data.messages.error;
                swal({   
                    title: "Verification",   
                    text: "You have to verify your account to login, click below to verify",   
                    type: "warning",   
                    showCancelButton: true,   
                    cancelButtonColor : "#141d33",
                    confirmButtonColor: "#2196F3",   
                    confirmButtonText: "Yes, Verify",   
                    closeOnConfirm: false 
                }, function(){   
                    swal("Please Wait", "Account Verification In progress...", "info"); 
                });        
            } else {
                let msg = data.messages.error;
                showError(msg)
            }
        } else {
            location.href = '/dashboard';
        }
    });

}
function resetError(msg){
    formError.classList.add('d-none');
    errorText.textContent = "";
}
function showError(msg){
    errorText.textContent = msg;
    formError.classList.remove("d-none");
}
function dismissAlert(){
    let btn = event.currentTarget;
    let parent = btn.parentElement;
    parent.classList.add('d-none');
}