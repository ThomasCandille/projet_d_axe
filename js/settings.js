const mobile_menu = document.getElementById("mobile_menu")
const leave_mobile_menu = document.getElementById("leave_mobile_menu")
const modify_name = document.getElementById("modify_name")
const name_modifier = document.getElementById("name_modifier")
const modify_mail = document.getElementById("modify_mail")
const mail_modifier = document.getElementById("mail_modifier")
const modify_password = document.getElementById("modify_password")
const password_modifier = document.getElementById("password_modifier")



const showLeft = () => {
  left.style.transform = "translateX(0%)"
  leave_mobile_menu.style.visibility= "visible"
}

const hide_left = () =>{
  left.style.transform = "translateX(-100%)"
  leave_mobile_menu.style.visibility= "hidden"
}

const change_name = () =>{
  modify_name.style.visibility= "visible"
}

const change_mail = () =>{
  modify_mail.style.visibility= "visible"
}

const change_password = () =>{
  modify_password.style.visibility= "visible"
}

name_modifier.addEventListener('click',change_name)
mail_modifier.addEventListener('click',change_mail)
password_modifier.addEventListener('click',change_password)
mobile_menu.addEventListener('click',showLeft)
leave_mobile_menu.addEventListener('click', hide_left)