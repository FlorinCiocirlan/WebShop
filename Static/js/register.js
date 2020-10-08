function getInputs(){
    let password = document.getElementById('password');
    let confirmPass = document.getElementById('confirmPassword');
    return [password,confirmPass];
}

function assetPassword(){
    let password = getInputs()[0];
    let confirmPass = getInputs()[1];

    let submit = document.getElementById('submitBtn');

    confirmPass.addEventListener('keyup',function(){
        if(confirmPass.value !== password.value){
            confirmPass.style.backgroundColor="#f96767";
            submit.disabled = true;
        } else {
            confirmPass.style.backgroundColor="#85e085";
            submit.disabled = false;
        }
    })
}

assetPassword();