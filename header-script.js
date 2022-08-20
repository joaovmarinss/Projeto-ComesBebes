function carrinho(){
    let modal1 = document.querySelector("#modalcarrinho-h")
    let modal2 = document.querySelector("#escmodalcarrinh-h")
    modal1.style.display = 'block' ;
    modal2.style.display = 'block' ;
    console.log("Ta clickando")
}
function fecharcar(){
    let modal1 = document.querySelector("#modalcarrinho-h")
    let modal2 = document.querySelector("#escmodalcarrinh-h")
    modal1.style.display = 'none' ;
    modal2.style.display = 'none' ;
}
var url_atual = window.location.href;
const url1 = 'http://projeto-comes-e-bebes.local/product-category/massas/'
const url2 = 'http://projeto-comes-e-bebes.local/product-category/nordestina/'
const url3 = 'http://projeto-comes-e-bebes.local/product-category/vegano/'
const url4 = 'http://projeto-comes-e-bebes.local/product-category/japonesa/'
const menunord = document.querySelector('.menu-item-119')
const menuveg = document.querySelector('.menu-item-122')
const menumas = document.querySelector('.menu-item-120')
const menujap = document.querySelector('.menu-item-121')
const titulo = document.querySelector('.comida-de-categoria')
const ul_sin = document.querySelector('.columns-4')

if(url_atual == url1){
    menumas.classList.add("menu_active")
    titulo.innerHTML ='COMIDA MASSAS'
}
if(url_atual == url2){
    menunord.classList.add("menu_active")
    titulo.innerHTML ='COMIDA NORDESTINA'
}
if(url_atual == url3){
    menuveg.classList.add("menu_active")
    titulo.innerHTML ='COMIDA VEGANA'
}
if(url_atual == url4){
    menujap.classList.add("menu_active")
    titulo.innerHTML ='COMIDA JAPONESA'
}

for(var a = 0; a<4; a++){
    const img = document.createElement('img')
    if(ul_sin.children[a]){
        ul_sin.children[a].lastChild.innerHTML = '<img class="carrinho-image" src="http://projeto-comes-e-bebes.local/wp-content/themes/Projeto%20comes-bebes/assets/carrinho.png">'  
    }else{
        break;
    }
}
const atualizar = document.querySelector(".TENTA")

atualizar.firstElementChild.innerHTML='COMPRAR'

function opencartao(){
    let cartao = document.querySelector("#cartaopag")
    cartao.style.display = 'block' ;
}
function exitcartao(){
    let cartao = document.querySelector("#cartaopag")
    cartao.style.display = 'none' ;
}
const tirar = document.querySelector("#order_review")
console.log(tirar.children[0])
tirar.firstChild.remove()