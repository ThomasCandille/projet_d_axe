const li_tag = document.getElementsByClassName("tag")
const li_post = document.getElementsByClassName("post")
const li_tag_post = document.getElementsByClassName("tag_post")
const li_poubelle = document.getElementsByClassName("poubelle")
const post_button = document.getElementById("post_button")
const annuler = document.getElementById("annuler")
const mid_post_maker = document.getElementById("mid_action_post_maker")
const left_make_a_post = document.getElementById("left_make_a_post")
const post_maker = document.getElementById("post_maker")
const txt_post = document.getElementById("post_txt")
const tag_selector = document.getElementById("tag_selector")
const clear = document.getElementById("all_tag")
const post_container = document.getElementById("post_container")
const mobile_menu = document.getElementById("mobile_menu")
const leave_mobile_menu = document.getElementById("leave_mobile_menu")
const left = document.getElementById("left")
const mid = document.getElementById("mid")
const right = document.getElementById("right")
const verif_suppr = document.getElementById("verif_suppr")
const suppr_oui = document.getElementById("suppr_oui")
const suppr_non = document.getElementById("suppr_non")
const input_post = document.getElementById("input_post")
const suppr_oui_get_id = document.getElementById("suppr_oui_get_id")
const connect_toi = document.getElementById("connect_toi")
const info_user = document.getElementById("info_user")
const hashtag_mobile = document.getElementById("hashtag_mobile")
const leave_hashtag = document.getElementById("leave_hashtag")


let active_tag = []
let active_post = []


console.log("all good")
messageStockage = localStorage

txt_post.value = localStorage.getItem("text")
tag_selector.selectedIndex = localStorage.getItem("tag")

const showMakePost =() =>{
  post_maker.classList.remove("hidden")
}
const hideMakePost=() =>{
  post_maker.classList.add("hidden")
}

const checkTag =(event) =>{
  let el = event.target
  if (el.style.backgroundColor === ""){   
    el.style.backgroundColor = "#00aa00"
    active_tag.push(el.classList[0])
    console.log(el.classList)
    const style = getComputedStyle(el)
    let color_tag = style.color
    document.documentElement.style.setProperty('--pink_color', color_tag);
  }

  if (active_tag != []){
    for(let i = 0 ; i<post_container.childElementCount ; i++){
      post_container.children[i].classList.add("hidden")
      for(let y = 0 ; y < active_tag.length; y++){
        if(li_tag_post[i].classList[1] === active_tag[y]){
          active_post.push(post_container.children[i])
        }
      }
    }
    active_post.forEach(element => {
      element.classList.remove("hidden")
    });
  }
}

const clearTags = () =>{
  for(let i = 0; i<10; i++){
    li_tag[i].style.backgroundColor = ""
  }
  active_tag = []
  active_post = []
  document.documentElement.style.setProperty('--pink_color', '#E09ECE');

  
  for(let i=0; i<li_post.length;i++){
    li_post[i].classList.remove("hidden")
  }
}

addEventListener('input', () =>{
  localStorage.setItem("text",txt_post.value)
})
tag_selector.addEventListener('change',() =>{
  localStorage.setItem("tag",tag_selector.selectedIndex)
})


const showLeft = () => {
  left.style.transform = "translateX(0%)"
  leave_mobile_menu.style.visibility= "visible"
  hashtag_mobile.style.visibility= "hidden"
}

const hide_left = () =>{
  left.style.transform = "translateX(-100%)"
  leave_mobile_menu.style.visibility= "hidden"
  hashtag_mobile.style.visibility= "visible"
}

const show_right = () =>{
  right.style.transform = "translateX(20%)"
  leave_hashtag.style.visibility= "visible"
  mobile_menu.style.visibility= "hidden"
}

const hide_right = () =>{
  right.style.transform = "translateX(110%)"
  leave_hashtag.style.visibility= "hidden"
  mobile_menu.style.visibility= "visible"
}

const clear_localstorage = () => { 
  
  localStorage.removeItem("text")
  localStorage.removeItem("tag")
   }

const deletePost = (element) =>{
  console.log(element)
  let id = element.target.id
  console.log(id)
  suppr_oui_get_id.innerText= id
  verif_suppr.classList.remove("hidden")
  suppr_non.addEventListener('click',event=>{
    verif_suppr.classList.add("hidden")
  })
  suppr_oui.addEventListener('click', event=>{
    
    verif_suppr.classList.add("hidden")
  })
  
}

const scroll_verif = () => {
  let y = window.scrollY
  if(y >= 500 && info_user.innerText=="no user"){
    connect_toi.classList.remove("hidden")
    left.classList.add("blur")
    mid.classList.add("blur")
    right.classList.add("blur")
  }
  else{
    connect_toi.classList.add("hidden")
    left.classList.remove("blur")
    mid.classList.remove("blur")
    right.classList.remove("blur")
  }
}

window.addEventListener("scroll", scroll_verif)
mid_post_maker.addEventListener('click',showMakePost)
post_button.addEventListener('click', showMakePost)
left_make_a_post.addEventListener('click',showMakePost)
annuler.addEventListener('click', hideMakePost)
clear.addEventListener('click', clearTags)
mobile_menu.addEventListener('click',showLeft)
leave_mobile_menu.addEventListener('click', hide_left)
input_post.addEventListener('click', clear_localstorage)
hashtag_mobile.addEventListener('click', show_right)
leave_hashtag.addEventListener('click', hide_right)

for (let i = 0; i < li_poubelle.length ; i++){
  console.log(i)
  li_poubelle[i].addEventListener('click', deletePost)
}
for (let i = 0; i < li_tag.length ; i++){
  li_tag[i].addEventListener('click', checkTag)
}