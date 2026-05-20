/*
=============================================================================================================================
    Login Form Submission Start Js Logic
=============================================================================================================================
*/

const togglePasswords = document.querySelectorAll('.toggle-password');
togglePasswords.forEach(toggle => {
    toggle.addEventListener('click', function () {
        const passwordInput =
        this.parentElement.querySelector('input');
        if(passwordInput.type === 'password'){
            passwordInput.type = 'text';
            this.classList.remove('ri-eye-line');
            this.classList.add('ri-eye-off-line');
        }else{
            passwordInput.type = 'password';
            this.classList.remove('ri-eye-off-line');
            this.classList.add('ri-eye-line');
        }
    });
});
const showSignup = document.getElementById('showSignup');
const showLogin = document.getElementById('showLogin');
const loginCard = document.querySelectorAll('.login-card');
const signupCard = document.querySelectorAll('.signup-card');
showSignup.addEventListener('click', function(){
    loginCard.forEach(card => {
        card.style.display = 'none';
    });
    signupCard.forEach(card => {
        card.style.display = 'block';
    });
});
showLogin.addEventListener('click', function(){
    signupCard.forEach(card => {
        card.style.display = 'none';
    });
    loginCard.forEach(card => {
        card.style.display = 'block';
    });
});
const loginForm = document.getElementById('loginForm');
loginForm.addEventListener('submit', function(e){
    e.preventDefault();
    const btnText = document.querySelector('.btn-text');
    const btnLogin = document.querySelector('.btn-login');
    const alertBox = document.querySelector('.alert-box');
    btnText.innerHTML = 'Please Wait...';
    btnLogin.disabled = true;
    const formData = new FormData(loginForm);
    fetch('ajax/login_api.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(res => {
        if(res.status === 'success'){
            alertBox.classList.remove('alert-danger');
            alertBox.classList.add('alert-success');
            alertBox.innerHTML = res.message;
            alertBox.style.display = 'block';
            setTimeout(function(){
                window.location.href = 'dashboard.php';
            }, 1500);
        }else{
            alertBox.classList.remove('alert-success');
            alertBox.classList.add('alert-danger');
            alertBox.innerHTML = res.message;
            alertBox.style.display = 'block';
            btnText.innerHTML = 'Login';
            btnLogin.disabled = false;
        }
    })
    .catch(error => {
        alertBox.classList.remove('alert-success');
        alertBox.classList.add('alert-danger');
        alertBox.innerHTML = 'Something went wrong';
        alertBox.style.display = 'block';
        btnText.innerHTML = 'Login';
        btnLogin.disabled = false;
    });
});

/*
=============================================================================================================================
    Login Form Submission End Js Logic
=============================================================================================================================
*/

/*
=============================================================================================================================
    Signup Form Validation and Submission Start Js Logic
=============================================================================================================================
*/
const signupForm = document.getElementById("signupForm");
const nameField = document.getElementById("name");
const emailField = document.getElementById("email");
const phoneField = document.getElementById("phone");
const passwordField = document.getElementById("password");
const confirmPasswordField = document.getElementById("confirm_password");
const errorName = document.querySelector(".error-name");
const errorEmail = document.querySelector(".error-email");
const errorPhone = document.querySelector(".error-phone");
const errorPassword = document.querySelector(".error-password");
const errorConfirmPassword = document.querySelector(".error-confirm-password");
const alertBox = document.querySelector(".alert-box");
nameField.addEventListener("input", function () {
    let value = this.value;
    value = value.replace(/[0-9]/g, '');
    value = value.replace(/[^a-zA-Z\s]/g, '');
    this.value = value;
    if(value.length < 3){
        errorName.innerHTML = "Name must be at least 3 characters";
    }else{
        errorName.innerHTML = "";
    }
});
phoneField.addEventListener("input", function () {
    let value = this.value;
    value = value.replace(/\D/g, '');
    value = value.substring(0, 10);
    this.value = value;
    if(value.length < 10){
        errorPhone.innerHTML = "Phone number must be 10 digits";
    }else{
        errorPhone.innerHTML = "";
    }
});
passwordField.addEventListener("input", function () {
    const password = this.value;
    const strongPassword =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;
    if(!strongPassword.test(password)){
        errorPassword.innerHTML =
        "Password must contain uppercase, lowercase, number & special character";
    }else{
        errorPassword.innerHTML = "";
    }
});
confirmPasswordField.addEventListener("input", function () {
    if(passwordField.value !== this.value){
        errorConfirmPassword.innerHTML =
        "Passwords do not match";
    }else{
        errorConfirmPassword.innerHTML = "";
    }
});
signupForm.addEventListener("submit", function (e) {
    e.preventDefault();
    const name = nameField.value.trim();
    const email = emailField.value.trim();
    const phone = phoneField.value.trim();
    const password = passwordField.value.trim();
    const confirmPassword = confirmPasswordField.value.trim();
    const strongPassword =
    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;
    let hasError = false;
    if(name === ""){
        errorName.innerHTML = "Name is required";
        hasError = true;
    }else if(/\d/.test(name)){
        errorName.innerHTML = "Numbers are not allowed";
        hasError = true;
    }else{
        errorName.innerHTML = "";
    }
    if(email === ""){
        errorEmail.innerHTML = "Email is required";
        hasError = true;
    }else{
        errorEmail.innerHTML = "";
    }
    if(phone.length !== 10){
        errorPhone.innerHTML =
        "Phone number must be 10 digits";
        hasError = true;
    }else{
        errorPhone.innerHTML = "";
    }
    if(!strongPassword.test(password)){
        errorPassword.innerHTML =
        "Enter strong password";
        hasError = true;
    }else{
        errorPassword.innerHTML = "";
    }
    if(password !== confirmPassword){
        errorConfirmPassword.innerHTML =
        "Passwords do not match";
        hasError = true;
    }else{
        errorConfirmPassword.innerHTML = "";
    }
    if(hasError){
        return;
    }
    const formData = new FormData(signupForm);
    fetch("ajax/signup_api.php", {
        method: "POST",
        body: formData
    })
    .then(async response => {
        const text = await response.text();
        try {
            return JSON.parse(text);
        } catch (e) {
            throw new Error(text);
        }
    })
    .then(data => {
        alertBox.style.display = "block";
        if(data.status === "success"){
            alertBox.classList.remove("alert-danger");
            alertBox.classList.add("alert-success");
            alertBox.innerHTML = data.message;
            signupForm.reset();
            setTimeout(() => {
                window.location.href = "dashboard.php";
            }, 1500);
        }else{
            alertBox.classList.remove("alert-success");
            alertBox.classList.add("alert-danger");
            alertBox.innerHTML = data.message;
            if(data.message === "Password must be strong"){
                errorPassword.innerHTML ="Password must contain uppercase, lowercase, number & special character";
            }
            if(data.message === "Passwords do not match"){
                errorConfirmPassword.innerHTML = "Passwords do not match";
            }
            if(data.message === "Phone number must be 10 digits"){
                errorPhone.innerHTML ="Phone number must be 10 digits";
            }
            if(data.message === "Name must contain only letters"){
                errorName.innerHTML ="Only letters allowed in name";
            }
            if(data.message === "Account already exists"){
                errorEmail.innerHTML ="Email already registered";
            }
        }
    })
    .catch(error => {
        alertBox.style.display = "block";
        alertBox.classList.remove("alert-success");
        alertBox.classList.add("alert-danger");
        alertBox.innerHTML = error.message;
    });
});

/*
=============================================================================================================================
    Signup Form Validation and Submission End Js Logic
=============================================================================================================================
*/