const menuToggle = document.getElementById("menuToggle");

const navMenu = document.querySelector(".nav-menu");

menuToggle.addEventListener("click", function(){

    navMenu.classList.toggle("active");

    if(navMenu.classList.contains("active")){

        menuToggle.innerHTML =
        '<i class="ri-close-line"></i>';

    }else{

        menuToggle.innerHTML =
        '<i class="ri-menu-3-line"></i>';

    }

});

