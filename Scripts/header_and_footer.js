//Selecciono los elementos del DOM

//nav
const nav_off = document.querySelector(".nav_off");
//buttons
const btn_menu = document.getElementById("btn_menu");


btn_menu.addEventListener("click", dropMenu);

function dropMenu(){
    nav_off.classList.toggle("nav_on");
}

