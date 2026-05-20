const contactForm=document.getElementById("contactForm");

const fullName=document.getElementById("full_name");
const email=document.getElementById("email");
const phone=document.getElementById("phone");
const message=document.getElementById("message");

const errorName=document.querySelector(".error-name");
const errorEmail=document.querySelector(".error-email");
const errorPhone=document.querySelector(".error-phone");
const errorMessage=document.querySelector(".error-message");

const alertBox=document.querySelector(".alert-box");

fullName.addEventListener("input",function(){

    let value=this.value;

    value=value.replace(/[0-9]/g,'');
    value=value.replace(/[^a-zA-Z\s]/g,'');

    this.value=value;

    if(value.trim().length<3){

        errorName.innerHTML=
        "Enter valid full name";

    }else{

        errorName.innerHTML="";
    }

});

phone.addEventListener("input",function(){

    let value=this.value;

    value=value.replace(/\D/g,'');

    value=value.substring(0,10);

    this.value=value;

    if(value.length<10){

        errorPhone.innerHTML=
        "Phone number must be 10 digits";

    }else{

        errorPhone.innerHTML="";
    }

});

email.addEventListener("input",function(){

    const emailPattern=
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(!emailPattern.test(this.value.trim())){

        errorEmail.innerHTML=
        "Enter valid email address";

    }else{

        errorEmail.innerHTML="";
    }

});

message.addEventListener("input",function(){

    if(this.value.trim().length<10){

        errorMessage.innerHTML=
        "Message must be at least 10 characters";

    }else{

        errorMessage.innerHTML="";
    }

});

contactForm.addEventListener("submit",function(e){

    e.preventDefault();

    clearErrors();

    let hasError=false;

    const nameValue=
    fullName.value.trim();

    const emailValue=
    email.value.trim();

    const phoneValue=
    phone.value.trim();

    const messageValue=
    message.value.trim();

    const emailPattern=
    /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if(nameValue===""){

        errorName.innerHTML=
        "Full name is required";

        hasError=true;

    }else if(nameValue.length<3){

        errorName.innerHTML=
        "Enter valid full name";

        hasError=true;
    }

    if(emailValue===""){

        errorEmail.innerHTML=
        "Email is required";

        hasError=true;

    }else if(
        !emailPattern.test(emailValue)
    ){

        errorEmail.innerHTML=
        "Enter valid email address";

        hasError=true;
    }

    if(phoneValue===""){

        errorPhone.innerHTML=
        "Phone is required";

        hasError=true;

    }else if(
        phoneValue.length!==10
    ){

        errorPhone.innerHTML=
        "Phone number must be 10 digits";

        hasError=true;
    }

    if(messageValue===""){

        errorMessage.innerHTML=
        "Message is required";

        hasError=true;

    }else if(
        messageValue.length<10
    ){

        errorMessage.innerHTML=
        "Message must be at least 10 characters";

        hasError=true;
    }

    if(hasError){
        return;
    }

    const submitBtn=
    document.querySelector(
        ".submit-btn"
    );

    submitBtn.disabled=true;

    submitBtn.innerHTML=
    "Sending...";

    const formData=
    new FormData(contactForm);

    fetch(
        "ajax/contact-sub.php",
        {
            method:"POST",
            body:formData
        }
    )
    .then(response=>response.json())
    .then(data=>{

        alertBox.style.display=
        "block";

        if(data.status==="success"){

            alertBox.className=
            "alert-box alert-success";

            alertBox.innerHTML=
            data.message;

            contactForm.reset();

            clearErrors();

        }else{

            alertBox.className=
            "alert-box alert-error";

            alertBox.innerHTML=
            data.message;
        }

        setTimeout(()=>{

            alertBox.style.display=
            "none";

        },5000);

    })
    .catch(()=>{

        alertBox.style.display=
        "block";

        alertBox.className=
        "alert-box alert-error";

        alertBox.innerHTML=
        "Something went wrong";

    })
    .finally(()=>{

        submitBtn.disabled=
        false;

        submitBtn.innerHTML=
        `<span class="btn-text">
            Send Message
        </span>`;
    });

});

function clearErrors(){

    errorName.innerHTML="";
    errorEmail.innerHTML="";
    errorPhone.innerHTML="";
    errorMessage.innerHTML="";
}