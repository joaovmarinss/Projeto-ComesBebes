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
if(url_atual == url1){
    menumas.classList.add("menu_active")
}
if(url_atual == url2){
    menunord.classList.add("menu_active")
}
if(url_atual == url3){
    menuveg.classList.add("menu_active")
}
if(url_atual == url4){
    menujap.classList.add("menu_active")
}