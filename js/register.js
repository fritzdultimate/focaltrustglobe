const d = document, host = location.origin;
let formError =  d.querySelector('.reg-form-error');
let errorText = d.querySelector('.error-text');



window.onload = () => {
    let regForm =  d.querySelector('.registration-form');
    regForm.addEventListener('submit', register);
}

function getVars() {
    var $_GET = {};
    if(document.location.toString().indexOf('?') !== -1) {
        var query = document.location
                       .toString()
                       // get the query string
                       .replace(/^.*?\?/, '')
                       // and remove any existing hash string (thanks, @vrijdenker)
                       .replace(/#.*$/, '')
                       .split('&');
    
        for(var i=0, l=query.length; i<l; i++) {
           var aux = decodeURIComponent(query[i]).split('=');
           $_GET[aux[0]] = aux[1];
        }
    }
    //get the 'index' query parameter
    return $_GET;
}
async function register(event) {
    event.preventDefault();
    let regForm = event.currentTarget;
    let fullname = (regForm.elements.namedItem('fullname').value).toLowerCase();
    let username = (regForm.elements.namedItem('username').value).toLowerCase();
    let password = regForm.elements.namedItem('password').value;
    let rePassword = regForm.elements.namedItem('rePassword').value;

    let email = (regForm.elements.namedItem('email').value).toLowerCase();
    let acceptedTc = regForm.elements.namedItem('terms').checked;

    let hasEmptyValue = !!fullname && !!username && !!password && !!email;
    if(!hasEmptyValue){
        return showError("Inputs Can't Be Empty!");
    }
    if(password !== rePassword){
        return showError("Passwords Doesn't Match!");
    } if(!acceptedTc){
        return showError("You Must Accept Our Terms!");
    }
   let popup = swal({   
        title: "Registering Account",   
        text: "Please Wait...",   
        type: "info",   
        showCancelButton: false,
        showConfirmButton: false,   
        cancelButtonColor : "#141d33",
        confirmButtonColor: "#2196F3",   
        confirmButtonText: "Yes, Verify",   
        closeOnConfirm: false 
    });
    console.log(popup); 
    console.log(window.location)
    let getGet = getVars();
    let getValue;
    if(getGet.hasOwnProperty('ref')) {
        getValue = getGet['ref'];
    }
    let response = await fetch(host + '/register?ref=' + getValue , {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            fullname,
            username,
            password,
            email
        })
    });

    let result = await response.json();

    console.log(result);
    console.log(result.code);

    if(result.code == 200) {
        let popup2 = swal({   
            title: "Sending Verification Email",   
            text: "Please Wait...",   
            type: "info",   
            showCancelButton: false,
            showConfirmButton: false,   
            cancelButtonColor : "#141d33",
            confirmButtonColor: "#2196F3",   
            confirmButtonText: "Yes, Verify",   
            closeOnConfirm: false 
        });
        // send verification link
        console.log("Sending Verification mail");
        let response_v = await fetch(host + '/sendverificationlink', {
            method : "post",
            headers: {
                'Content-Type': 'application/json'
            },
            body : JSON.stringify({
                username
            })
        });
        let result_v = await response_v.json();
        if(result_v.code == 200){
            let popup2 = swal({   
                title: "Verification Email Sent",   
                text: "Please Check Your Email For Verification Link",   
                type: "success",   
                showCancelButton: false,
                showConfirmButton: true,   
                cancelButtonColor : "#141d33",
                confirmButtonColor: "#2196F3",   
                confirmButtonText: "dismiss",   
                closeOnConfirm: false 
            });
        } else {
            swal.close();
            showError(result_v.messages.error);
        }
    } else {
        swal.close();
        showError(result.messages.error);
    }
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
