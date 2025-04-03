
const form = document.getElementById("myform");
let nome = document.getElementById("nome");
let botao = document.getElementById("cancelar");


function clicou(){
    let newname = document.getElementById("nome").value;
    console.log(newname);
}


botao.addEventListener('click',clicou)




nome.addEventListener('keypress', function(){

    console.log(nome.value);

} );