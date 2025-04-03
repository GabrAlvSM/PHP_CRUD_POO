///////EM PYTHON É UM DICIONÁRIO ---->>>>> AQUI CHAMA-SE OBJETO

// var lista = ['banana','uva','pera','maça']

// console.log(lista)

// console.log( lista[3] )

// var pessoa = {
//     "nome":"Joao",
//     "idade":18,
//     "email":"email",
//     "cidade":"Campo Grande"
// }

// var form = {
//     "nome":"<input id='nome' class='kkk' > ",
// }

// console.log(form.nome)

// /////// NO PHP ISSO AQUI É UM ARRAY ASSOCIATIVO


// console.log(pessoa)

// console.log(pessoa.nome)
// console.log(pessoa.cidade)


// JAVASCRIPT SOLICITA UM MÉTODO DA CLASSE USUÁRIO  MÉTODO BUSCAR
// O MÉTODO BUSCAR SOLICITA À CLASSE DATABASE O MÉTODO SELECT
// A CLASSE DE DATABASE EM PHP SOLICITA AO MYSQL OS DADOS 
// O MYSQL RETORNA UM OBJETO DE DATABASE
// A CLASSE DE USUÁRIO FAZ O FETCH ALL DO OBJETO E CONVERTE NO FORMATO DE ARRAY EM PHP
// A CLASSE DE USUÁRIO CONVERTE ESSES DADOS PARA JSON E DEVOLVE ESSES DADOS PARA QUEM CHAMOU
// POR FIM O JS DEVOLVE ESSE JSON EM FORMATO DE HTML

var data = [
    {
        "nome":"Joao",
        "idade":18,
        "email":"email",
        "cidade":"Campo Grande"
    },
    {
        "nome":"Grazi",
        "idade":33,
        "email":"email",
        "cidade":"Campo Grande"
    },
    {
        "nome":"Sesper",
        "idade":18,
        "email":"email",
        "cidade":"Campo Grande"
    },
]

for(var i = 0; i < data.length; i++){

    console.log(data[i].nome,data[i].idade);
}

var form = {
    "nome":"FREDson",
    "fone":"45454545",
    "email":"fredson@gmail.com"
}

console.log(form.email)