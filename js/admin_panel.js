/***************************ADMIN PANEL***************************** */
const openBtn =document.querySelector("#open_admin_panel");
const adminPanel =document.querySelector("#admin_panel");
adminPanel.style.display = "none";
let isPanelopen = false;
function openAdminPanel(){
    if(!isPanelopen){
        openBtn.innerHTML = "close admin panel";
        adminPanel.style.display = "block";
        isPanelopen = true;
    }else{
        openBtn.innerHTML = "open admin panel";
        adminPanel.style.display = "none";
        isPanelopen = false;
    }
    
}
/***************************BLOG***************************** */
const btn1 =document.querySelector("#blog_btn1");
const btn2 =document.querySelector("#blog_btn2");
const btn3 =document.querySelector("#blog_btn3");
const openBLogBtn =document.querySelector("#blog_open_btn");
const submitBtn = document.querySelector("#submit_btn");
const titleInput = document.querySelector("#title_input");
const contentInput = document.querySelector("#content_input");
const input1 = document.querySelector("#blog_input1");
const input2 = document.querySelector("#blog_input2");
const input3 = document.querySelector("#blog_input3");
input1.style.display = "none";
input2.style.display = "none";
input3.style.display = "none";
btn1.style.display = "none";
btn2.style.display = "none";
btn3.style.display = "none";
submitBtn.style.display = "none";
titleInput.style.display = "none";
contentInput.style.display = "none";
// indicators !!
let isBlogOpened = false;
let isInput1opend = false;
let isInput2opend = false;
let isInput3opend = false;
function editBlogs(){
    if(isBlogOpened){
        openBLogBtn.innerHTML = "פתח";
        btn1.style.display = "none";
        btn2.style.display = "none";
        btn3.style.display = "none";
        titleInput.style.display = "none";
        contentInput.style.display = "none";
        submitBtn.style.display = "none";
        isBlogOpened = false;
    }else{
        openBLogBtn.innerHTML = "סגור";
        btn1.style.display = "block";
        btn2.style.display = "block";
        btn3.style.display = "block";
        titleInput.style.display = "block";
        contentInput.style.display = "block";
        submitBtn.style.display = "block";
        btn1.innerHTML = "סגור";
        input1.style.display = "block";
        isBlogOpened = true;
    }
}
function showProfileInput(){
    console.log(isInput1opend)
    if(isInput1opend){
        btn1.innerHTML = "הוסף תמונת פרופיל";
        input1.style.display = "none";
        isInput1opend = false;
    }else{
        btn1.innerHTML = "סגור";
        input1.style.display = "block";
        isInput1opend = true;
    }
    
}
function showImgInput() {
    if(isInput2opend){
        btn2.innerHTML = "הוסף תמונה";
        input2.style.display = "none";
        isInput2opend = false;
    }else{
        btn2.innerHTML = "סגור";
        input2.style.display = "block";
        isInput2opend = true;
    }
}
function showDeleteInput() {
    if(isInput3opend){
        btn3.innerHTML = "מחק בלוג";
        input3.style.display = "none";
        isInput3opend = false;
    }else{
        btn3.innerHTML = "סגור";
        input3.style.display = "block";
        isInput3opend = true;
    }
}
/***********************RESOURCES************************** */
const videoBtn =document.querySelector("#res_btn1");
const playlistBtn =document.querySelector("#res_btn2");
const channelBtn =document.querySelector("#res_btn3");
const resInput1 = document.querySelector("#res_input1");
const resInput2 = document.querySelector("#res_input2");
const resInput3 = document.querySelector("#res_input3");
const resSubmit = document.querySelector("#res_submit");
resInput1.style.display = "none";
resInput2.style.display = "none";
resInput3.style.display = "none";
resSubmit.style.display = "none";
let isVideo = true;
let isPLaylist = true;
let isChannel = true;
function showNewResInput(type) {
    if(type === "video"){
        resSubmit.name = "new_video";
        if(isVideo){
            videoBtn.innerHTML = "סגור";
            playlistBtn.style.display = "none";
            channelBtn.style.display = "none";
            resInput1.style.display = "block";
            resInput1.placeholder = "title";
            resInput2.style.display = "block";
            resInput2.placeholder = "video id";
            resSubmit.style.display = "block";
            isVideo = false;
        }else{
            videoBtn.innerHTML = "סרטון";
            resInput1.style.display = "none";
            resInput2.style.display = "none";
            resSubmit.style.display = "none";
            playlistBtn.style.display = "block";
            channelBtn.style.display = "block";
            isVideo = true;
        }
    }else if(type === "playlist"){
        resSubmit.name = "new_playlist";
        if(isPLaylist){
            playlistBtn.innerHTML = "סגור";
            videoBtn.style.display = "none";
            channelBtn.style.display = "none";
            resInput1.style.display = "block";
            resInput1.placeholder = "first video id";
            resInput2.style.display = "block";
            resInput2.placeholder = "playlist link";
            resInput3.style.display = "block";
            resInput3.placeholder = "name";
            resSubmit.style.display = "block";
            isPLaylist = false;
        }else{
            playlistBtn.innerHTML = "פלייליסט";
            resInput1.style.display = "none";
            resInput2.style.display = "none";
            resInput3.style.display = "none";
            resSubmit.style.display = "none";
            videoBtn.style.display = "block";
            channelBtn.style.display = "block";
            isPLaylist = true;
        }
    }else{
        if(isChannel){
            resSubmit.name = "new_channel";
            channelBtn.innerHTML = "סגור";
            videoBtn.style.display = "none";
            playlistBtn.style.display = "none";
            resInput1.style.display = "block";
            resInput1.placeholder = "channel link";
            resInput2.style.display = "block";
            resInput2.placeholder = "channel name";
            resSubmit.style.display = "block";
            isChannel = false;
        }else{
            channelBtn.innerHTML = "ערוץ";
            videoBtn.style.display = "block";
            playlistBtn.style.display = "block";
            resInput1.style.display = "none";
            resInput2.style.display = "none";
            resSubmit.style.display = "none";
            isChannel = true;
        }
    }
}
/***********************COURSES************************** */
const courseBtn = document.querySelector("#course_btn1");
const courseInput1 = document.querySelector("#course_input1");
const courseInput2 = document.querySelector("#course_input2");
const courseInput3 = document.querySelector("#course_input3");
const courseInput4 = document.querySelector("#course_input4");
const courseInput5 = document.querySelector("#course_input5");
const courseInput6 = document.querySelector("#course_input6");
const courseSubmit = document.querySelector("#course_submit");
courseInput1.style.display = "none";
courseInput2.style.display = "none";
courseInput3.style.display = "none";
courseInput4.style.display = "none";
courseInput5.style.display = "none";
courseInput6.style.display = "none";
courseSubmit.style.display = "none";
let isVisible = false;
function displayCoursePanel() {
        if(!isVisible){
            courseInput1.style.display = "block";
            courseInput2.style.display = "block";
            courseInput3.style.display = "block";
            courseInput4.style.display = "block";
            courseInput5.style.display = "block";
            courseInput6.style.display = "block";
            courseSubmit.style.display = "block";
            courseBtn.innerHTML = "סגור";
            isVisible = true;
        }else{
            courseInput1.style.display = "none";
            courseInput2.style.display = "none";
            courseInput3.style.display = "none";
            courseInput4.style.display = "none";
            courseInput5.style.display = "none";
            courseInput6.style.display = "none";
            courseSubmit.style.display = "none";
            courseBtn.innerHTML = "פתח";
            isVisible = false;
        }
    }