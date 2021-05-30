//  ETML
//	Author      : Younes Sayeh
//	Date        : 27.05.2021
//	Description : Profile Card

const clc = document.querySelector(".cancel");
const arr = document.querySelector(".arrContainer");
const leftContainer = document.querySelector(".leftContainer");

const clc2 = document.querySelector(".cancel2");
const arr2 = document.querySelector(".arrContainer2");
const leftContainer2 = document.querySelector(".leftContainer2");

const clc3 = document.querySelector(".cancel3");
const arr3 = document.querySelector(".arrContainer3");
const leftContainer3 = document.querySelector(".leftContainer3");

const clc4 = document.querySelector(".cancel4");
const arr4 = document.querySelector(".arrContainer4");
const leftContainer4 = document.querySelector(".leftContainer4");

arr.addEventListener("click", ()=>{
    arr.classList.add("activeArr");
    if(leftContainer.classList.contains("off")) {
        leftContainer.classList.remove("off");
        leftContainer.classList.add("active");
    }
});

clc.addEventListener("click", ()=>{
    arr.classList.remove("activeArr");
    if(leftContainer.classList.contains("active")) {
        leftContainer.classList.remove("active");
        leftContainer.classList.add("off");
    }
});


arr2.addEventListener("click", ()=>{
    arr2.classList.add("activeArr2");
    if(leftContainer2.classList.contains("off2")) {
        leftContainer2.classList.remove("off2");
        leftContainer2.classList.add("active2");
    }
});

clc2.addEventListener("click", ()=>{
    arr2.classList.remove("activeArr2");
    if(leftContainer2.classList.contains("active2")) {
        leftContainer2.classList.remove("active2");
        leftContainer2.classList.add("off2");
    }
});


arr3.addEventListener("click", ()=>{
    arr3.classList.add("activeArr3");
    if(leftContainer3.classList.contains("off3")) {
        leftContainer3.classList.remove("off3");
        leftContainer3.classList.add("active3");
    }
});

clc3.addEventListener("click", ()=>{
    arr3.classList.remove("activeArr3");
    if(leftContainer3.classList.contains("active3")) {
        leftContainer3.classList.remove("active3");
        leftContainer3.classList.add("off3");
    }
});


arr4.addEventListener("click", ()=>{
    arr4.classList.add("activeArr4");
    if(leftContainer4.classList.contains("off4")) {
        leftContainer4.classList.remove("off4");
        leftContainer4.classList.add("active4");
    }
});

clc4.addEventListener("click", ()=>{
    arr4.classList.remove("activeArr4");
    if(leftContainer4.classList.contains("active4")) {
        leftContainer4.classList.remove("active4");
        leftContainer4.classList.add("off4");
    }
});

// const clc = document.querySelectorAll(".cancel");
// const arr = document.querySelectorAll(".arrContainer");
// const leftContainer = document.querySelectorAll(".leftContainer");

// arr.forEach(arrs => {
//     arrs.addEventListener("click", ()=>{
//         arr.forEach(arrActv => arrActv.classList.add("activeArr"));
//         leftContainer.forEach(leftContainers => {
//             if(leftContainers.classList.contains("off")) { 
//                 leftContainers.classList.remove("off");
//                 leftContainers.classList.add("active");
//             }
//         });
//     });
// });

// clc.forEach(clcs => {
//     clcs.addEventListener("click", ()=>{
//         arr.forEach(arrClc => arrClc.classList.remove("activeArr"));
//         leftContainer.forEach(leftContainers => {
//             if(leftContainers.classList.contains("active")) { 
//                 leftContainers.classList.remove("active");
//                 leftContainers.classList.add("off");
//             }
//         });
//     });
// });
