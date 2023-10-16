const link1 = document.querySelector(".link1");
const link2 = document.querySelector(".link2");
const link3 = document.querySelector(".link3");
const link4 = document.querySelector(".link4");
const link5 = document.querySelector(".link5");

const nav_container = document.querySelector(".nav_container");

link1.addEventListener("mouseover",() =>{
    nav_container.style.borderBottom = "solid .3em #5BC0EB";
    link2.style.opacity = "0.2";
    link3.style.opacity = "0.2";
    link4.style.opacity = "0.2";
    link5.style.opacity = "0.2";
})
link1.addEventListener("mouseout",() =>{
    nav_container.style.borderBottom = "solid .3em #252525";
    link1.style.color = "#5BC0EB";
    link2.style.opacity = "1";
    link3.style.opacity = "1";
    link4.style.opacity = "1";
    link5.style.opacity = "1";
})
link2.addEventListener("mouseover",() =>{
    nav_container.style.borderBottom = "solid .3em #FDE74C";
    link1.style.opacity = "0.2";
    link3.style.opacity = "0.2";
    link4.style.opacity = "0.2";
    link5.style.opacity = "0.2";
})
link2.addEventListener("mouseout",() =>{
    nav_container.style.borderBottom = "solid .3em #252525";
    link1.style.opacity = "1";
    link3.style.opacity = "1";
    link4.style.opacity = "1";
    link5.style.opacity = "1";
})
link3.addEventListener("mouseover",() =>{
    nav_container.style.borderBottom = "solid .3em #9BC53D";
    link2.style.opacity = "0.2";
    link1.style.opacity = "0.2";
    link4.style.opacity = "0.2";
    link5.style.opacity = "0.2";
})
link3.addEventListener("mouseout",() =>{
    nav_container.style.borderBottom = "solid .3em #252525";
    link2.style.opacity = "1";
    link1.style.opacity = "1";
    link4.style.opacity = "1";
    link5.style.opacity = "1";
})
link4.addEventListener("mouseover",() =>{
    nav_container.style.borderBottom = "solid .3em #C3423F";
    link2.style.opacity = "0.2";
    link3.style.opacity = "0.2";
    link1.style.opacity = "0.2";
    link5.style.opacity = "0.2";
})
link4.addEventListener("mouseout",() =>{
    nav_container.style.borderBottom = "solid .3em #252525";
    link2.style.opacity = "1";
    link3.style.opacity = "1";
    link1.style.opacity = "1";
    link5.style.opacity = "1";
})
link5.addEventListener("mouseover",() =>{
    nav_container.style.borderBottom = "solid .3em #764ada ";
    //nav_container.classList.add('accounteffect');
    link2.style.opacity = "0.2";
    link3.style.opacity = "0.2";
    link1.style.opacity = "0.2";
    link4.style.opacity = "0.2";
})
link5.addEventListener("mouseout",() =>{
    nav_container.style.borderBottom = "solid .3em #252525";
    //nav_container.classList.remove('accounteffect');
    link2.style.opacity = "1";
    link3.style.opacity = "1";
    link1.style.opacity = "1";
    link4.style.opacity = "1";
})

/***********************DELETE ACCOUNT************************** */
const delete_open_btn = document.querySelector('#open_delete_btn')
const delete_input = document.querySelector('#conf_del_input')
const delete_label = document.querySelector('#delete_label')
const delete_submit = document.querySelector('#conf_del_submit')
delete_input.style.display = "none";
delete_submit.style.display = "none";
delete_label.style.display = "none";
let isDelete = false;
function showDeleteAccount() {
    if(isDelete){
        delete_open_btn.innerHTML = "מחק חשבון לצמיתות";
        delete_input.style.display = "none";
        delete_submit.style.display = "none";
        delete_label.style.display = "none";
        isDelete = false;
    }else{
        delete_open_btn.innerHTML = "סגור";
        delete_input.style.display = "block";
        delete_submit.style.display = "block";
        delete_label.style.display = "block";
        isDelete = true;
    }
}