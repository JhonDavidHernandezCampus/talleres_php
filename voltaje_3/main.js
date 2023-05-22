
let formulario = document.querySelector("#formulario");
let header = new Headers({"Content-Type":"application/json"});

formulario.addEventListener("submit", async (e)=>{
    e.preventDefault();
    let data = Object.fromEntries(new FormData(e.target));
    let config = {
        Headers : header,
        method : "POST",
        body : JSON.stringify(data),
    }

    let res = await (await fetch("api.php", config)).text();
    document.querySelector("pre").innerHTML = res;
    console.log("estamos ");
    console.log(config);
    console.log(data);
    console.log(res);
})