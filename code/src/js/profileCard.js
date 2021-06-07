//  ETML
//	Author      : Younes Sayeh
//	Date        : 27.05.2021
//	Description : Profile Card

for(let i = 1; i <= 4; i++) {
    let clc = document.querySelector("#member"+i + " .cancel");
    let arr = document.querySelector("#member"+i + " .arrContainer");
    let leftContainer = document.querySelector("#member"+i + " .leftContainer");

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
    
}