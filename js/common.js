const sidebar = document.getElementById("sidebar");
const sidebarToggle = document.getElementById("sidebarToggle");
const sidebarClose =document.getElementById("sidebarClose");
sidebarToggle.addEventListener("click", function(){
    sidebar.classList.add("active");
});
sidebarClose.addEventListener("click", function(){
    sidebar.classList.remove("active");
});
