//CAPTURANDO O BOTAO DE CANCELAR
var btn = document.getElementById("cancelar");
//ADICIONANDO O EVENTO DE CLICK NO BOTAO

var formulario = document.getElementById("myform");

console.log(formulario.nome)

//capturando o modal para manipular o CSS com JS, aparecer o modal que tava escondido
var modal = document.getElementById("modal");

var forms_enviar = document.getElementById("form_modal");
//capturando o form que irá mandar os dados para o PHP


console.log(formulario);


function chamaModal(){
    modal.classList.remove("esconde");
    modal.classList.add("chama");
}

forms_enviar.addEventListener('submit', async function(event){
    event.preventDefault();

    const formData = new FormData(formulario);

    let dados_php = await fetch('./actions/cadastro_usuario.php', {
        method:"POST",
        body:formData
    })

    let response = await dados_php.json();


    if (response.status == 200){
        alert("USUARIO CADASTRADO COM SUCESSO!!!")
    }else{
        alert("ERRO AO CADASTRAR O USUÁRIO!!")
    }
});

btn.addEventListener('click', chamaModal );















function validar_forms(){
     //CAPTURANDO OS INPUTS AO CLICAR NO BTN
    // const nome = document.getElementById("nome");
    // const email = document.getElementById("email");
    // const cpf = document.getElementById("cpf");
    // const senha = document.getElementById("senha");
    // const conf = document.getElementById("confsenha");
    
    // if(nome.value.length < 3){
    //     alert("O nome deve conter mais que 2 caracteres!!!!");
    // }

    // if(cpf.value == ""){
    //     alert("FAVOR PREENCHA O CPF")
    // }

    // if(senha.value != conf.value){
    //     alert("As senhas não BATEM!!!!!!! DIGITE A SENHA IGUAL")
    // }
    // else{
    //     alert("SENHAS IGUAIS")
    // }
}
