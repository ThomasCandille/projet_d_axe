//IMPORT DSE ELEMENTS HTML
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

//INITIALISATION LI TAG ACTIFS
let active_tag = []
let active_post = []

//INITIALISATION LOCALSTORAGE
messageStockage = localStorage

//RECUPERATION DU TEXTE POUR LOCAL STORAGE
txt_post.value = localStorage.getItem("text")

//RECUPERATION DU TAG CHOISI
tag_selector.selectedIndex = localStorage.getItem("tag")

//APPARITION DU MODAL POUR FAIRE UN POST
const showMakePost =() =>{
  post_maker.classList.remove("hidden")
}

//DISPARITION DU MODAL POUR FAIRE UN POST
const hideMakePost=() =>{
  post_maker.classList.add("hidden")
}

//FONCTIONNEMENT DES TAGS
const checkTag =(event) =>{
  let el = event.target                   //EL EST LE TAG QUI A ETE CLIQUE
  if (el.style.backgroundColor === ""){   //SI IL N A PAS ETE CHOISI
    el.style.backgroundColor = "#00aa00"  //CHANGEMENT LA BCKGRD COLOR
    active_tag.push(el.classList[0])      //AJOUT A LA LISTE DES TAG ACTIFS
    const style = getComputedStyle(el)    //RECUPERATION DU CSS DU TAG
    let color_tag = style.color           //RECUPERATION DE LA COULEUR DU TAG
    document.documentElement.style.setProperty('--pink_color', color_tag); //COULEUR BARRE = COULEUR TAG
  }

  if (active_tag != []){ //SI DES TAGS SONT CHOISIS
    for(let i = 0 ; i<post_container.childElementCount ; i++){  //PARCOURS DE TOUS LES POSTS
      post_container.children[i].classList.add("hidden")        //DISPARITION DU POST
      for(let y = 0 ; y < active_tag.length; y++){              //PARCOUS DES TAGS ACTIFS
        if(li_tag_post[i].classList[1] === active_tag[y]){      //SI TAG DU POST = TAG ACTIFS
          active_post.push(post_container.children[i])          //AJOUT AUX POSTS ACTIFS
        }
      }
    }
    active_post.forEach(element => {      //POUR CHAQUE POSSTS ACTIFS
      element.classList.remove("hidden")  //REMOVE HIDDEN
    });
  }
}

//DESACTIVATION DU FILTRAGE PAR TAG
const clearTags = () =>{
  for(let i = 0; i<10; i++){
    li_tag[i].style.backgroundColor = "" //RESET BCKGRND COLOR DES TAG
  }
  active_tag = []   //RESET DES TAGS ACTIS
  active_post = []  //TOUS LES POSTS SONT AFFICHES
  document.documentElement.style.setProperty('--pink_color', '#E09ECE');  //COULEUR DES LIGNES RESET

  
  for(let i=0; i<li_post.length;i++){
    li_post[i].classList.remove("hidden") //REAPPARITION DES POSTS
  }
}

//SI AJOUT DE TXT -> LOCALSTORAGE MAJ
addEventListener('input', () =>{
  localStorage.setItem("text",txt_post.value)
})
//SI CHOIX D UN TAG -> LOCALSTORAGE MAJ
tag_selector.addEventListener('change',() =>{
  localStorage.setItem("tag",tag_selector.selectedIndex)
})

//APPARITION SIDENAV GAUCHE MOBILE
const showLeft = () => {
  left.style.transform = "translateX(0%)"
  leave_mobile_menu.style.visibility= "visible"
  hashtag_mobile.style.visibility= "hidden"
}

//DISPARITION SIDENAV MOBILE GAUCHE
const hide_left = () =>{
  left.style.transform = "translateX(-100%)"
  leave_mobile_menu.style.visibility= "hidden"
  hashtag_mobile.style.visibility= "visible"
}

//APPARITION SIDENAV MOBILE DROITE
const show_right = () =>{
  right.style.transform = "translateX(20%)"
  leave_hashtag.style.visibility= "visible"
  mobile_menu.style.visibility= "hidden"
}

//DISPARITION SIDENAV MOBILE DROITE
const hide_right = () =>{
  right.style.transform = "translateX(110%)"
  leave_hashtag.style.visibility= "hidden"
  mobile_menu.style.visibility= "visible"
}

//RESET DU LOCALSTORAGE
const clear_localstorage = () => { 
  
  localStorage.removeItem("text")
  localStorage.removeItem("tag")
   }

//SUPPRESSION D UN POST
const deletePost = (element) =>{
  let id = element.target.id                  //RECUPERATION ID POUBELLE
  suppr_oui_get_id.innerText= id              //AFFECTATION ID POUBELLE AU BOUTON OUI
  verif_suppr.classList.remove("hidden")      //APPARITION MODAL SUPPRESSION
  suppr_non.addEventListener('click',event=>{ //SI NON (CLIC SUR NON FORM)
    verif_suppr.classList.add("hidden")       //DISPARITION DU MODAL
  })  
  suppr_oui.addEventListener('click', event=>{//SI OUI (CLIC SUR FORM OUI)
    verif_suppr.classList.add("hidden")       //DISPARITION DU MODAL
  })
  
}

//APPARITION MODAL "INSCRIT TOI"
const scroll_verif = () => {
  let y = window.scrollY                            //INFO SCROLL ECRAN
  if(y >= 1000 && info_user.innerText=="no user"){  //SI NON CO + SCROLL
    connect_toi.classList.remove("hidden")          //APPRITION MODAL
    left.classList.add("blur")                      //FLOU DE L ELEMENT GAUCHE
    mid.classList.add("blur")                       //FLOU DE L ELEMENT MID
    right.classList.add("blur")                     //FLOU DE L ELEMENT DROITE
  }
  else{
    connect_toi.classList.add("hidden")             //DISPARITION DU MODAL
    left.classList.remove("blur")                   //FLOU ENLEVE
    mid.classList.remove("blur")                    //FLOU ENLEVE
    right.classList.remove("blur")                  //FLOU ENLEVE
  }
}

window.addEventListener("scroll", scroll_verif)           //NIVEAU DE SCROLL DE LA FENETRE
mid_post_maker.addEventListener('click',showMakePost)     //APPARITION POST BOUTON MILIEU
post_button.addEventListener('click', showMakePost)       //APPARITION POST BOUTON FLOTANT
left_make_a_post.addEventListener('click',showMakePost)   //APPARTITION POST BOUTON GAUCHE
annuler.addEventListener('click', hideMakePost)           //BOUTON POUR CACHER POST MAKER
clear.addEventListener('click', clearTags)                //BOUTON POUR CLEAR LES TAGS
mobile_menu.addEventListener('click',showLeft)            //BOUTON APPARITION SIDENAV GAUCHE
leave_mobile_menu.addEventListener('click', hide_left)    //BOUTON FERMER SIDENAV GAUCHE
input_post.addEventListener('click', clear_localstorage)  //BOUTON POUR ENVOYER UN POST
hashtag_mobile.addEventListener('click', show_right)      //BOUTON APPARITION SIDENAV DROITE
leave_hashtag.addEventListener('click', hide_right)       //BOUTON DISPARITION SIDENAV DROITE

for (let i = 0; i < li_poubelle.length ; i++){            //POUBELLE POUR SUPPR POST
  console.log(i)
  li_poubelle[i].addEventListener('click', deletePost)
}
for (let i = 0; i < li_tag.length ; i++){                 //BOUTON POUR CHOIX DES TAGS
  li_tag[i].addEventListener('click', checkTag)           
}