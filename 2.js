function formValidasi(usernameInput,passwordInput){
    var username 	= usernameInput
    var password    = passwordInput
    var cekUser 		= new RegExp(/^[a-z]+[a-z._]{7,11}$/);
    var cekPass     = new RegExp(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{9,9}$/); 
    function usernameValidity(){
        return Boolean(username.match(cekUser))
    }
    function passwordValidity(){
        return Boolean(password.match(cekPass))
    }
    console.log(usernameValidity())
    console.log(passwordValidity())
}

formValidasi('JOHNSmith','p4ssword%');