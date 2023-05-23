let formulario = document.querySelector(".formulario");
let mostar = document.querySelector("#calcular");
let pre = document.querySelector("pre");

let header = new Headers({"Content-Type":"application/json"});

let atletas =[];
formulario.addEventListener("submit", async(e)=>{
    pre.style.display = "none";
    e.preventDefault();
    let data = Object.fromEntries(new FormData(e.target));
    atletas.push(data);
    let config ={
        header: header,
        method: "POST",
        body:JSON.stringify(atletas),
    }
    let res = await (await fetch("api.php", config)).json();
    pre.innerHTML = `<h1>La atleta campeona fue ${res.ganadora.nombre}</h1>
                    <h2>Y ${(res.ganadora.marca > 15.50)?" rompre record y resive 500 millones":"no rompe record "}</h2>`;
    console.log(data);
    console.log(res);
    console.log(atletas);

    formulario.reset();
})
mostar.addEventListener("click",(e)=>{
    pre.style.display = "block";
})