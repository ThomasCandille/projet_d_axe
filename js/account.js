const connection_page = document.getElementById("connection_page")
const connect_button = document.getElementById("connect_button")
const subscribe_button = document.getElementById("subscribe_button")
const form_connect = document.getElementById("form_connect")
const form_subscribe = document.getElementById("form_subscribe")
const container_form_subscribe = document.getElementById("container_form_subscribe")
const container_form_connect = document.getElementById("container_form_connect")
const mobile_menu = document.getElementById("mobile_menu")
const leave_mobile_menu = document.getElementById("leave_mobile_menu")


const appearConnect = () => {
  form_connect.classList.remove("hidden")
  container_form_connect.classList.remove("hidden")
  connection_page.remove()
}

const appearSubscribe = () => {
  form_subscribe.classList.remove("hidden")
  container_form_subscribe.classList.remove("hidden")
  connection_page.remove()
}

const showLeft = () => {
  left.style.transform = "translateX(0%)"
  leave_mobile_menu.style.visibility= "visible"
}

const hide_left = () =>{
  left.style.transform = "translateX(-100%)"
  leave_mobile_menu.style.visibility= "hidden"
}

mobile_menu.addEventListener('click',showLeft)
leave_mobile_menu.addEventListener('click', hide_left)
connect_button.addEventListener('click', appearConnect)
subscribe_button.addEventListener('click', appearSubscribe)
