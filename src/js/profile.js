
// delete input show and unshow effect
const errorParag = document.querySelector('#delete_label');
const deleteInput = document.querySelector('#conf_del_input');
const deleteBtn = document.querySelector('open_delete_btn');
const deleteSubmit = document.querySelector('#conf_del_submit');
errorParag.style.display = "none";
deleteInput.style.display = "none";
deleteSubmit.style.display = "none";
let isDeleteOpen = false;

function showDeleteAccount() {
    if (isDeleteOpen) {
        errorParag.style.display = "none";
        deleteInput.style.display = "none";
        deleteSubmit.style.display = "none";
        isDeleteOpen = false;
    }else{
        errorParag.style.display = "block";
        deleteInput.style.display = "block";
        deleteSubmit.style.display = "block";
        isDeleteOpen = true;
    }
}

// horizontal course scroll 
const element = document.querySelector("#courses_container");

element.addEventListener('wheel', (event) => {
  event.preventDefault();

  element.scrollBy({
    left: event.deltaY < 0 ? -200 : 200,
    
  });
});