const connection_page = document.getElementById("connection_page")
const connect_button = document.getElementById("connect_button")
const subscribe_button = document.getElementById("subscribe_button")
const form_connect = document.getElementById("form_connect")
const form_subscribe = document.getElementById("form_subscribe")

const appearConnect = () => {
  form_connect.classList.remove("hidden")
  connection_page.remove()
}

const appearSubscribe = () => {
  form_subscribe.classList.remove("hidden")
  connection_page.remove()
}

connect_button.addEventListener('click', appearConnect)
subscribe_button.addEventListener('click', appearSubscribe)
