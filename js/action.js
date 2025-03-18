const formulario = document.getElementById("myform");
const cadastrar = document.getElementById("cadastrar");

// dados usuario
const nome_usu = document.getElementById("nome");
const cpf_usu = document.getElementById("cpf");
const foto_usu = document.getElementById("foto");
const email_usu = document.getElementById("email");
const senha_usu = document.getElementById("senha");


cadastrar.addEventListener("mouseover", function(){
    console.log(nome_usu.value);
    console.log(cpf_usu.value);
    console.log(foto_usu.value);
    console.log(email_usu.value);
    console.log(senha_usu.value);
})


// cadastrar.addEventListener('mouseover',function(){
    
//     formulario.style.backgroundColor='black';
// })

// console.log(formulario);
// console.log(cadastrar);

// for(i=0; i<10; i++){
//     console.log(i);
// }