
const btn_sliderNext = document.getElementById("btn_sliderNext");
const btn_sliderBack = document.getElementById("btn_sliderBack");

//Aplico eventos a los elementos del DOM

//slider


const slider = document.querySelector(".slider");



btn_sliderNext.addEventListener("click",()=>{
    
    slider.scrollLeft += slider.offsetWidth;
    
});



btn_sliderBack.addEventListener("click",()=>{
    slider.scrollLeft -= slider.offsetWidth;

});
