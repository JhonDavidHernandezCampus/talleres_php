

let formulario = document.querySelector(".myFormulario");
let myheader = new Headers({"Content-Type" : "application/json"});

let config ={
    Headers: myheader,
};

formulario.addEventListener("submit", async (e)=>{
    e.preventDefault();
    config.method = "POST";
    let data = Object.fromEntries(new FormData(e.target));
    config.body = JSON.stringify(data);
    
    let res = await (await fetch ("api.php",config)).text();
    console.log(res);
    document.querySelector("pre").innerHTML= res;
    console.log(document.querySelector("pre"));

})