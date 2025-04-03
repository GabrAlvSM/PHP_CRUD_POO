
//capturando o formulário
const x = document.getElementById("myform");

//capturando o botao de cancelar
const bot1 = document.getElementById("cancelar");
const bot2 = document.getElementById("cadastrar");

//print do elemento capturado no console
//console.log(bot);

//adicionando um evento ao botao capturado


bot1.addEventListener('click',function(){
    
    document.getElementById("container").style.backgroundColor="#c1c1c1";
    document.getElementById("titulo").classList.remove('esconde');

})

bot2.addEventListener('click',function(e){
    e.preventDefault()
    document.getElementById("container").style.backgroundColor="#c1c1c1";

})

//CONDICIONAL TERNÁRIA   X = IF (TAL COISA) ? "ISSO" : "AQUILO"

var mult = (a,b) => a * b


var y = mult(10,10)

console.log( y )

