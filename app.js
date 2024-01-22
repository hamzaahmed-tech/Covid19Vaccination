const Username = document.getElementById("name"),
  contact = document.getElementById("contact"),
  email = document.getElementById("email"),
  pass = document.getElementById("pass"),
  cpass = document.getElementById("cpass"),
  submitBtn = document.getElementById("submit"),
  form = document.getElementById("form"),
  eye_icon = document.getElementById("eye_icon"),
  notification = document.querySelectorAll('.notification'),
  themeInput = document.querySelector('#themeInput'),
  eye_slash = document.querySelector('.fa-eye-slash');

// form.addEventListener("submit", (e) => {
//   e.preventDefault();
// });


submitBtn.addEventListener("click", () => {
  if (
    Username.value.trim() != "" &&
    contact.value.trim() != "" &&
    email.value.trim() != "" &&
    pass.value.trim() != ""
    
  ) {
    console.log('all values is filled up !');
  }
  
//   boder transparent
  if (Username.value.trim() !== "") {
    Username.style.border = "transparent";
  }
  if (contact.value.trim() !== "") {
    contact.style.border = "transparent";
  }
  if (email.value.trim() !== "") {
    email.style.border = "transparent";
  }
  if (pass.value.trim() !== "") {
    pass.style.border = "transparent";
  }

  // border red
  if (Username.value.trim() == "") {
    Username.style.border = "1px solid rgb(194, 61, 61)";
  }
  if (contact.value.trim() == "") {
    contact.style.border = "1px solid rgb(194, 61, 61)";
  }
  if (email.value.trim() == "") {
    email.style.border = "1px solid rgb(194, 61, 61)";
  }
  if (pass.value.trim() == "") {
    pass.style.border = "1px solid rgb(194, 61, 61)";
  }
});

const eyeFuntion = ()=>{
    pass.type == 'password' ? pass.type = 'text' : pass.type = 'password';
    eye_icon.classList.toggle('eye_show');
    eye_slash.classList.toggle('eye_slash_hide');
}

eye_icon.addEventListener('click',()=>{
   eyeFuntion()
})
eye_slash.addEventListener('click',()=>{
    eyeFuntion()
})
notification.forEach((crr)=>{
 let  cross_icon = crr.querySelector('.cross_icon i');
 cross_icon.addEventListener('click',()=>{
   crr.remove()
  })


})

