import modalCadastro from "./modalCadastro.js";
import modalConfirm from "./modalConfirm.js";

// let btnAbrir = document.querySelectorAll(".btnAbrir");

// console.log(modalCadastro());
document.addEventListener("DOMContentLoaded",()=>{
    let main = document.getElementById("#infoCadastro");

    main.innerHTML += modalCadastro();
    main.innerHTML += modalConfirm();
    
    // console.log(main.innerHTML);

    main.querySelector(".btnAbrir").addEventListener("click", ()=>{
        main.querySelector(".modalContainer").classList.add("show");

        main.querySelector(".modalCadastro").querySelector("button").addEventListener("click", (event)=>{
            event.preventDefault();
            main.querySelector(".")
        })
    })

    main.querySelector("")

    main.querySelector(".modalContainer").querySelector("#confirmar").addEventListener("click", ()=>{
        main.querySelector(".modalContainer").classList.remove("show");
        main.querySelector(".modalConfirm").classList.remove("show");
    })
})