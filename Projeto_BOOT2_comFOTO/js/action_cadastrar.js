
//CAPTURANDO O BOTAO DE CADASTRAR
var btn = document.getElementById("cadastrar");
//console.log(btn);

//capturando o modal para manipular o CSS com JS, aparecer o modal que tava escondido
var modal = document.getElementById("modal");
console.log(modal);

function chamaModal(){
    modal.classList.remove("esconde");
    modal.classList.add("chama");
}

btn.addEventListener('click', function (event){
    event.preventDefault()
    chamaModal()

    console.log(modal.enviar)

})
