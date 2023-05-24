
let formulario = document.querySelector(".formulario");
let header = new Headers({"Content-Type":"application/json"});
let config ={
    Headers : header,
}

formulario.addEventListener("submit", async (e)=>{
    e.preventDefault();
    config.method = "POST";
    let data = Object.fromEntries(new FormData(e.target));
    config.body = JSON.stringify(data);

    let res = await(await fetch("api.php",config)).text();
    console.log(data);
    console.log(res);
    document.querySelector("pre").innerHTML = res;

})