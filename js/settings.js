const mobile_menu = document.getElementById("mobile_menu")
const leave_mobile_menu = document.getElementById("leave_mobile_menu")
const modify_name = document.getElementById("modify_name")
const name_modifier = document.getElementById("name_modifier")


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

name_modifier.addEventListener('click',change_name)
mobile_menu.addEventListener('click',showLeft)
leave_mobile_menu.addEventListener('click', hide_left)