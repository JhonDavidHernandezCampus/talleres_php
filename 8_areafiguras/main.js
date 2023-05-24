let formulariocua = document.querySelector(".formulariocua");
let formulariorec = document.querySelector(".formulariorec");

let formularios = [formulariocua,formulariorec];

let header = new Headers({"Content-Type":" application/json"});

formularios.forEach((formulario)=>{
    formulario.addEventListener("submit",async (e)=>{
        e.preventDefault();
        let data = Object.fromEntries(new FormData(e.target));
        let config = {
            Header: header,
            method: "POST",
            body: JSON.stringify(data),
        }
        let res = await( await fetch("api.php",config)).text();
        document.querySelector("pre").innerHTML= res;
        console.log(res);
        console.log(data);
        formulario.reset();
    });
})